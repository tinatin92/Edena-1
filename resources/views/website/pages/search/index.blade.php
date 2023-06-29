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
                        <a href="#">{{ __('website.search') }}</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    @endif

    <section class="container search-section">
        <div class="search-section-search">
            <form action="">
            <input type="text" class="form-controller" id="search" name="que"
                    value="@if(isset($searchText)) {{$searchText}} @endif">
                <button>
                    <span class="icon-Group-10097"></span>
                </button>
            </form>
            <div class="search-result">
                <span>  {{ trans('website.found') }} </span>
                <span>{{ $posts->total() }}</span>
            </div>
        </div>

    </section>
    <section class="container">
        <div class="search-result-divs">
        @foreach ($posts as $item )
            <div class="search-div">
                <a href="/{{ $item->getfullslug() }}" target="_blank">
                    <div>
                        <img class="search-div-img" src="{{ asset('website/assets/images/Vector (10).png') }}" alt="">
                    </div>
                    <div class="search-div-title">
                    {!! $item->translate(app()->getlocale())->title !!}
                    </div>
                    <div class="search-div-text">
                    {!! $item->translate(app()->getlocale())->text !!}
                    </div>
                    <div class="search-div-spans">
                        <span class="search-div-span1"> {!! $item->parent->translate(app()->getlocale())->title !!}</span>
                        <span class="search-div-span2">
                            <img src="{{ asset('website/assets/images/Vector (11).png') }}" alt="img">
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>
    </section>
    <section>
        <div class="container">
            <div class="pagination">
                @if(isset($posts) && (count($posts) > 0))
                {{ $posts->links("website.components.pagination") }}
                
                @endif
            </div>
        </div>

    </section>

</main>

@endsection
