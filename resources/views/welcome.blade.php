@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    <div class="container">
        <section class="section">
            <p class="meta">Layout publik · Langkah 2.3</p>
            <h1 class="display">DARE TO DAZE</h1>
            <p class="lead">Dare to be seen. Dare to be different.</p>
        </section>

        <section class="section">
            <div class="prose">
                <h2>Uji scroll dan footer</h2>
                <p>Gulir halaman ini ke bawah dan perhatikan bahwa header tetap menempel di atas, dengan garis tipis sebagai pemisah.</p>
                <p>Majalah digital independen tentang fashion, seni visual, dan budaya internet. Paragraf ini hanya mengisi ruang agar halaman cukup tinggi untuk diuji pada layar kecil maupun besar.</p>
                <p>Tombol menu pada layar sempit membuka panel navigasi. Tekan Escape untuk menutupnya, dan fokus keyboard kembali ke tombol.</p>
                <p>Setiap halaman publik berikutnya akan memakai layout yang sama, jadi header dan footer cukup dibuat sekali.</p>
                <blockquote>Fondasi yang rapi membuat halaman editorial lebih mudah dibangun.</blockquote>
                <p>Paragraf penutup sebelum footer, hanya untuk memberi jarak.</p>
            </div>
        </section>
    </div>
@endsection