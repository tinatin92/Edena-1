@extends('website.master')
@section('main')

    
<main>
    <section>
       
        <div class="container">
            @if(isset($model->cover))
            <div class="banner-img">
                <img src="{{ image($model->cover) }}" alt="banner">
            </div>
            @else
            <div class="banner-img">
                <img src="/website/assets/img/banner8.png" alt="banner">
            </div>
            @endif

        </div>
       @if(isset($breadcrumbs))
       <div class="brc">
           <div class="container">
                <div class="brc-link">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                   @if(isset($model->parent))
                <div class="line-brc"></div>
                <a href="/{{$model->parent->getfullslug()}}">{{ Str::limit($model->parent[app()->getlocale()]->title , 50, $end='...') }}  </a>
                @endif
                <div class="line-brc"></div>
                   @foreach ($breadcrumbs as $breadcrumb)
                   <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
                   @endforeach
                </div>
               
           </div>
       </div>
       @endif
   </section>

  <section>   
   
       <div class="submenu-page padding-b">
           <div class="container">
               <div class="important-title">
                   <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
               </div>
               <div class="sub-boxes">
                @foreach ($model->children as $children )
                <a href="/{{ $children->GetFullSlug() }}" class="sub-item">
                    <h2>{{ $children->translate(app()->getlocale())->title }}</h2>
                    <img src="/website/assets/img/lines4.png" alt="lines" class="lines4">
                </a>
                @endforeach
                  
               </div>
           </div>
       </div>
  </section>
  <section>
    @foreach ($midlleBanner as $midlle)
  
   <div class="banner-2 mg-b-1">
       <div class="b-img-box">
           <img src="{{ image($midlle->thumb) }}" alt="banner">
       </div>
        
       <div class="text-box">
           <h2>  {{ $midlle->translate(app()->getlocale())->title }}</h2>
           <a href="#" class="details-link">{{ trans('website.in_details') }}</a>
       </div>
   </div>
   @endforeach
</section>


</main>

@endsection
