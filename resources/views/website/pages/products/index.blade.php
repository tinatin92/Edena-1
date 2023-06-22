@extends('website.master')
@section('main')

<main>
    @if(isset($breadcrumbs))
    <section class="breadcrumbs-section">
        <div class="container">
            <h3>{{ $model->translate(app()->getlocale())->title }}</h3>
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    </li>
                    @foreach ($breadcrumbs as $breadcrumb)
                    <li>
                       
                        <span class="icon-_1"></span>
                        <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
                    </li>
                    @endforeach
                 
                </ul>
            </div>
        </div>
    </section>
    @endif

    @if(isset($products))
    <section class="container">
        <div class="product-categories">
            <div class="product-categories-search">
                <h3>
                    {{trans('website.Product_Categories')}}
                </h3>

                <div class="product-search search">
                    <form action="/{{ app()->getLocale() }}/SearchProduct" method="GET" role="SearchProduct">
                        <button>
                            <span class="icon-Group-10097"></span>
                        </button>

                        <input id="MyInput" type="text" placeholder="{{ trans('website.search') }}..." name="que" value="@if(isset($que)) {{$que}} @endif">
                    </form>
                </div>

            </div>
            <div class="product-list_search">
                <ul>
                    <li @if(!isset($filter_category)) class="active" @endif>
                        <a href="/{{$products->getfullslug()}}" >{{trans('website.all')}}</a>
                        <img src="assets/images/Vector (10).png" alt="">
                    </li>
                    @foreach($category as $key => $cat)
                    @if($cat ==! 0)
                    
                    <li @if(isset($filter_category) && ($cat->id == $filter_category->id )) class="active" @endif>
                        <a href="/{{$products->getfullslug()}}?category={{$cat->id}}" >{{ $cat->translate(app()->getlocale())->title }}</a>
                        <img src="assets/images/Vector (10).png" alt="">
                    </li>
                    @endif
                    @endforeach
                   
                </ul>

                <div class="search-result">
                    <span>{{ trans('website.found') }}:</span>
                    <span>{{ $products_posts->total() }}</span>
                </div>
            </div>
        </div>
    </section>
    <section class="container">

        <div class="product-list products">
            @if(isset($products_posts) && (count($products_posts) > 0))
            @foreach($products_posts as $post)
            <div class="product">
                <a href="/{{$post->getfullslug()}}#{{$post->id}}" class="product-list-item"  id="{{$post->category}}">
                    <div class="product-img">
                        @if(isset($post->thumb))
                                   
                        <img src="{{ image($post->thumb) }}" alt="img">
                        @endif
                    </div>
                    <div>
                        @foreach($category as $post_category)
                        @if($post->additional['category'] == $post_category->id)
                        <span class="product-title">{{ $post_category->translate(app()->getlocale())->title }}</span>
                        @endif
                        @endforeach
                        <span class="product-title">{{$post->translate(app()->getlocale())->title}}</span>
                       
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </section>
  
   


    <section>
        <div class="container">
            <div class="pagination">
                @if(isset($products_posts) && (count($products_posts) > 0))
                {{ $products_posts->links("website.components.pagination") }}
                
                @endif
            </div>
        </div>

    </section>
    @endif
</main>

@endsection
