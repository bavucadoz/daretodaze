<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} — Styleguide</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&family=Inter:wght@400;500&family=IBM+Plex+Mono:wght@400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .swatches { display: grid; grid-template-columns: repeat(auto-fill, minmax(8rem, 1fr)); gap: var(--space-4); list-style: none; padding: 0; }
        .swatch__chip { height: 5rem; background: var(--swatch); border: 1px solid var(--color-line); }
        .demo { background: var(--color-obsidian); color: var(--color-ivory); padding: var(--space-5); min-height: 6rem; }
        .demo--light { background: var(--color-digital-blue); color: var(--color-obsidian); }
    </style>
</head>
<body>
    <a class="skip-link" href="#main">Lewati ke konten</a>

    <main id="main" class="container">
        <section class="section">
            <p class="meta">Styleguide · Langkah 2.2</p>
            <h1 class="display">Dare to be seen.</h1>
            <p class="lead">Dare to be different. Fondasi desain DARETODAZE.</p>
        </section>

        <section class="section">
            <h2 class="headline">Palet</h2>
            <ul class="swatches" role="list">
                <li><div class="swatch__chip" style="--swatch: var(--color-obsidian)"></div><p class="meta">Obsidian #111111</p></li>
                <li><div class="swatch__chip" style="--swatch: var(--color-ivory)"></div><p class="meta">Ivory #F6F2E9</p></li>
                <li><div class="swatch__chip" style="--swatch: var(--color-silver)"></div><p class="meta">Silver #858585</p></li>
                <li><div class="swatch__chip" style="--swatch: var(--color-scarlet)"></div><p class="meta">Scarlet #E63946</p></li>
                <li><div class="swatch__chip" style="--swatch: var(--color-acid-lime)"></div><p class="meta">Acid Lime #D9FF57</p></li>
                <li><div class="swatch__chip" style="--swatch: var(--color-digital-blue)"></div><p class="meta">Digital Blue #B7C9F2</p></li>
                <li><div class="swatch__chip" style="--swatch: var(--color-powder-pink)"></div><p class="meta">Powder Pink #D8A5C4</p></li>
            </ul>
        </section>

        <section class="section">
            <h2 class="title">Tipografi</h2>
            <p class="meta">Display · Bodoni Moda</p>
            <p class="headline">Luxury editorial</p>
            <p class="meta">Body · Inter</p>
            <div class="prose">
                <p>Majalah digital independen tentang fashion, seni visual, dan budaya internet. Paragraf ini memakai lebar baca sekitar 720 piksel agar nyaman dibaca, dengan <a href="#main">tautan bergaris bawah</a>.</p>
                <h2>Subjudul artikel</h2>
                <blockquote>Kutipan pendek yang tampil dengan aksen Scarlet di sisi kirinya.</blockquote>
            </div>
        </section>

        <section class="section">
            <h2 class="title">Grid editorial</h2>
            <div class="grid">
                <div class="demo lg-7 md-4">lg-7 · md-4</div>
                <div class="demo demo--light lg-5 md-2">lg-5 · md-2</div>
                <div class="demo demo--light lg-4 md-2">lg-4</div>
                <div class="demo lg-4 md-2">lg-4</div>
                <div class="demo demo--light lg-4 md-2">lg-4</div>
                <div class="demo lg-6 lg-start-4 md-6">lg-6 mulai kolom 4</div>
            </div>
        </section>
    </main>
</body>
</html>