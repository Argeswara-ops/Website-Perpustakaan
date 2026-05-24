@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="auth-container">
    <div class="auth-card glass glass-panel">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem; font-family: 'Outfit', sans-serif; font-weight: 800; background: linear-gradient(to right, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Welcome Back</h2>
            <p style="color: var(--text-muted); font-size: 1rem; margin-bottom: 2rem;">Sign in to continue exploring LibroPia.</p>
        </div>

        @if ($errors->any())
            <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                <p style="color: #fb7185; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ $errors->first() }}</p>
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" required class="form-control" placeholder="john@example.com">
            </div>

            <div class="form-group">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="form-label">Password</label>
                    <a href="/forgot-password" style="font-size: 0.85rem; color: var(--primary); text-decoration: none; margin-bottom: 0.5rem;">Forgot Password?</a>
                </div>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" required class="form-control" placeholder="••••••••" style="padding-right: 3rem;">
                    <button type="button" onclick="togglePassword('password')" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-muted); display: flex; align-items: center;">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem; border-radius: 12px;">Login</button>
            </div>
        </form>

        @push('scripts')
        <script>
            function togglePassword(id) {
                const input = document.getElementById(id);
                const icon = document.querySelector('#eye-icon');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.innerHTML = '<path d="M9.88 9.88l-3.29-3.29m7.53 7.53l3.29 3.29M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61M9.88 9.88a3 3 0 1 0 4.24 4.24m-4.24-4.24L14.12 14.12"/><line x1="2" y1="2" x2="22" y2="22"/>';
                } else {
                    input.type = 'password';
                    icon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';
                }
            }
        </script>
        @endpush

        <div class="text-center" style="margin-top: 2rem;">
            <p style="font-size: 0.95rem; color: var(--text-muted);">
                Don't have an account? 
                <a href="/register" style="color: var(--primary); font-weight: 600;">Register here</a>
            </p>
        </div>
    </div>
</div>
@endsection
