@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
<div class="dashboard-layout">
    <div class="sidebar">
        <div class="navbar-brand mb-4" style="text-align: center;">LibroPia</div>
        <a href="/" class="btn-outline" style="text-align: center; margin-bottom: 2rem;">Back to Home</a>
        <a href="/user/dashboard">My Favorites</a>
        <a href="/user/profile" class="active">Profile Settings</a>
        <form action="/logout" method="POST" style="margin-top: auto; padding-top: 2rem;">
            @csrf
            <button class="btn btn-danger" style="width: 100%;">Logout</button>
        </form>
    </div>
    
    <div class="main-content">
        <h2>Profile Settings</h2>
        <p class="text-muted mb-4">Manage your account information and password.</p>
        
        <div class="glass glass-panel" style="padding: 2.5rem; border-radius: 20px; max-width: 700px;">
            @if (session('status'))
                <div style="background: rgba(16, 185, 129, 0.1); border-left: 4px solid #10b981; padding: 1rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <p style="color: #34d399; font-size: 0.95rem; font-weight: 500; margin: 0;">{{ session('status') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul style="margin: 0; padding-left: 1rem; color: #fb7185; font-size: 0.9rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/user/profile" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div style="display: flex; gap: 2rem; align-items: center; margin-bottom: 2.5rem;">
                    <div style="position: relative;">
                        <img src="{{ $user->avatar ?: 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=6366f1&color=fff' }}" 
                             alt="Profile" id="avatar-preview"
                             style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid var(--glass-border);">
                        <label for="avatar-input" style="position: absolute; bottom: 0; right: 0; background: var(--primary); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 2px solid var(--glass-bg);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                        </label>
                        <input type="file" name="avatar" id="avatar-input" style="display: none;" onchange="previewImage(this)">
                    </div>
                    <div>
                        <h4 style="margin: 0; color: var(--text-main);">Profile Picture</h4>
                        <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--text-muted);">PNG, JPG up to 2MB</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="form-control" placeholder="Your Name">
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="form-control" placeholder="your@email.com">
                </div>

                <hr style="border: 0; border-top: 1px solid var(--glass-border); margin: 2.5rem 0;">

                <div style="margin-bottom: 2rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;" onclick="togglePasswordSection()">
                        <input type="checkbox" id="change-password-toggle" style="width: 18px; height: 18px; cursor: pointer;">
                        <h4 style="color: var(--text-main); margin: 0; font-weight: 600;">Change Password</h4>
                    </div>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0.5rem 0 0 1.9rem;">Check this if you want to update your password.</p>
                </div>

                <div id="password-section" style="display: none; padding-left: 1.9rem; border-left: 2px solid var(--primary-light);">
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div style="position: relative;">
                            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" style="padding-right: 3rem;">
                            <button type="button" onclick="toggleProfilePassword('password', 'eye-p1')" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-muted); display: flex; align-items: center;">
                                <svg id="eye-p1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <div style="position: relative;">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••" style="padding-right: 3rem;">
                            <button type="button" onclick="toggleProfilePassword('password_confirmation', 'eye-p2')" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-muted); display: flex; align-items: center;">
                                <svg id="eye-p2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 2rem; background: rgba(var(--primary-rgb), 0.05); padding: 1.5rem; border-radius: 15px; border: 1px dashed var(--primary-light);">
                        <label class="form-label" style="color: var(--primary);">Email Verification Code</label>
                        <div style="display: flex; gap: 1rem;">
                            <input type="text" name="verification_code" class="form-control" placeholder="6-digit code" style="flex: 1;">
                            <button type="button" id="send-code-btn" onclick="sendVerificationCode()" class="btn btn-outline" style="white-space: nowrap; font-size: 0.9rem;">Send Code</button>
                        </div>
                        <p style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.5rem;">We'll send a code to your email to confirm the change.</p>
                    </div>
                </div>

                <div style="margin-top: 3rem;">
                    <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2.5rem; border-radius: 12px; font-weight: 700; box-shadow: 0 4px 15px rgba(var(--primary-rgb), 0.3);">Save Profile Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function togglePasswordSection() {
        const toggle = document.getElementById('change-password-toggle');
        const section = document.getElementById('password-section');
        
        // If clicking the text/container, flip the checkbox
        if (event.target.id !== 'change-password-toggle') {
            toggle.checked = !toggle.checked;
        }
        
        section.style.display = toggle.checked ? 'block' : 'none';
        
        // Clear inputs if unticked
        if (!toggle.checked) {
            section.querySelectorAll('input').forEach(input => input.value = '');
        }
    }

    function toggleProfilePassword(inputId, eyeId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(eyeId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = '<path d="M9.88 9.88l-3.29-3.29m7.53 7.53l3.29 3.29M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61M9.88 9.88a3 3 0 1 0 4.24 4.24m-4.24-4.24L14.12 14.12"/><line x1="2" y1="2" x2="22" y2="22"/>';
        } else {
            input.type = 'password';
            icon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';
        }
    }

    async function sendVerificationCode() {
        const btn = document.getElementById('send-code-btn');
        btn.disabled = true;
        btn.innerText = 'Sending...';

        try {
            const response = await fetch('/user/send-password-code', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            const data = await response.json();
            if (data.status === 'success') {
                alert('Verification code sent to your email! (Check your email/log)');
                btn.innerText = 'Sent!';
            } else {
                alert('Failed to send code. Please try again.');
                btn.disabled = false;
                btn.innerText = 'Send Code';
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred.');
            btn.disabled = false;
            btn.innerText = 'Send Code';
        }
    }
</script>
@endpush
@endsection
