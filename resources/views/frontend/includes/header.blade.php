<nav class="sticky top-0 z-50 border-b border-slate-800/60 bg-slate-950/80 backdrop-blur-xl">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between gap-6">

        {{-- Brand --}}
        <a href="{{ route('home') }}"
            class="flex items-center gap-2.5 text-white font-bold text-lg tracking-tight shrink-0">
            <span
                class="w-8 h-8 rounded-lg bg-violet-600 flex items-center justify-center text-white text-sm font-bold shadow-lg shadow-violet-500/30">T</span>
            Task<span class="text-violet-400">Management</span>
        </a>

        {{-- Nav links (desktop) --}}
        <div class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors
                        {{ request()->routeIs('home') ? 'bg-violet-600/15 text-violet-300' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                Home
            </a>
            <a href="{{ route('admin.tasks.index') }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors
                        {{ request()->routeIs('tasks.*') ? 'bg-violet-600/15 text-violet-300' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                Tasks
            </a>
        </div>

        {{-- Right side --}}
        <div class="flex items-center gap-3">

            {{-- New task button (always visible on desktop) --}}
            <a href="{{ route('admin.tasks.create') }}"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-medium transition-all duration-150">
                <i class="fa-solid fa-plus text-xs text-violet-400"></i>
                New Task
            </a>

            <div class="hidden sm:block w-px h-5 bg-slate-800"></div>

            @auth
                {{-- ── USER DROPDOWN ── --}}
                <div class="relative" id="user-menu-wrapper">
                    <button id="user-menu-btn"
                        class="flex items-center gap-2.5 px-3 py-2 rounded-xl border border-slate-700 hover:border-slate-600 bg-slate-800/60 hover:bg-slate-800 text-slate-200 text-sm font-medium transition-all duration-150 group">
                        {{-- Avatar circle with first letter --}}
                        <span
                            class="w-6 h-6 rounded-lg bg-violet-600 flex items-center justify-center text-white text-xs font-bold shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <span class="hidden sm:block max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-500 group-hover:text-slate-400 transition-transform duration-200"
                            id="user-chevron"></i>
                    </button>

                    {{-- Dropdown panel --}}
                    <div id="user-dropdown"
                        class="hidden absolute right-0 top-full mt-2 w-52 bg-slate-900 border border-slate-700/80 rounded-2xl shadow-2xl shadow-black/50 overflow-hidden z-50">

                        {{-- User info header --}}
                        <div class="px-4 py-3.5 border-b border-slate-800">
                            <p class="text-xs text-slate-500 mb-0.5">Signed in as</p>
                            <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-600 truncate mt-0.5">{{ Auth::user()->email }}</p>
                        </div>

                        {{-- Menu items --}}
                        <div class="py-1.5">
                            <a href="{{ route('admin.tasks.index') }}"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                                <i class="fa-solid fa-list-check w-4 text-center text-slate-500"></i>
                                My Tasks
                            </a>
                            <a href="{{ route('admin.tasks.create') }}"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                                <i class="fa-solid fa-plus w-4 text-center text-slate-500"></i>
                                New Task
                            </a>
                        </div>

                        {{-- Logout --}}
                        <div class="border-t border-slate-800 py-1.5">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors text-left">
                                    <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center"></i>
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                {{-- ── GUEST --}}
                <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-lg text-sm font-medium text-slate-400 hover:text-slate-200 hover:bg-slate-800/60 transition-colors">
                    Log in
                </a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 rounded-lg bg-violet-600 hover:bg-violet-500 text-white text-sm font-semibold transition-all duration-150 shadow-lg shadow-violet-500/20 hover:shadow-violet-500/30">
                    Register
                </a>
            @endauth

            {{-- Mobile hamburger --}}
            <button id="mobile-menu-btn"
                class="md:hidden flex items-center justify-center w-9 h-9 rounded-lg border border-slate-700 text-slate-400 hover:text-slate-200 hover:bg-slate-800 transition-colors">
                <i class="fa-solid fa-bars text-sm"></i>
            </button>
        </div>
    </div>

    {{-- ── MOBILE MENU ── --}}
    <div id="mobile-menu"
        class="hidden md:hidden border-t border-slate-800/60 bg-slate-950/95 px-6 py-4 flex flex-col gap-1">
        <a href="{{ route('home') }}"
            class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 transition-colors">Home</a>
        <a href="{{ route('admin.tasks.index') }}"
            class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 transition-colors">Tasks</a>
        <a href="{{ route('admin.tasks.create') }}"
            class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 transition-colors">New
            Task</a>
        <div class="h-px bg-slate-800 my-2"></div>

        @auth
            {{-- Logged-in mobile --}}
            <div class="flex items-center gap-3 px-4 py-2.5">
                <span
                    class="w-7 h-7 rounded-lg bg-violet-600 flex items-center justify-center text-white text-xs font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
                <div>
                    <p class="text-sm font-semibold text-white leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-600 leading-tight">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-red-400 hover:bg-red-500/10 transition-colors text-left mt-1">
                    <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
                    Log out
                </button>
            </form>
        @else
            {{-- Guest mobile --}}
            <a href="{{ route('login') }}"
                class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 transition-colors">Log
                in</a>
            <a href="{{ route('register') }}"
                class="px-4 py-2.5 rounded-lg text-sm font-semibold text-center bg-violet-600 hover:bg-violet-500 text-white transition-colors mt-1">Register</a>
        @endauth
    </div>
</nav>