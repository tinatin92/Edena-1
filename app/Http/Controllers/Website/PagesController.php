<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Directory;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Section;
use App\Models\Submission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public static function index($model, Request $request)
    {

        $language_slugs = $model->getTranslatedFullSlugs();

        if ($model->type_id == 1) {
            return self::homePage($model, $language_slugs);
        }
        if ($model->type_id == 3) {
            return self::contact($model, $language_slugs);
        }

        if (request()->method() == 'POST') {
            $values = request()->all();

            $values['additional'] = getAdditional($values, config('submissionAttr.additional'));
            $submission = Submission::create($values);

            return back()->with([
                'message' => trans('website.submission_sent'),
            ]);
        }
        // BreadCrumb ----------------------------
        $breadcrumbs = [];
        $breadcrumbs[] = [
            'name' => $model[app()->getlocale()]->title,
            'url' => $model->getFullSlug(),
        ];
        $section = $model;
        while ($section->parent_id !== null) {
            $section = Section::where('id', $section->parent_id)->with('translations')->first();
            $breadcrumbs[] = [
                'name' => $section->title,
                'url' => $section->getFullSlug(),

            ];
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        if ($model->type_id == 2) {

            $news = Section::where('type_id', 2)->with('translations')->first();
            $news_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })->orderBy('date', 'desc')->paginate(settings('News/Project_list_pagination'));

            return view('website.pages.news.index', compact('model',
                'breadcrumbs', 'news', 'news_posts', 'language_slugs'));
        }
        if ($model->type_id == 4) {
        $post = Post::where('section_id', $model->id)->with('translations', 'files')->first();
        $counting_banner = Banner::whereHas('translation', function ($q) {
            $q->where('active', 1)->whereLocale(app()->getLocale());
        })->where('type_id', 2)
            ->orderBy('date', 'desc')->get();
        return view('website.pages.text_page.show', compact('model', 'breadcrumbs', 'language_slugs','counting_banner' , 'post'));
    }
        if ($model->type_id == 6) {

            $products = Section::where('type_id', 6)->with('translations', 'posts')->first();

            $category = Directory::where([
                ['type_id', 0],
                ['parent_id', null],
            ])->with('translations')->get();
            $filter_cat_arr = [];
            $filter_category = null;

            if ($request->category != null) {
                $filter_category = Directory::where([['type_id', 0], ['parent_id', null]])
                    ->where('id', $request->category)
                    ->with('translations')->first();

                array_push($filter_cat_arr, $filter_category->id);

            }
            if (count($filter_cat_arr) == 0) {
                $products_posts = Post::where('section_id', $products->id)->with('translations')->paginate(settings('Product_list_pagination'));

            } else {

                $products_posts = Post::where('section_id', $products->id)
                    ->whereIn('additional->category', $filter_cat_arr)
                    ->with('translations')->orderby('date', 'asc')->paginate(settings('Product_list_pagination'));

            }

            return view('website.pages.products.index', compact('model', 'breadcrumbs', 'products_posts', 'products', 'category', 'language_slugs', 'filter_category'));
        }
        

        return view("website.pages.{$model->type['folder']}.index", compact(['model', 'breadcrumbs', 'language_slugs']));
    }

    public static function submission(Request $request)
    {
        $values = request()->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        $values['additional'] = getAdditional($values, config('submissionAttr.additional'));
        $submission = Submission::create($values);

        return redirect()->back()->with([
            'message' => trans('website.submission_sent'),
        ]);

    }
    public static function homePage($model, $locales = null)
    {
        if ($model == null) {
            $model = Section::where('type_id', 1)->first();
        }
        $mainBanner = Banner::whereHas('translation', function ($q) {
            $q->where('active', 1)->whereLocale(app()->getLocale());
        })->where('type_id', 1)
            ->orderBy('date', 'desc')->first();
        $counting_banner = Banner::whereHas('translation', function ($q) {
            $q->where('active', 1)->whereLocale(app()->getLocale());
        })->where('type_id', 2)
            ->orderBy('date', 'desc')->get();
        $products = Section::where('type_id', 6)->with('translations')->first();
        $products_posts = Post::Where('section_id', $products->id)->with('translations', function ($q) {
            $q->where('active', 1);
        })->where('active_on_home', 1)->limit(7)->get();

        $category = Directory::where('type_id', 0)->with('translation')->get();
        
        $about_section = Section::where('type_id', 4)->with('translations')->first();
        $about_posts = Post::whereHas('parent', function ($q) {
            $q->where('type_id', 4);
        })->with('translation', function ($q) {
            $q->where('active', 1);
        })->where('active_on_home', 1)->orderBy('date', 'desc')->first();

        return view('website.home', compact('model', 'mainBanner', 'category',
            'about_posts', 'about_section', 'counting_banner', 'products_posts', 'products',
        ));
    }

    public static function contact($model)
    {

        $breadcrumbs = [];
        $sec = $model;
        $breadcrumbs[] = [
            'name' => $model->title,
            'url' => $model->getFullSlug(),
        ];
        while ($sec->parent_id !== null) {
            $sec = Section::where('id', $model->parent_id)->with('translations')->first();
            $breadcrumbs[] = [
                'name' => $sec->title,
                'url' => $sec->getFullSlug(),
            ];
        }
        $sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

        $breadcrumbs[] = [
            'name' => $sec->title,
            'url' => $sec->getFullSlug(),
        ];
        $breadcrumbs = array_reverse($breadcrumbs);
        $submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();
        $post = Post::where('section_id', $model->id)->whereHas('translations', function($q){
			$q->where('active', 1);
		})->first();
        return view('website.pages.contact.show', compact('model', 'submenu_sections', 'breadcrumbs','post'));
    }

    public static function submenu($model)
    {

        $breadcrumbs = [];
        $sec = $model;
        $breadcrumbs[] = [
            'name' => $model->title,
            'url' => $model->getFullSlug(),
        ];
        while ($sec->parent_id !== null) {
            $sec = Section::where('id', $model->parent_id)->with('translations')->first();
            $breadcrumbs[] = [
                'name' => $sec->title,
                'url' => $sec->getFullSlug(),
            ];
        }
        $sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

        $breadcrumbs[] = [
            'name' => $sec->title,
            'url' => $sec->getFullSlug(),
        ];
        $breadcrumbs = array_reverse($breadcrumbs);
        $submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();

        return view('website.pages.submenu.index', compact('model', 'submenu_sections', 'breadcrumbs'));
    }

    public static function show($model)
    {

        $language_slugs = $model->getTranslatedFullSlugs();

        // BreadCrumb ----------------------------
        $breadcrumbs = [];
        $breadcrumbs[] = [
            'name' => $model[app()->getLocale()]->title,
            'url' => $model->getFullSlug(),
        ];
        if ($model->section_id !== null) {
            $section = Section::where('id', $model->section_id)->with('translations')->first();
            $breadcrumbs[] = [
                'name' => $section->title,
                'url' => $section->getFullSlug(),
            ];
            while ($model->parent_id !== null) {
                $sec = Section::where('id', $section->section_id)->with('translations')->first();

                $breadcrumbs[] = [
                    'name' => $sec->title,
                    'url' => $sec->getFullSlug(),
                ];
            }
        }
        
        $products_slider = Post::where('section_id',$model->section_id)->wherehas('translations', function ($q) {
            $q->where('active', 1);
            $q->where('locale', app()->getlocale());
        })->where('active_on_home', 1)->where('posts.id' , '!=', $model->id)->orderby('date', 'desc')->get();
       
        $category = Directory::where('type_id', 0)->with('translation')->get();

        $breadcrumbs = array_reverse($breadcrumbs);
        $post = Post::where('posts.id', $model->id)
            ->join('post_translations', 'posts.id', '=', 'post_translations.post_id')
            ->where('post_translations.locale', '=', app()->getLocale())
            ->select('posts.*', 'post_translations.text', 'post_translations.desc', 'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug')
            ->with('files')->first();

        $model->views = $model->views + 1;
        $model->save();

        return view("website.pages.{$section->type['folder']}.show", [
            'model' => $model,
            'section' => $section,
            'post' => $post,
            'post' => $model,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs,
            'language_slugs' => $language_slugs,
            'products_slider' => $products_slider,
        ])->render();
    }

    public static function search(Request $request)
    {
        $model = [];
        $language_slugs['ka'] = 'ka/search?que='.$request->que;
        $language_slugs['en'] = 'en/search?que='.$request->que;
        $language_slugs['ru'] = 'en/search?que='.$request->que;
        $validatedData = $request->validate([
            'que' => 'required',
        ]);
        $searchText = $validatedData['que'];

        $postTranlations = PostTranslation::whereActive(true)->whereLocale(app()->getLocale())
            ->where('title', 'LIKE', "%{$searchText}%")
            ->orWhere('desc', 'LIKE', "%{$searchText}%")
            ->orWhere('text', 'LIKE', "%{$searchText}%")
            ->orWhere('keywords', 'LIKE', "%{$searchText}%")
            ->orWhere('locale_additional', 'LIKE', "%{$searchText}%")->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $postTranlations)->with('translations', 'parent', 'parent.translations')->paginate(settings('paginate'));
        $posts->appends(['que' => $searchText]);
        $data = [];
        foreach ($posts as $post) {
            $data[] = [
                'slug' => $post->getFullSlug() ?? '#',
                'title' => $post->translate(app()->getLocale())->title,
                'desc' => str_limit(strip_tags($post->translate(app()->getLocale())->desc)),
            ];
        }

        return view('website.pages.search.index', compact('posts', 'language_slugs', 'searchText'));
    }

    public static function SearchProduct(request $request)
    {

        $que = $request->que;
        $model = Section::where('type_id', 6)->with('translations')->first();

        $products = Section::where('type_id', 6)->with('translations', 'posts')->first();
        $category = Directory::where([['type_id', 0], ['parent_id', null]])->with('translations')->get();
        $language_slugs = $model->getTranslatedFullSlugs();

        $products_posts = Post::Where('section_id', $model->id)
            ->whereHas('translations', function ($q) use ($que) {
                $q->where('title', 'LIKE', "%{$que}%");
                $q->orWhere('desc', 'LIKE', "%{$que}%");
                $q->orWhere('text', 'LIKE', "%{$que}%");

            })->orWhereHas('product_category', function ($p) use ($que) {

                $p->whereHas('translations', function ($i) use ($que) {
                    $i->where('title', 'LIKE', "%{$que}%");
                });
            })->paginate(settings('products_pagination'));

        return view('website.pages.products.index', compact('products_posts', 'model', 'category', 'products', 'language_slugs'));
    }
}
