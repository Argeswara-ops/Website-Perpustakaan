@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="auth-container">
    <div class="auth-card glass glass-panel">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem; font-family: 'Outfit', sans-serif; font-weight: 800; background: linear-gradient(to right, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Reset Password</h2>
            <p style="color: var(--text-muted); font-size: 1rem; margin-bottom: 2rem;">Enter your email and we'll send you a reset link.</p>
        </div>

        @if (session('status'))
            <div style="background: rgba(16, 185, 129, 0.1); border-left: 4px solid #10b981; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                <p style="color: #34d399; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ session('status') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                <p style="color: #fb7185; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ $errors->first() }}</p>
            </div>
        @endif

        <form action="/forgot-password" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" required class="form-control" placeholder="john@example.com">
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem; border-radius: 12px;">Send Reset Link</button>
            </div>
        </form>

        <div class="text-center" style="margin-top: 2rem;">
            <a href="/login" style="color: var(--text-muted); font-size: 0.95rem; text-decoration: none;">Back to Login</a>
        </div>
    </div>
</div>
@endsection
