<footer class="site-footer">
    <div class="container">
        <p class="site-footer__brand" aria-hidden="true">{{ config('app.name') }}</p>

        <div class="grid site-footer__body">
            <div class="lg-6">
                <p class="lead">Dare to be seen. Dare to be different.</p>
                <p class="meta">{{ __('footer.description') }}</p>
            </div>

            <nav class="lg-3" aria-label="{{ __('footer.explore') }}">
                <h2 class="site-footer__heading">{{ __('footer.explore') }}</h2>
                <ul role="list">
                    <li><a href="{{ url('/stories') }}">{{ __('nav.stories') }}</a></li>
                    <li><a href="{{ url('/issues') }}">{{ __('nav.issues') }}</a></li>
                    <li><a href="{{ url('/archive') }}">{{ __('nav.archive') }}</a></li>
                </ul>
            </nav>

            <nav class="lg-3" aria-label="{{ __('footer.about') }}">
                <h2 class="site-footer__heading">{{ __('footer.about') }}</h2>
                <ul role="list">
                    <li><a href="{{ url('/about') }}">{{ __('nav.about') }}</a></li>
                </ul>
            </nav>
        </div>

        <p class="meta site-footer__legal">
            © {{ date('Y') }} {{ config('app.name') }} · {{ __('footer.legal') }}
        </p>
    </div>
</footer>