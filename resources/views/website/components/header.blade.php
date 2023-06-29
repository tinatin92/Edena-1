<header>
    <div class="burger-icon">
        <span class="burger-icon1"></span>
        <span class="burger-icon2"></span>
        <span class="burger-icon3"></span>
    </div>
    <div class="burger-menu">
        <div>
            <div class="language">
                @foreach (config('app.locales') as $k => $value)

                @if ($value != app()->getLocale())

                <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif" class="lang">{{ trans('website.'.$value) }}</a>

                @endif
                @endforeach
            </div>
            <div class="share-icons">
                @if (settings('facebook') != '')
                <a href="{{ settings('facebook') }}" target="blank">
                    <span class="icon-Group-2210"></span>
                </a>
                @endif
                @if (settings('twitter') != '')
                <a href="{{ settings('twitter') }}" target="blank">
                    <span class="icon-Group-10027"></span>
                </a>
                @endif
                @if (settings('instagram') != '')
                <a href="{{ settings('instagram') }}" target="blank">
                    <span class="icon-Group-10028"></span>
                </a>
                @endif
            </div>
            <div class="search">
                <form action="/{{app()->getlocale()}}/search" method="get">
                    <button>
                        <span class="icon-Group-10097"></span>
                    </button>

                    <input type="text" placeholder="{{ trans('website.search') }}" name="que" required>
                </form>
            </div>
            <div class="burher-menu-nav">
                <nav>
                    <ul>
                        @if (isset($sections) && count($sections) > 0)
                        @foreach($sections as $section)
                        <li class="burger-list">

                            <a href="/{{ $section->getFullSlug() }}">{{ $section[app()->getlocale()]->title }}</a>
                            @if ($section->children->count() > 0)
                            <span class="burger-img"> <img src="/website/assets/images/Group 10813.png" alt="img"></span>
                            @endif

                            @if ($section->children->count() > 0)
                            <div class="burger-submenu">

                                <ul>
                                    @foreach ($section->children as $subSec)
                                    <li>
                                        <a href="/{{ $subSec->getFullSlug() }}">{{ strtoupper($subSec[app()->getlocale()]->title) }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </nav>
            </div>

        </div>
    </div>


    <div class="container header">
        <div class="header-img">
            <a href="/{{app()->getlocale()}}">
                <img src="{{ asset('website/assets/images/Edena 2.png') }}" alt="edna">
            </a>
        </div>
        <div class="header-menu">
            <nav class="nav">
                <ul class="menu-ul">
                    @if (isset($sections) && count($sections) > 0)
                    @foreach($sections as $section)
                    <li @if($section->type_id == 3) class="contact" @endif>
                        <a class="menu-hoverline" href="/{{ $section->getFullSlug() }}">{{ $section[app()->getlocale()]->title }}</a>
                        @if ($section->children->count() > 0)
                        <div class="submenu-space">
                            <div class="sub-menu">
                                <nav id="sub-nav">
                                    <ul>

                                        @foreach ($section->children as $subSec)
                                        <li class="sub-menu_li">
                                            <a href="/{{ $subSec->getFullSlug() }}">{{ strtoupper($subSec[app()->getlocale()]->title) }}</a>
                                            <span class="icon-Vector-7"></span>
                                        </li>
                                        @endforeach

                                    </ul>
                                   
                                </nav>
                            </div>
                        </div>
                        @endif
                    </li>
                    @endforeach
                    @endif

                </ul>
            </nav>
        </div>
        <div class="header-last">
            <div class="search">
                <form action="/{{app()->getlocale()}}/search" method="get">
                    <button>
                        <span class="icon-Group-10097"></span>
                    </button>

                    <input type="text" placeholder="{{ trans('website.search') }}" name="que" required>
                </form>
            </div>
            <div class="share-icons">
                @if (settings('facebook') != '')
                <a href="{{ settings('facebook') }}" target="blank">
                    <span class="icon-Group-2210"></span>
                </a>
                @endif
                @if (settings('twitter') != '')
                <a href="{{ settings('twitter') }}" target="blank">
                    <span class="icon-Group-10027"></span>
                </a>
                @endif
                @if (settings('instagram') != '')
                <a href="{{ settings('instagram') }}" target="blank">
                    <span class="icon-Group-10028"></span>
                </a>
                @endif

            </div>
            <div class="language">

                @foreach (config('app.locales') as $k => $value)

                @if ($value != app()->getLocale())

                <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif" class="lang">{{ trans('website.'.$value) }}</a>

                @endif
                @endforeach

            </div>
        </div>
    </div>
</header>