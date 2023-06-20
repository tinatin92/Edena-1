@extends('website.master')

@section('main')

<main>

    @if(isset($breadcrumbs))


    <section class="breadcrumbs-section">
        <div class="container">
            <h3>{{ $model[app()->getlocale()]->title }}</h3>
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    </li>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{$model->getfullslug()}}"> {{ $model[app()->getlocale()]->title }}</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </section>
 
    @endif
    <section class="container">
        <div class="about-us_main about-us">

            <div class="about-us_title">
               
                {{ $post->translate(app()->getlocale())->title }}
                <img src="{{ asset('website/assets/images/Vector (8).png') }}" alt="img">
                <img src="{{ asset('website/assets/images/Vector (9).png') }}" alt="img">
            </div>
            <div class="about-us_text">
                {!! $post->translate(app()->getlocale())->text !!}
            </div>

            <div class="share">
                <h3>Share this via:</h3>
                <a href=""> <span class="icon-Group-2210"></span></a>
                <a href=""> <span class="icon-Group-10027"></span></a>
            </div>
        </div>
    </section>
    <section>
        <div class="news-slier">
            @foreach($post->files as $file)
            <div class="container alter-slider">
                <div class="news-slide">
                    <a href="{{ image($file->file) }}" data-lightbox="roadtrip">
                        <img src="{{ image($file->file) }}" alt="img">
                    </a>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>
     @if(isset($counting_banner))
    <section class="container">
        <div class="counter">
            @foreach($counting_banner as $countBanner)
            <div class="counter-div">
                <span>
                    {{ $countBanner->translate(app()->getlocale())->numbers }}
                </span>
                <span>
                    {{ $countBanner->translate(app()->getlocale())->title }}
                </span>
            </div>
            @endforeach
        </div>
    </section>
    @endif

</main>

@endsection
