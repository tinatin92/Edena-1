@extends('website.master')
@section('main')
<main>


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
                        <a href="/{{$model->getfullslug()}}">{{ Str::limit($model[app()->getlocale()]->title , 50, $end='...') }}  </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    @endif
 
    <section class="container">
        <div class="contact-main">
            <div class="contact-form">
                <div class="contact-form-title">
                    <div>
                       {{$model->translate(app()->getlocale())->title}}
                    </div>
                    <img src="{{ asset('website/assets/images/Frame 10396.png') }}" alt="img">
                </div>
                <div class="contact-form-from">
                    <form method="POST" action="/{{ app()->getLocale()}}/submission">
                        @csrf
                        <input type="hidden" placeholder="Name" name="post_id" value="{{$post->id}}">
                        <input type="hidden" placeholder="Name" name="section_type_id" value="{{$model->type_id}}">
                        <div class="star">
                            <label for="name">{{ __('admin.name_surname') }}</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="star">
                            <label for="mail">{{ __('admin.Contact_email') }}</label>
                            <input type="text" name="email" id="mail">
                        </div>
                        <div class="textarea">
                            <label for="massage">{{ __('admin.Contact_massage') }}</label>
                            <textarea name="massage" id="massage"></textarea>
                        </div>
                        <div>
                            <button>
                                {{ __('website.send') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="contact-info">
                <div class="contact-info-div">
                    <div class="contact-greentitle">{{ __('website.Working_hours') }}</div>
                    <div>{{ __('website.Working day - First') }} - {{ __('website.Working day - Last') }}</div>
                    <div>10:00 - 18:00</div>
                  
                    <div class="contact-greentitle con-margin">{{ __('website.contact') }}</div>
                    <div class="foot-font2">
                        <a href="address:{{ $post->address }}"> {{ $post->translate(app()->getlocale())->address }}
                        </a></div>
                    <div>
                        <a href="tel:{{ $post->phone }}">{{ $post->mobile }}</a>
                    </div>
                    <div>
                        <a href="mail:{{ $post->email }}">{{ $post->email }}</a></div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
