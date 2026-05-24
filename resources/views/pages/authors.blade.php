@extends('layouts.app')

@section('title', 'Penulis Terkenal - LibroPia')

@section('content')
<div class="container" style="max-width: 1100px; margin: 0 auto; padding: 4rem 2rem;">
    <div style="text-align: center; margin-bottom: 4rem;">
        <h1 style="font-size: 2.5rem; color: var(--text-main); margin-bottom: 1rem;">Tokoh Penulis <span style="color: var(--primary);">Terkenal</span></h1>
        <p style="color: var(--text-muted); font-size: 1.1rem;">Mengenal lebih dekat para maestro di balik karya-karya legendaris dunia.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        @foreach($authors as $author)
        <div class="card glass" style="overflow: hidden; border-radius: 20px; transition: transform 0.3s ease; border: 1px solid var(--glass-border);" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='none'">
            <img src="{{ $author['image'] }}" alt="{{ $author['name'] }}" style="width: 100%; height: 250px; object-fit: cover;">
            <div style="padding: 2rem;">
                <h3 style="color: var(--text-main); margin-bottom: 1rem; font-size: 1.4rem;">{{ $author['name'] }}</h3>
                <p style="color: var(--text-muted); line-height: 1.6;">{{ $author['description'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="glass" style="margin-top: 5rem; padding: 3rem; border-radius: 24px; text-align: center;">
        <h2 style="color: var(--text-main); margin-bottom: 1rem;">Ingin Tahu Lebih Banyak?</h2>
        <p style="color: var(--text-muted); margin-bottom: 2rem;">Kami terus memperbarui daftar penulis dan pengetahuan literasi kami setiap minggunya.</p>
        <a href="/books" class="btn btn-primary" style="padding: 0.8rem 2rem; border-radius: 12px; font-weight: 600;">Jelajahi Buku Mereka</a>
    </div>
</div>
@endsection
