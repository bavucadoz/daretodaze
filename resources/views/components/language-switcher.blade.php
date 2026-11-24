<form class="lang-switch" method="POST" action="{{ route('locale.update') }}" aria-label="{{ __('nav.language') }}">
    @csrf
    @foreach (['id' => ['ID', 'Bahasa Indonesia'], 'en' => ['EN', 'English']] as $code => [$label, $name])
        <button type="submit" name="locale" value="{{ $code }}" lang="{{ $code }}"
                aria-label="{{ $name }}"
                @if (app()->getLocale() === $code) aria-current="true" @endif>
            {{ $label }}
        </button>
    @endforeach
</form>