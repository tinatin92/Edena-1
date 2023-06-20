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
                        <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    </li>
                    <li>
                        <span class="icon-_1"></span>
                        <a
                            href="/{{$model->getfullslug()}}">{{ Str::limit($model[app()->getlocale()]->title , 50, $end='...') }}</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    @endif

    <section class="container">
        <div class="news">
            @foreach($news_posts as $post)
            <div class="news-main">
                <a href="/{{ $post->getFullSlug() }}">
                    <div class="news-img">
                        <img src="{{ image($post->thumb) }}" alt="img">
                    </div>
                    <div class="news-div">
                        <div class="news-date">{{ $post->date }}</div>
                        <div class="news-titel">{{ $post->translate(app()->getlocale())->title }}</div>
                        <div class="news-text">
                            {!!  $post->translate(app()->getlocale())->text !!}

                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <section>
        <div class="container">
            <div class="pagination">
                @if(isset($news_posts) && (count($news_posts) > 0))
                {{ $news_posts->links("website.components.pagination") }}
                
                @endif
            </div>
        </div>

    </section>
</main>


@endsection
