@php
    $links = [
        ['label' => __('nav.stories'), 'href' => url('/stories'), 'match' => 'stories*'],
        ['label' => __('nav.issues'),  'href' => url('/issues'),  'match' => 'issues*'],
        ['label' => __('nav.archive'), 'href' => url('/archive'), 'match' => 'archive*'],
        ['label' => __('nav.about'),   'href' => url('/about'),   'match' => 'about'],
    ];
@endphp

<header class="site-header">
    <div class="container site-header__inner">
        <a class="site-header__brand" href="{{ url('/') }}" aria-label="{{ config('app.name') }}, {{ __('nav.home') }}">
            {{ config('app.name') }}
        </a>

        <div class="site-header__actions">
            <x-language-switcher />

            <button class="site-header__toggle" type="button"
                    aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
                <span class="toggle-open">{{ __('nav.menu') }}</span>
                <span class="toggle-close">{{ __('nav.close') }}</span>
            </button>
        </div>

        <nav id="site-nav" class="site-nav" aria-label="{{ __('nav.primary') }}" data-nav>
            <ul role="list">
                @foreach ($links as $link)
                    <li>
                        <a href="{{ $link['href'] }}" @if (request()->is($link['match'])) aria-current="page" @endif>
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>