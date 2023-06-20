@extends('website.master')

@section('main')

<main>

    @if(isset($breadcrumbs))


    <section class="breadcrumbs-section">
        <div class="container">
            <h3>{{ $section[app()->getlocale()]->title }}</h3>
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    </li>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{$section->getfullslug()}}"> {{ $section[app()->getlocale()]->title }}</a>
                    </li>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{$model->getfullslug()}}">{{ $model[app()->getlocale()]->title }}</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </section>
 
    @endif
    <section class="container">
        
        <div class="product-detail">
            <div class="product-detail_slider">
                <div class="product-main_slider-big">
                    @foreach($model->files as $file)
                    <div class="product-main_slider-big-slide">
                        
                        <img src="{{ image($file->file) }}" alt="img">
                        
                    </div>
                    @endforeach
                </div>
                <div class="product-main_slider-min">
                    @if($model->files != $model->thumb)
                    @foreach($model->files as $file)
                  
                    <div class="product-main_slider-min-slide">
                       
                        <img src="{{ image($file->file) }}" alt="img">
                        
                    </div>
                   
                    @endforeach
                    @endif


                </div>

            </div>

            <div class="product-detail_content">
                <h3 class="product-detail_content-h3">{{ $model->translate(app()->getlocale())->title }}</h3>
                <img class="product-detail_content-img" src="/website/assets/images/Frame 10396.png" alt="img">
                <div>
                    @foreach($category as $post_category)
                        @if($post->additional['category'] == $post_category->id)
                    <span class="product-detail_content-title">{{ $post_category->translate(app()->getlocale())->title }}</span>
                    <span class="icon-Vector-7"></span>
                    @endif
                    @endforeach
                </div>
                <div class="product-detail-text">
                    {!! $model->translate(app()->getlocale())->text !!}
                </div>
                <div class="share">
                    <h3>Share this via:</h3>
                    <a href=""> <span class="icon-Group-2210"></span></a>
                    <a href=""> <span class="icon-Group-10027"></span></a>
                </div>
            </div>

        </div>
    </section>
    
    <section class="container">
        <div class="more-product-title">
            <h3 class="h3">{{ __('website.more_products') }}</h3>
            <a href="/{{ $section->getFullSlug()}}">{{ __('website.all') }}</a>
        </div>
        <div class="more-product_slider">
            @foreach($products_slider as $slider)
            <div class="product">
                <a href="/{{  $slider->getFullSlug() }}">
                    <div class="product-img">
                        <img src="{{ image($slider->thumb) }}" alt="">
                    </div>
                    <div>
                        <span class="product-title">{{ $slider->translate(app()->getlocale())->title }}</span>
                        @foreach($category as $post_category)
                        @if($slider->additional['category'] == $post_category->id)
                        <span class="product-desc">{{ $post_category->translate(app()->getlocale())->title }}</span>
                        @endif
                        @endforeach
                    </div>
                </a>
            </div>
            @endforeach
          
        </div>
    </section>


</main>

@endsection
