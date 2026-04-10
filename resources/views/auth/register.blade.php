@extends('layouts.guest')
@section('title', 'Register')

@section('content')
    <div class="bg-slate-900/80 border border-slate-700/60 rounded-2xl shadow-2xl shadow-black/50 overflow-hidden backdrop-blur-sm">

        {{-- Card header --}}
        <div class="px-8 pt-8 pb-6 border-b border-slate-800">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-10 h-10 rounded-xl bg-violet-600/20 border border-violet-500/30 flex items-center justify-center text-violet-400 text-lg">
                    <i class="fa-solid fa-user-plus"></i>
                </span>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Create an account</h1>
            <p class="text-sm text-slate-500 mt-1.5">Join and start organizing your work today.</p>
        </div>

        {{-- Form --}}
        <div class="px-8 py-7">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-slate-300 mb-2">
                        Full name
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-600 pointer-events-none">
                            <i class="fa-solid fa-user text-xs"></i>
                        </span>
                        <input id="name" type="text" name="name"
                            value="{{ old('name') }}"
                            required autofocus autocomplete="name"
                            placeholder="John Doe"
                            class="w-full pl-9 pr-4 py-2.5 bg-slate-800/60 border {{ $errors->has('name') ? 'border-red-500/60 focus:border-red-500' : 'border-slate-700 focus:border-violet-500' }} rounded-xl text-sm text-slate-200 placeholder-slate-600 outline-none transition-colors focus:ring-2 {{ $errors->has('name') ? 'focus:ring-red-500/20' : 'focus:ring-violet-500/20' }}">
                    </div>
                    @error('name')
                        <p class="flex items-center gap-1.5 text-xs text-red-400 mt-2">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-slate-300 mb-2">
                        Email address
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-600 pointer-events-none">
                            <i class="fa-solid fa-envelope text-xs"></i>
                        </span>
                        <input id="email" type="email" name="email"
                            value="{{ old('email') }}"
                            required autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full pl-9 pr-4 py-2.5 bg-slate-800/60 border {{ $errors->has('email') ? 'border-red-500/60 focus:border-red-500' : 'border-slate-700 focus:border-violet-500' }} rounded-xl text-sm text-slate-200 placeholder-slate-600 outline-none transition-colors focus:ring-2 {{ $errors->has('email') ? 'focus:ring-red-500/20' : 'focus:ring-violet-500/20' }}">
                    </div>
                    @error('email')
                        <p class="flex items-center gap-1.5 text-xs text-red-400 mt-2">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-600 pointer-events-none">
                            <i class="fa-solid fa-lock text-xs"></i>
                        </span>
                        <input id="password" type="password" name="password"
                            required autocomplete="new-password"
                            placeholder="Min. 8 characters"
                            class="w-full pl-9 pr-11 py-2.5 bg-slate-800/60 border {{ $errors->has('password') ? 'border-red-500/60 focus:border-red-500' : 'border-slate-700 focus:border-violet-500' }} rounded-xl text-sm text-slate-200 placeholder-slate-600 outline-none transition-colors focus:ring-2 {{ $errors->has('password') ? 'focus:ring-red-500/20' : 'focus:ring-violet-500/20' }}">
                        <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-600 hover:text-slate-400 transition-colors">
                            <i class="fa-solid fa-eye text-xs"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="flex items-center gap-1.5 text-xs text-red-400 mt-2">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-7">
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-2">
                        Confirm password
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-600 pointer-events-none">
                            <i class="fa-solid fa-lock text-xs"></i>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            required autocomplete="new-password"
                            placeholder="Repeat your password"
                            class="w-full pl-9 pr-11 py-2.5 bg-slate-800/60 border {{ $errors->has('password_confirmation') ? 'border-red-500/60 focus:border-red-500' : 'border-slate-700 focus:border-violet-500' }} rounded-xl text-sm text-slate-200 placeholder-slate-600 outline-none transition-colors focus:ring-2 {{ $errors->has('password_confirmation') ? 'focus:ring-red-500/20' : 'focus:ring-violet-500/20' }}">
                        <button type="button" id="toggle-confirm-password"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-600 hover:text-slate-400 transition-colors">
                            <i class="fa-solid fa-eye text-xs"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="flex items-center gap-1.5 text-xs text-red-400 mt-2">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-6 py-3 bg-violet-600 hover:bg-violet-500 text-white text-sm font-semibold rounded-xl shadow-lg shadow-violet-500/25 hover:shadow-violet-500/35 transition-all duration-150 hover:-translate-y-0.5">
                    <i class="fa-solid fa-user-plus text-xs"></i>
                    Create account
                </button>
            </form>
        </div>

        {{-- Card footer --}}
        <div class="px-8 py-5 bg-slate-950/40 border-t border-slate-800 text-center">
            <p class="text-sm text-slate-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-violet-400 hover:text-violet-300 font-medium transition-colors ml-1">
                    Log in
                </a>
            </p>
        </div>
    </div>

    <script>
        $(function () {
            function toggleVisibility(btnId, inputId) {
                $('#' + btnId).on('click', function () {
                    const $input = $('#' + inputId);
                    const $icon  = $(this).find('i');
                    const isHidden = $input.attr('type') === 'password';
                    $input.attr('type', isHidden ? 'text' : 'password');
                    $icon.toggleClass('fa-eye', !isHidden).toggleClass('fa-eye-slash', isHidden);
                });
            }
            toggleVisibility('toggle-password', 'password');
            toggleVisibility('toggle-confirm-password', 'password_confirmation');
        });
    </script>
@endsection
