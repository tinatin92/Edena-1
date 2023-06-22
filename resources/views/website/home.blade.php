@extends('website.master')

@section('main')
<main>
 
    <div class="container">
        <h1 class="header-comment">
           {!! $model->translate(app()->getlocale())->desc !!}
        </h1>
    </div>

    <section class="mainslider">
        @if (isset($mainBanner))
        
        <div class="main-slider">
           
            @foreach($mainBanner->files as $file)
            <div class="mainslider-slide">
                <a href="{{ $mainBanner->translate(app()->getlocale())->redirect_link }}">
                    
                    
                    <img src="{{ image($file->file) }}" alt="img">
                   
                </a>
            </div>
            @endforeach
        </div>
       
        @endif

    </section>
    @if(isset($about_section))
   
    <section class="container">
        <div class="about-us">
            <h3 class="h3">{{ $about_section->translate(app()->getlocale())->title }}</h3>
            <div class="about-us_title">
                {!! $about_section->translate(app()->getlocale())->desc !!}
                <img src="{{ asset('website/assets/images/Vector (8).png') }}" alt="img">
                <img src="{{ asset('website/assets/images/Vector (9).png') }}" alt="img">
            </div>
            <div class="about-us_text">
                {!! $about_posts->translate(app()->getlocale())->desc !!}
            </div>
        </div>
    </section>
    @endif
    @if(isset($counting_banner))
    <section class="container">
        <div class="counter">
            @foreach($counting_banner as $countBanner)
            <div class="counter-div">
                <span class="datacount" data-count={{ $countBanner->translate(app()->getlocale())->numbers }}>
                    
                </span>
                <span>
                    {{ $countBanner->translate(app()->getlocale())->title }}
                </span>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    
    @if(isset($products))
    <section class="container">
        <h3 class="h3">{{ $products->translate(app()->getlocale())->title }}</h3>
        <div class="products">
            @foreach($products_posts as $post)
           
            <div class="product">
                <a href="/{{  $post->getFullSlug() }}">
                    <div class="product-img">
                        <img src="{{ image($post->thumb) }}" alt="img">
                    </div>
                    <div>
                        @foreach($category as $post_category)
                        @if($post->additional['category'] == $post_category->id)
                        <span class="product-title">{{ $post_category->translate(app()->getlocale())->title }}</span>
                        @endif
                        @endforeach
                       
                        <span class="product-desc">{{ $post->translate(app()->getlocale())->title }}</span>
                    </div>
                </a>
            </div>
            @endforeach
            
            <div class="product product2">
                <a href="/{{ $products->getFullSlug() }}" target="blank">
                    <div class="product-img2">
                        <img class="product-img2-img" src="{{ asset('website/assets/images/Vector (10).png') }}" alt="img">
                        <span>{{ __('website.See_All') }}</span>
                        <span class="icon-_1"></span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    @endif

    <section class="container navbar">
        <h3 class="h3">Product Categories</h3>
        <div class="navigation">
            <div class="navArea">
                <ul>
                    @foreach($category as $cat)
                  
                    <li>
                        
                        <a href="{{ $cat->translate(app()->getlocale())->slug }}" target="blank"
                            onmouseenter="changeImage('{{ image($cat->cover) }}')">{{ $cat->translate(app()->getlocale())->title }}</a>
                            <img class="hoverImage" src="{{ asset('/website/assets/images/Vector.jpg') }}" alt="img">
                    </li>
                    @endforeach
                 
            </div>
            <div class="imgArea">
                <img id="slider" src="{{ asset('/website/assets/images/337670179_450837493894440_3681745197021950728_n.jpg') }}" alt="img">
                
            </div>
        </div>

    </section>

    <script>
        function changeImage(anything) {
            document.getElementById('slider').src = anything;
        }
    </script> 
</main>
@endsection

