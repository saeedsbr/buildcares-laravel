<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign in — BuildCares Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light-alt antialiased min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-md">
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
            <div class="font-display text-2xl font-bold text-dark-900">Build<span class="text-gold">Cares</span></div>
        </a>
        <div class="text-xs uppercase tracking-widest text-slate-500 mt-1">Admin Panel</div>
    </div>

    <div class="card-light rounded-xl p-8 shadow-sm">
        <h1 class="font-display text-xl font-semibold text-dark-900 mb-1">Sign in</h1>
        <p class="text-slate-500 text-sm mb-6">Access the admin dashboard.</p>

        @if($errors->any())
        <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-700 text-sm">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.attempt') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" autofocus required
                       class="input-dark" placeholder="you@buildcares.com">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Password</label>
                <input type="password" name="password" required class="input-dark" placeholder="••••••••">
            </div>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember" value="1" class="w-4 h-4 accent-gold"
                       {{ old('remember') ? 'checked' : '' }}>
                <span class="text-slate-600 text-sm">Remember me</span>
            </label>

            <button type="submit" class="btn-gold w-full justify-center text-xs py-3">
                Sign in
            </button>
        </form>
    </div>

    <p class="text-center text-slate-500 text-xs mt-6">
        <a href="{{ route('home') }}" class="hover:text-gold transition-colors">&larr; Back to website</a>
    </p>
</div>

</body>
</html>
