<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'TaskFlow') — Task Manager</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex flex-col">

        <div class="fixed inset-0 pointer-events-none overflow-hidden">
            <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[600px] bg-violet-600/8 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-cyan-500/4 rounded-full blur-3xl"></div>
            <div class="absolute inset-0"
                style="background-image: linear-gradient(rgba(148,163,184,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(148,163,184,0.025) 1px, transparent 1px); background-size: 64px 64px;"></div>
        </div>

        <header class="relative z-10 w-full px-6 py-5 flex items-center justify-between max-w-6xl mx-auto w-full">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 text-white font-bold text-lg tracking-tight">
                <span class="w-8 h-8 rounded-lg bg-violet-600 flex items-center justify-center text-white text-sm font-bold shadow-lg shadow-violet-500/30">T</span>
                Task<span class="text-violet-400">Flow</span>
            </a>
            <a href="{{ route('home') }}"
            class="flex items-center gap-2 text-sm text-slate-500 hover:text-slate-300 transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Back to home
            </a>
        </header>

        <main class="relative z-10 flex flex-1 items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">
                @yield('content')
            </div>
        </main>

        <footer class="relative z-10 py-6 text-center text-xs text-slate-700">
            &copy; {{ date('Y') }} Task Management System. All rights reserved.
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </body>
</html>
