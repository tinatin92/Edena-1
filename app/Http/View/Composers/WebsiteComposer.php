<?php

namespace App\Http\View\Composers;

use App\Models\Section;
use Illuminate\View\View;

class WebsiteComposer
{
    private $sections;

    private $footerSections;

    public function __construct()
    {

        $this->sections = Section::whereHas('translation', function ($q) {
            $q->whereActive(true);
        })
        ->whereHas('menuTypes', function ($q) {
            $q->where('menu_type_id', 1);
        })->where('parent_id', null)
        ->orderBy('order', 'asc')
        ->get();


        // $this->footerSections = Section::whereHas('translations', function($q) {
        //     $q->where('active' , 1)->whereLocale(app()->getLocale());
        // })->orderBy('order', 'asc')->limit(6)->get();

    }

    public function compose(View $view)
    {
        $view->with([
            'sections' => $this->sections,
            'footerSections' => $this->footerSections,
        ]);
    }
}
