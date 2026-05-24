@extends('layouts.app')

@section('title', 'Tentang Kami - LibroPia')

@section('content')
<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .animate-in {
        animation: fadeInUp 0.8s ease forwards;
    }

    .delay-1 { animation-delay: 0.2s; opacity: 0; }
    .delay-2 { animation-delay: 0.4s; opacity: 0; }
    .delay-3 { animation-delay: 0.6s; opacity: 0; }

    .about-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .about-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: var(--primary);
    }

    .vision-mision-card {
        padding: 3rem;
        border-radius: 28px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--glass-border);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }

    .vision-mision-card:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: var(--primary);
    }

    .misi-item {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
        align-items: flex-start;
    }

    .misi-number {
        background: var(--primary);
        color: white;
        width: 32px;
        height: 32px;
        min-width: 32px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 4px 10px rgba(var(--primary-rgb), 0.3);
    }

    .icon-container {
        width: 60px;
        height: 60px;
        background: var(--primary-light);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        color: var(--primary);
        animation: float 3s ease-in-out infinite;
    }
</style>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 5rem 2rem;">
    <!-- Hero Section -->
    <div class="glass animate-in" style="padding: 5rem 3rem; border-radius: 32px; text-align: center; border: 1px solid var(--glass-border); margin-bottom: 4rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -100px; right: -100px; width: 300px; height: 300px; background: var(--primary); filter: blur(150px); opacity: 0.1; pointer-events: none;"></div>
        <div style="position: absolute; bottom: -100px; left: -100px; width: 300px; height: 300px; background: var(--secondary); filter: blur(150px); opacity: 0.1; pointer-events: none;"></div>
        
        <h1 style="font-size: 4rem; margin-bottom: 1.5rem; color: var(--text-main); font-weight: 800;">
            Tentang <span style="background: linear-gradient(45deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">LibroPia</span>
        </h1>
        
        <p style="font-size: 1.35rem; line-height: 1.8; color: var(--text-muted); max-width: 850px; margin: 0 auto 4rem auto;">
            LibroPia adalah jembatan digital menuju dunia pengetahuan. Kami hadir untuk mentransformasi pengalaman membaca tradisional menjadi ekosistem digital yang modern, inklusif, dan menginspirasi.
        </p>

        <!-- Info Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; text-align: left;">
            <div class="glass about-card delay-1 animate-in" style="padding: 2.5rem; border-radius: 24px;">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <h3 style="color: var(--text-main); font-size: 1.6rem; margin-bottom: 1rem;">Lokasi Fisik</h3>
                <p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.6;">
                    Gedung Literasi Digital Lt. 4<br>
                    Jl. Teknologi Informasi Kav. 12-15<br>
                    Jakarta Pusat, Indonesia 10110
                </p>
            </div>

            <div class="glass about-card delay-1 animate-in" style="padding: 2.5rem; border-radius: 24px;">
                <div class="icon-container" style="animation-delay: 0.5s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </div>
                <h3 style="color: var(--text-main); font-size: 1.6rem; margin-bottom: 1rem;">Hubungi Kami</h3>
                <p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.6;">
                    <strong>Email:</strong> support@libropia.com<br>
                    <strong>WA:</strong> +62 878-5169-7466<br>
                    <strong>Jam Kerja:</strong> 09:00 - 18:00 WIB
                </p>
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div style="margin-top: 5rem;">
        <h2 class="animate-in delay-2" style="color: var(--text-main); font-size: 3rem; text-align: center; margin-bottom: 4rem; font-weight: 800;">Visi & Misi Kami</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 3rem; align-items: stretch;">
            <!-- Vision -->
            <div class="vision-mision-card animate-in delay-2">
                <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                    <div style="background: linear-gradient(to bottom, var(--primary), var(--secondary)); width: 12px; height: 60px; border-radius: 6px;"></div>
                    <h3 style="color: var(--text-main); font-size: 2.5rem; margin: 0; font-weight: 700;">Visi</h3>
                </div>
                <div style="flex-grow: 1; display: flex; align-items: center;">
                    <p style="color: var(--text-muted); font-size: 1.6rem; line-height: 1.7; font-weight: 400; font-style: italic; border-left: 4px solid rgba(var(--primary-rgb), 0.2); padding-left: 1.5rem;">
                        "Menjadi katalis utama dalam revolusi literasi digital Indonesia, menciptakan masyarakat yang cerdas, kritis, dan berwawasan luas melalui akses informasi tanpa batas."
                    </p>
                </div>
            </div>

            <!-- Mission -->
            <div class="vision-mision-card animate-in delay-3">
                <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                    <div style="background: linear-gradient(to bottom, var(--secondary), var(--primary)); width: 12px; height: 60px; border-radius: 6px;"></div>
                    <h3 style="color: var(--text-main); font-size: 2.5rem; margin: 0; font-weight: 700;">Misi</h3>
                </div>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div class="misi-item">
                        <div class="misi-number">1</div>
                        <p style="color: var(--text-muted); font-size: 1.3rem; margin: 0; line-height: 1.5;">Membangun platform perpustakaan digital yang intuitif dan mudah diakses siapa saja.</p>
                    </div>
                    <div class="misi-item">
                        <div class="misi-number" style="background: var(--secondary);">2</div>
                        <p style="color: var(--text-muted); font-size: 1.3rem; margin: 0; line-height: 1.5;">Menyediakan koleksi literatur yang kuratif, berkualitas, dan relevan dengan zaman.</p>
                    </div>
                    <div class="misi-item">
                        <div class="misi-number">3</div>
                        <p style="color: var(--text-muted); font-size: 1.3rem; margin: 0; line-height: 1.5;">Mendorong budaya membaca melalui fitur interaktif dan komunitas yang aktif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="glass animate-in delay-3" style="margin-top: 6rem; padding: 5rem 3rem; border-radius: 40px; text-align: center; background: linear-gradient(135deg, rgba(var(--primary-rgb), 0.1), rgba(var(--secondary-rgb), 0.1)); border: 1px solid var(--glass-border);">
        <h2 style="color: var(--text-main); font-size: 2.5rem; margin-bottom: 1.5rem; font-weight: 700;">Siap Memulai Perjalanan Anda?</h2>
        <p style="color: var(--text-muted); font-size: 1.25rem; margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto;">
            Ribuan judul buku menanti untuk Anda jelajahi. Bergabunglah dengan komunitas pembaca LibroPia sekarang.
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
            <a href="/books" class="btn btn-primary" style="padding: 1.2rem 3rem; border-radius: 16px; font-weight: 700; font-size: 1.2rem; box-shadow: 0 10px 20px rgba(var(--primary-rgb), 0.2);">Mulai Membaca</a>
            <a href="/register" class="btn btn-outline" style="padding: 1.2rem 3rem; border-radius: 16px; font-weight: 700; font-size: 1.2rem;">Daftar Akun</a>
        </div>
    </div>
</div>
@endsection
