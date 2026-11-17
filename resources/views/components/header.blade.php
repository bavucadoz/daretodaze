@php
    $links = [
        ['label' => 'Stories', 'href' => url('/stories'), 'match' => 'stories*'],
        ['label' => 'Issues',  'href' => url('/issues'),  'match' => 'issues*'],
        ['label' => 'Archive', 'href' => url('/archive'), 'match' => 'archive*'],
        ['label' => 'About',   'href' => url('/about'),   'match' => 'about'],
    ];
@endphp

<header class="site-header">
    <div class="container site-header__inner">
        <a class="site-header__brand" href="{{ url('/') }}" aria-label="{{ config('app.name') }}, beranda">
            {{ config('app.name') }}
        </a>

        <button class="site-header__toggle" type="button"
                aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
            <span class="toggle-open">Menu</span>
            <span class="toggle-close">Tutup</span>
        </button>

        <nav id="site-nav" class="site-nav" aria-label="Navigasi utama" data-nav>
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