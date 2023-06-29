@extends('website.master')



@section('main')
<main>
    @if(isset($breadcrumbs))
    <section class="breadcrumbs-section">
        <div class="container">
            <h3>Products</h3>
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <span class="icon-_1"></span>
                        <a href="/{{app()->getlocale()}}">{{ trans('website.breadcrumbs_home') }}</a>
                    </li>
                    <li>
                        <span class="icon-_1"></span>
                        @if(isset($model->parent))
                        <a href="/{{$model->parent->getfullslug()}}">{{ Str::limit($model->parent[app()->getlocale()]->title , 50, $end='...') }}
                        </a>
                        @endif
                    </li>
                    <li>
                    <span class="icon-_1"></span>
                    @foreach ($breadcrumbs as $breadcrumb)
                    <a href="/{{ $breadcrumb['url'] }}"
                        class="brc-active">{{ Str::limit($breadcrumb['name'] , 55 ,$end='...') }}</a>
                    @endforeach
                </li>
                </ul>
            </div>
        </div>
    </section>
    @endif
    <section class="container news-section">
        <div class="news-detail-main">
            <div class="news-detail-img">
                <img src="{{image($model->thumb) }}" alt="img">
            </div>
            <div class="news-detail-title">
                <div class="news-detail-title-date">
                    {{ $model->date }}
                </div>
                <div class="news-detail-title-text">
                   {{ $model->translate(app()->getlocale())->title }}
                </div>
                <img class="news-floating-img" src="{{ asset('website/assets/images/Frame 10629.png') }}" alt="">
            </div>
        </div>
        <div class="news-detail-text">
           {!! $model->translate(app()->getlocale())->text !!}
        </div>
        <div class="share">
            <h3>{{ __('website.Share_this_via') }}:</h3>
             <a data-href="/{{$model->getfullslug()}}" data-layout="button_count" data-size="small">
                <a
                target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u=/{{$model->getfullslug()}}&amp;src={{$model->translate(app()->getlocale())->title}}"
                class="fb-xfbml-parse-ignore"> <span class="icon-Group-2210"></span></a>
            <a  class="twitter-share-button"
            href="https://twitter.com/intent/tweet?text=/{{$model->getfullslug()}}"
            target="_blank"> <span class="icon-Group-10027"></span></a>      
        </div>
    </section>

   
    <section>
        @if($model->files->count() <= 3)
         
            <div class="container alter-slider">
              @foreach($model->files as $file)
                <div class="news-slide">
                    <a href="{{ image($file->file) }}" data-lightbox="roadtrip">
                        <img src="{{ image($file->file) }}" alt="img">
                    </a>
                </div>
                @endforeach
            </div>
           
            @else
            <div class="news-slier">
                @foreach($model->files as $file)
                <div class="news-slide">
                    <a href="{{ image($file->file) }}" data-lightbox="roadtrip">
                        <img src="{{ image($file->file) }}" alt="img">
                    </a>
                </div>
                @endforeach

                
            </div>
            @endif
    </section>
   


</main>


@endsection