@extends('layouts.public')

@section('title', __('demo.title'))

@section('content')
    <div class="container">
        <section class="section">
            <p class="meta">{{ __('demo.step') }}</p>
            <h1 class="display">DARE TO DAZE</h1>
            <p class="lead">Dare to be seen. Dare to be different.</p>
        </section>

        <section class="section">
            <div class="prose">
                <h2>{{ __('demo.heading') }}</h2>
                <p>{{ __('demo.body') }}</p>
                <p>{{ __('demo.current', ['locale' => app()->getLocale()]) }}</p>
            </div>
        </section>
    </div>
@endsection