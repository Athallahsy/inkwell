@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="width:100%; max-width:420px;">

    {{-- Header --}}
    <div style="text-align:center; margin-bottom:32px;">
        <span style="display:block; font-size:.68rem; font-weight:700; letter-spacing:.2em; text-transform:uppercase; color:#c2410c; margin-bottom:8px;">Inkwell · Journal</span>
        <h1 style="font-family:Georgia,serif; font-size:1.8rem; font-weight:700; color:#1c1917; margin:0 0 8px;">Welcome back</h1>
        <p style="font-size:.88rem; color:#78716c; margin:0;">Login to manage your articles</p>
    </div>

    {{-- Error --}}
    @if($errors->any())
    <div style="background:#fff4ef; border:1px solid #fca99a; border-radius:8px; padding:12px 16px; margin-bottom:20px;">
        @foreach($errors->all() as $error)
        <p style="font-size:.83rem; color:#c2410c; margin:0;">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    {{-- Card --}}
    <div style="background:#fff; border:1px solid #e9e7e1; border-radius:12px; padding:32px;">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:.75rem; font-weight:600; color:#78716c; text-transform:uppercase; letter-spacing:.08em; margin-bottom:8px;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       style="width:100%; padding:10px 14px; border:1px solid #e9e7e1; border-radius:8px; font-size:.9rem; color:#1c1917; background:#f8f7f4; outline:none; transition:border-color .2s;"
                       onfocus="this.style.borderColor='#c2410c'" onblur="this.style.borderColor='#e9e7e1'"
                       placeholder="you@example.com">
            </div>

            {{-- Password --}}
            <div style="margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                    <label style="font-size:.75rem; font-weight:600; color:#78716c; text-transform:uppercase; letter-spacing:.08em;">Password</label>
                    @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size:.75rem; color:#c2410c; text-decoration:none; font-weight:500;">Forgot password?</a>
                    @endif
                </div>
                <input type="password" name="password" required
                       style="width:100%; padding:10px 14px; border:1px solid #e9e7e1; border-radius:8px; font-size:.9rem; color:#1c1917; background:#f8f7f4; outline:none; transition:border-color .2s;"
                       onfocus="this.style.borderColor='#c2410c'" onblur="this.style.borderColor='#e9e7e1'"
                       placeholder="••••••••">
            </div>

            {{-- Remember me --}}
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:24px;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                       style="width:16px; height:16px; accent-color:#c2410c; cursor:pointer;">
                <label for="remember" style="font-size:.83rem; color:#78716c; cursor:pointer;">Remember me</label>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    style="width:100%; padding:11px; background:#c2410c; color:#fff; border:none; border-radius:8px; font-size:.9rem; font-weight:600; cursor:pointer; transition:background .2s;"
                    onmouseover="this.style.background='#9a330a'" onmouseout="this.style.background='#c2410c'">
                Login
            </button>
        </form>
    </div>

    {{-- Register link --}}
    <p style="text-align:center; margin-top:20px; font-size:.83rem; color:#78716c;">
        Don't have an account?
        <a href="{{ route('register') }}" style="color:#c2410c; font-weight:600; text-decoration:none;">Register</a>
    </p>

</div>
@endsection
