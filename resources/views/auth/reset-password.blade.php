@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="auth-container">
    <div class="auth-card glass glass-panel">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem; font-family: 'Outfit', sans-serif; font-weight: 800; background: linear-gradient(to right, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Set New Password</h2>
            <p style="color: var(--text-muted); font-size: 1rem; margin-bottom: 2rem;">Please enter your new password below.</p>
        </div>

        @if ($errors->any())
            <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                <p style="color: #fb7185; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ $errors->first() }}</p>
            </div>
        @endif

        <form action="/reset-password" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" required class="form-control" placeholder="john@example.com">
            </div>

            <div class="form-group">
                <label class="form-label">New Password</label>
                <input type="password" name="password" required class="form-control" placeholder="••••••••">
            </div>

            <div class="form-group">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" required class="form-control" placeholder="••••••••">
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem; border-radius: 12px;">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
