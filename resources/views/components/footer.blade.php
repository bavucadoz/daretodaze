<footer class="site-footer">
    <div class="container">
        <p class="site-footer__brand" aria-hidden="true">{{ config('app.name') }}</p>

        <div class="grid site-footer__body">
            <div class="lg-6">
                <p class="lead">Dare to be seen. Dare to be different.</p>
                <p class="meta">Majalah digital independen: fashion, seni visual, dan budaya internet.</p>
            </div>

            <nav class="lg-3" aria-label="Jelajahi">
                <h2 class="site-footer__heading">Jelajahi</h2>
                <ul role="list">
                    <li><a href="{{ url('/stories') }}">Stories</a></li>
                    <li><a href="{{ url('/issues') }}">Issues</a></li>
                    <li><a href="{{ url('/archive') }}">Archive</a></li>
                </ul>
            </nav>

            <nav class="lg-3" aria-label="Tentang">
                <h2 class="site-footer__heading">Tentang</h2>
                <ul role="list">
                    <li><a href="{{ url('/about') }}">About</a></li>
                </ul>
            </nav>
        </div>

        <p class="meta site-footer__legal">
            © {{ date('Y') }} {{ config('app.name') }} · Seluruh karya dikreditkan kepada kreatornya.
        </p>
    </div>
</footer>