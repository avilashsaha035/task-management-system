@extends('layouts.app')
@section('title', 'Task Management System')

@section('content')

{{-- ── HERO ── --}}
<section class="relative flex flex-col items-center justify-center text-center px-6 pt-28 pb-24 overflow-hidden">

    {{-- Glows --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-20 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-violet-600/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 right-0 w-[400px] h-[400px] bg-cyan-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-violet-800/8 rounded-full blur-3xl"></div>
    </div>

    {{-- Grid pattern overlay --}}
    <div class="absolute inset-0 pointer-events-none"
         style="background-image: linear-gradient(rgba(148,163,184,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(148,163,184,0.03) 1px, transparent 1px); background-size: 64px 64px;"></div>

    {{-- Eyebrow badge --}}
    <div class="relative inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase text-violet-400 border border-violet-500/25 bg-violet-500/8 px-4 py-2 rounded-full mb-10">
        <span class="w-1.5 h-1.5 rounded-full bg-violet-400 animate-pulse"></span>
        Task Management · Built for Teams
    </div>

    {{-- Headline --}}
    <h1 class="relative text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tighter leading-[1.05] text-white mb-7 max-w-3xl">
        Organize work.<br>
        <span class="bg-gradient-to-r from-violet-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent">
            Ship with clarity.
        </span>
    </h1>

    {{-- Subtitle --}}
    <p class="relative text-lg text-slate-400 font-light leading-relaxed max-w-xl mb-12">
        A focused task system for teams who value simplicity. Create, track, and complete work
        — without the noise of heavyweight tools.
    </p>

    {{-- CTAs --}}
    <div class="relative flex flex-wrap items-center justify-center gap-3 mb-16">
        <a href="{{ route('admin.tasks.create') }}"
           class="inline-flex items-center gap-2 px-7 py-3.5 bg-violet-600 hover:bg-violet-500 text-white text-sm font-semibold rounded-xl shadow-xl shadow-violet-500/25 hover:shadow-violet-500/40 transition-all duration-200 hover:-translate-y-0.5">
            <i class="fa-solid fa-plus text-xs"></i>
            Start for free
        </a>
        <a href="{{ route('admin.tasks.index') }}"
           class="inline-flex items-center gap-2 px-6 py-3.5 bg-slate-800/80 hover:bg-slate-700/80 text-slate-300 hover:text-white text-sm font-medium rounded-xl border border-slate-700 hover:border-slate-600 transition-all duration-200">
            <i class="fa-solid fa-eye text-xs text-slate-500"></i>
            View all tasks
        </a>
    </div>

    {{-- Trust strip --}}
    <div class="relative flex flex-wrap items-center justify-center gap-8 text-xs text-slate-600">
        <span class="flex items-center gap-2"><i class="fa-solid fa-shield-halved text-violet-600"></i> No credit card needed</span>
        <span class="flex items-center gap-2"><i class="fa-solid fa-bolt text-violet-600"></i> Setup in 30 seconds</span>
        <span class="flex items-center gap-2"><i class="fa-solid fa-code text-violet-600"></i> Open source</span>
    </div>
</section>

{{-- ── DASHBOARD PREVIEW ── --}}
<div class="px-6 pb-28 max-w-5xl mx-auto w-full">

    {{-- Glow behind preview --}}
    <div class="relative">
        <div class="absolute -inset-4 bg-violet-600/5 rounded-3xl blur-2xl pointer-events-none"></div>

        <div class="relative rounded-2xl border border-slate-700/60 overflow-hidden shadow-2xl shadow-black/60">

            {{-- Browser chrome --}}
            <div class="flex items-center gap-3 px-5 py-3.5 bg-slate-900 border-b border-slate-800">
                <div class="flex gap-1.5">
                    <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400/80"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                </div>
                <div class="flex-1 flex justify-center">
                    <span class="text-xs font-mono text-slate-600 bg-slate-800 border border-slate-700 rounded-lg px-4 py-1.5 max-w-[200px] w-full text-center">
                        taskflow.app/tasks
                    </span>
                </div>
                <div class="w-12"></div>
            </div>

            {{-- App content --}}
            <div class="bg-slate-950 p-6 sm:p-8">

                {{-- Page header inside preview --}}
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-white font-semibold text-base tracking-tight">My Tasks</h2>
                        <p class="text-slate-600 text-xs mt-0.5">15 tasks total</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-violet-600/15 border border-violet-500/20 text-violet-400 text-xs font-semibold">
                        <i class="fa-solid fa-plus text-[10px]"></i> New Task
                    </span>
                </div>

                {{-- Stat cards --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
                    <div class="bg-slate-900 border border-slate-800 rounded-xl p-4">
                        <p class="text-xs text-slate-600 uppercase tracking-wider mb-2">Total</p>
                        <p class="text-2xl font-bold text-white tracking-tight">15</p>
                    </div>
                    <div class="bg-amber-500/5 border border-amber-500/15 rounded-xl p-4">
                        <p class="text-xs text-amber-700 uppercase tracking-wider mb-2">Pending</p>
                        <p class="text-2xl font-bold text-amber-400 tracking-tight">5</p>
                    </div>
                    <div class="bg-blue-500/5 border border-blue-500/15 rounded-xl p-4">
                        <p class="text-xs text-blue-700 uppercase tracking-wider mb-2">In Progress</p>
                        <p class="text-2xl font-bold text-blue-400 tracking-tight">4</p>
                    </div>
                    <div class="bg-emerald-500/5 border border-emerald-500/15 rounded-xl p-4">
                        <p class="text-xs text-emerald-700 uppercase tracking-wider mb-2">Completed</p>
                        <p class="text-2xl font-bold text-emerald-400 tracking-tight">6</p>
                    </div>
                </div>

                {{-- Task rows --}}
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm">
                        <span class="w-2 h-2 rounded-full bg-amber-400 shrink-0"></span>
                        <span class="flex-1 text-slate-200 font-medium text-sm">Design landing page mockup</span>
                        <span class="hidden sm:block text-xs text-slate-600 font-medium mr-2">Due Apr 20</span>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/15">Pending</span>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-900 border border-violet-500/20 rounded-xl px-4 py-3 text-sm ring-1 ring-violet-500/10">
                        <span class="w-2 h-2 rounded-full bg-blue-400 shrink-0"></span>
                        <span class="flex-1 text-slate-200 font-medium text-sm">Implement user authentication</span>
                        <span class="hidden sm:block text-xs text-slate-600 font-medium mr-2">Due Apr 22</span>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/15">In Progress</span>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 shrink-0"></span>
                        <span class="flex-1 text-slate-400 font-medium text-sm line-through decoration-slate-600">Set up database migrations</span>
                        <span class="hidden sm:block text-xs text-slate-600 font-medium mr-2">Apr 10</span>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/15">Completed</span>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm opacity-70">
                        <span class="w-2 h-2 rounded-full bg-amber-400 shrink-0"></span>
                        <span class="flex-1 text-slate-200 font-medium text-sm">Write unit tests for API endpoints</span>
                        <span class="hidden sm:block text-xs text-slate-600 font-medium mr-2">Due Apr 25</span>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/15">Pending</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── SECTION DIVIDER ── --}}
<div class="max-w-5xl mx-auto px-6"><div class="border-t border-slate-800/80"></div></div>

{{-- ── FEATURES ── --}}
<section class="px-6 py-24 max-w-5xl mx-auto w-full">

    <div class="mb-16">
        <p class="text-xs font-bold tracking-widest uppercase text-violet-400 mb-4">Features</p>
        <h2 class="text-4xl sm:text-5xl font-bold tracking-tighter text-white leading-tight mb-5">
            Built for real work,<br>
            <span class="text-slate-500">not busywork.</span>
        </h2>
        <p class="text-base text-slate-500 font-light leading-relaxed max-w-md">
            Every feature earns its place. No bloat, no clutter — just tools your team actually uses every day.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        @php
        $features = [
            ['icon' => 'fa-bolt',            'color' => 'violet', 'title' => 'Instant creation',      'desc' => 'Add tasks with title, priority, and due date in seconds. No friction between thought and action.'],
            ['icon' => 'fa-chart-bar',       'color' => 'cyan',   'title' => 'Progress overview',     'desc' => 'See counts across all statuses at a glance. Know exactly where your team stands.'],
            ['icon' => 'fa-filter',          'color' => 'violet', 'title' => 'Smart filtering',       'desc' => 'Filter by status or priority, search by keyword. Surface the tasks that matter right now.'],
            ['icon' => 'fa-flag',            'color' => 'cyan',   'title' => 'Priority levels',       'desc' => 'Tag tasks as Low, Medium, or High so your team always knows what to tackle first.'],
            ['icon' => 'fa-calendar-check',  'color' => 'violet', 'title' => 'Due date tracking',     'desc' => 'Set deadlines and surface overdue tasks automatically. Nothing slips through the cracks.'],
            ['icon' => 'fa-arrows-rotate',   'color' => 'cyan',   'title' => 'Status updates',        'desc' => 'Move tasks Pending → In Progress → Completed with a single click. Stay in flow.'],
        ];
        @endphp

        @foreach($features as $f)
        <div class="group bg-slate-900/50 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 rounded-2xl p-6 transition-all duration-200 hover:-translate-y-0.5">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-5 text-base
                {{ $f['color'] === 'violet' ? 'bg-violet-500/10 border border-violet-500/20 text-violet-400' : 'bg-cyan-500/10 border border-cyan-500/20 text-cyan-400' }}">
                <i class="fa-solid {{ $f['icon'] }}"></i>
            </div>
            <h3 class="text-sm font-semibold text-white mb-2">{{ $f['title'] }}</h3>
            <p class="text-sm text-slate-500 font-light leading-relaxed">{{ $f['desc'] }}</p>
        </div>
        @endforeach

    </div>
</section>

{{-- ── SECTION DIVIDER ── --}}
<div class="max-w-5xl mx-auto px-6"><div class="border-t border-slate-800/80"></div></div>

{{-- ── STATUS WORKFLOW ── --}}
<section class="px-6 py-24 max-w-5xl mx-auto w-full">

    <div class="mb-16">
        <p class="text-xs font-bold tracking-widest uppercase text-violet-400 mb-4">Workflow</p>
        <h2 class="text-4xl sm:text-5xl font-bold tracking-tighter text-white leading-tight">
            Three states.<br>
            <span class="text-slate-500">Total clarity.</span>
        </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

        <div class="relative bg-amber-500/5 border border-amber-500/15 rounded-2xl p-7 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-amber-500/40 to-transparent"></div>
            <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-base mb-6">
                <i class="fa-regular fa-clock"></i>
            </div>
            <h3 class="text-white font-semibold text-base mb-2">Pending</h3>
            <p class="text-sm text-slate-500 font-light leading-relaxed mb-5">Tasks queued and waiting. Your full backlog, organized and always visible.</p>
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/15">
                <span class="w-1 h-1 rounded-full bg-amber-400"></span> Waiting to start
            </span>
        </div>

        <div class="relative bg-blue-500/5 border border-blue-500/15 rounded-2xl p-7 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-blue-500/40 to-transparent"></div>
            <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 text-base mb-6">
                <i class="fa-solid fa-spinner"></i>
            </div>
            <h3 class="text-white font-semibold text-base mb-2">In Progress</h3>
            <p class="text-sm text-slate-500 font-light leading-relaxed mb-5">Work actively being handled. A clear signal to the team: this is being taken care of.</p>
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/15">
                <span class="w-1 h-1 rounded-full bg-blue-400 animate-pulse"></span> Being worked on
            </span>
        </div>

        <div class="relative bg-emerald-500/5 border border-emerald-500/15 rounded-2xl p-7 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-emerald-500/40 to-transparent"></div>
            <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-base mb-6">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h3 class="text-white font-semibold text-base mb-2">Completed</h3>
            <p class="text-sm text-slate-500 font-light leading-relaxed mb-5">Done and shipped. A full record of everything your team has accomplished.</p>
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/15">
                <span class="w-1 h-1 rounded-full bg-emerald-400"></span> Shipped
            </span>
        </div>

    </div>
</section>

{{-- ── SECTION DIVIDER ── --}}
<div class="max-w-5xl mx-auto px-6"><div class="border-t border-slate-800/80"></div></div>

{{-- ── CTA ── --}}
<section class="relative px-6 py-28 text-center overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-violet-600/8 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-xl mx-auto">
        <p class="text-xs font-bold tracking-widest uppercase text-violet-400 mb-6">Get started</p>
        <h2 class="text-4xl sm:text-5xl font-bold tracking-tighter text-white leading-tight mb-5">
            Ready to take control<br>of your work?
        </h2>
        <p class="text-base text-slate-500 font-light leading-relaxed mb-10">
            Create your first task in under 10 seconds. No setup, no onboarding, no nonsense.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('register') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-violet-600 hover:bg-violet-500 text-white text-sm font-semibold rounded-xl shadow-xl shadow-violet-500/25 hover:shadow-violet-500/35 transition-all duration-200 hover:-translate-y-0.5">
                <i class="fa-solid fa-user-plus text-xs"></i>
                Create free account
            </a>
            <a href="{{ route('login') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-transparent hover:bg-slate-800 text-slate-400 hover:text-white text-sm font-medium rounded-xl border border-slate-700 hover:border-slate-600 transition-all duration-200">
                <i class="fa-solid fa-arrow-right-to-bracket text-xs"></i>
                Log in instead
            </a>
        </div>
    </div>
</section>

@endsection
