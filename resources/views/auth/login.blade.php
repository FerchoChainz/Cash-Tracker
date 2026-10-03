@extends('layouts.base')

@section('title', 'Log in')

@section('no-header', true)

@section('contents')
<main class="min-h-screen w-full grid grid-cols-1 lg:grid-cols-12 overflow-x-hidden">
    <!-- Left Column: Auth Workspace (5 cols on lg) -->
    <div class="lg:col-span-5 xl:col-span-5 bg-surface flex flex-col justify-between px-8 sm:px-14 md:px-20 lg:px-14 xl:px-20 py-10 lg:py-14 min-h-screen border-r border-border-subtle relative z-10">
        <!-- Top Brand Anchor -->
        <div>
            <div class="flex items-center gap-3.5 group cursor-pointer">
                <div class="w-11 h-11 rounded-2xl overflow-hidden shadow-sm flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" width="44" height="44" fill="none">
                        <rect width="120" height="120" rx="32" fill="#F8DD72"/>
                        <circle cx="48" cy="48" r="22" fill="#151515"/>
                        <path d="M48 38v20M38 48h20" stroke="#FFFDF7" stroke-width="4" stroke-linecap="round"/>
                        <rect x="62" y="60" width="34" height="34" rx="12" fill="#B8B4E8"/>
                        <circle cx="79" cy="77" r="6" fill="#151515"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-on-surface">Cash Tracker</span>
                    <span class="text-[11px] font-semibold tracking-wider uppercase text-ink-muted">Mindful Finance</span>
                </div>
            </div>

            <!-- Main Heading & Intro -->
            <div class="mt-12 lg:mt-16">
                <h1 class="text-3xl sm:text-4xl lg:text-[40px] font-semibold text-on-surface tracking-tight leading-[1.15]">
                    Welcome back
                </h1>
                <p class="mt-3 text-base sm:text-lg text-ink-secondary leading-relaxed">
                    Your money with intention and clarity. Regain control of your daily flow in a serene environment.
                </p>
            </div>

            <!-- Social Quick Access (Presentational) -->
            <div class="grid grid-cols-2 gap-3.5 mt-8">
                <button type="button" class="flex items-center justify-center gap-2.5 h-[52px] px-5 rounded-2xl bg-surface-container-low hover:bg-surface-subtle border border-border-subtle/80 text-on-surface font-medium text-sm transition-all duration-200 hover:shadow-sm active:scale-[0.98] cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/>
                    </svg>
                    <span>Google</span>
                </button>
                <button type="button" class="flex items-center justify-center gap-2.5 h-[52px] px-5 rounded-2xl bg-surface-container-low hover:bg-surface-subtle border border-border-subtle/80 text-on-surface font-medium text-sm transition-all duration-200 hover:shadow-sm active:scale-[0.98] cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.61-.75 1.04-1.8 0.92-2.85-.9.04-2 .6-2.65 1.35-.58.67-1.09 1.74-.96 2.77.99.08 2.05-.51 2.69-1.27z"/>
                    </svg>
                    <span>Apple</span>
                </button>
            </div>

            <!-- Divider -->
            <div class="relative flex items-center justify-center my-7">
                <div class="w-full border-t border-border-subtle"></div>
                <span class="absolute px-4 bg-surface text-xs font-medium text-ink-muted uppercase tracking-wider">or continue with your email</span>
            </div>

            @if (session('error'))
                <x-alert type="error" :message="session('error')" />
            @endif

            @if (session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            <!-- Form -->
            <form method="post" action="{{ route('login.store') }}" class="space-y-4 mt-6" novalidate id="loginForm">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-on-surface mb-2" for="email">Email address</label>
                    <div class="relative">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            tabindex="1"
                            required
                            class="w-full h-[52px] px-4 rounded-2xl bg-surface-container-low text-on-surface text-base placeholder:text-ink-muted border border-border-subtle/80 outline-none transition-all duration-200 focus:bg-surface focus:border-on-surface focus:ring-2 focus:ring-on-surface/10"
                        />
                    </div>
                    <div class="mt-1.5">
                        <x-input-error field="email" />
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium text-on-surface" for="password">Password</label>
                    </div>
                    <div class="relative flex items-center">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••••••"
                            tabindex="2"
                            required
                            class="w-full h-[52px] px-4 pr-12 rounded-2xl bg-surface-container-low text-on-surface text-base placeholder:text-ink-muted border border-border-subtle/80 outline-none transition-all duration-200 focus:bg-surface focus:border-on-surface focus:ring-2 focus:ring-on-surface/10"
                        />
                        <button
                            type="button"
                            id="togglePasswordBtn"
                            aria-label="Toggle password visibility"
                            class="absolute right-3.5 p-1.5 text-ink-muted hover:text-on-surface transition-colors focus:outline-none cursor-pointer"
                        >
                            <span class="material-symbols-outlined text-[20px]" id="toggleIcon">visibility</span>
                        </button>
                    </div>
                    <div class="mt-1.5">
                        <x-input-error field="password" />
                    </div>
                </div>

                <!-- Options Row -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2.5 cursor-pointer select-none">
                        <input
                            type="checkbox"
                            name="remember"
                            checked
                            class="w-4 h-4 rounded text-primary border-border-subtle accent-primary cursor-pointer focus:ring-0"
                        />
                        <span class="text-sm text-ink-secondary">Remember me on this device</span>
                    </label>
                    <a href="#" class="text-sm font-medium text-on-surface hover:underline transition-colors" tabindex="3">Forgot your password?</a>
                </div>

                <!-- Primary Submit Button -->
                <button
                    type="submit"
                    class="w-full h-[52px] mt-3 rounded-2xl bg-primary text-white font-medium text-base shadow-sm hover:shadow-md hover:bg-neutral-800 active:scale-[0.99] transition-all duration-200 flex items-center justify-center gap-2 group cursor-pointer"
                >
                    <span>Log in</span>
                    <span class="material-symbols-outlined text-[20px] transition-transform duration-200 group-hover:translate-x-1">arrow_forward</span>
                </button>
            </form>

            <!-- Footer Sign-up link -->
            <p class="mt-7 text-center text-sm text-ink-secondary">
                Don't have an account yet?
                <a href="{{ route('register') }}" class="font-semibold text-on-surface hover:underline ml-1">Create one for free</a>
            </p>
        </div>

        <!-- Trust & Security Disclaimer -->
        <div class="pt-8 border-t border-border-subtle/60 mt-10 flex items-center justify-between text-xs text-ink-muted">
            <div class="flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px] text-accent-sage">verified_user</span>
                <span>256-bit bank encryption</span>
            </div>
            <span>Privacy protected</span>
        </div>
    </div>

    <!-- Right Column: Visual Showcase & Finance Atmosphere (7 cols on lg) -->
    <div class="lg:col-span-7 xl:col-span-7 bg-[#F7F4EB] relative overflow-hidden hidden lg:flex flex-col justify-between p-8 sm:p-12 lg:p-16 xl:p-20">
        <!-- Ambient Decorative Organic Backdrops -->
        <div class="absolute -top-24 -right-24 w-[480px] h-[480px] rounded-full bg-butter/30 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 -left-20 w-[420px] h-[420px] rounded-full bg-lavender/35 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 right-1/4 w-[360px] h-[360px] rounded-full bg-accent-mint/35 blur-3xl pointer-events-none"></div>

        <!-- Top Row Badges -->
        <div class="relative z-10 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-accent-mint/70 border border-accent-mint text-on-surface text-xs font-semibold tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-[#3F7C56] animate-pulse"></span>
                    Expenses under control
                </div>
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-lavender/60 border border-lavender text-on-surface text-xs font-semibold tracking-wide">
                    <span class="material-symbols-outlined text-[15px]">auto_awesome</span>
                    Smart savings
                </div>
            </div>
            <span class="text-xs font-medium text-ink-muted uppercase tracking-wider hidden sm:inline-block">Real-time preview</span>
        </div>

        <!-- Showcase Cards Cluster -->
        <div class="relative z-10 my-10 max-w-xl mx-auto w-full space-y-5">
            <!-- Large Prominent Balance Card in Butter Yellow -->
            <div class="w-full bg-[#F8DD72] rounded-3xl p-7 sm:p-8 shadow-xl relative overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-start justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-on-surface/70">Consolidated Balance</span>
                        <div class="text-4xl sm:text-5xl font-bold text-on-surface tracking-tight mt-1.5 tabular-nums">
                            $84,250.00
                        </div>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-on-surface/10 flex items-center justify-center text-on-surface">
                        <span class="material-symbols-outlined text-[26px]">account_balance_wallet</span>
                    </div>
                </div>

                <!-- Stylized Trend Histogram Bars -->
                <div class="mt-6 pt-2">
                    <div class="h-16 w-full flex items-end gap-2 px-1">
                        <div class="flex-1 bg-on-surface/15 rounded-t-md h-5 transition-all hover:bg-on-surface/25"></div>
                        <div class="flex-1 bg-on-surface/20 rounded-t-md h-8 transition-all hover:bg-on-surface/30"></div>
                        <div class="flex-1 bg-on-surface/25 rounded-t-md h-6 transition-all hover:bg-on-surface/35"></div>
                        <div class="flex-1 bg-on-surface/20 rounded-t-md h-10 transition-all hover:bg-on-surface/30"></div>
                        <div class="flex-1 bg-on-surface/35 rounded-t-md h-9 transition-all hover:bg-on-surface/45"></div>
                        <div class="flex-1 bg-on-surface/45 rounded-t-md h-12 transition-all hover:bg-on-surface/60"></div>
                        <div class="flex-1 bg-on-surface/55 rounded-t-md h-11 transition-all hover:bg-on-surface/70"></div>
                        <div class="flex-1 bg-on-surface rounded-t-md h-16 shadow-sm"></div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 mt-2 border-t border-on-surface/10">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-on-surface text-white text-xs font-semibold">
                        <span class="material-symbols-outlined text-[15px] text-accent-mint">trending_up</span>
                        <span>+8.4% this month</span>
                    </div>
                    <span class="text-xs font-medium text-on-surface/75">Synced 2 mins ago</span>
                </div>
            </div>

            <!-- Floating Cards 2-col Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Floating Goal Card -->
                <div class="bg-surface rounded-2xl p-5 shadow-md border border-border-subtle/80 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-9 h-9 rounded-xl bg-semantic-savings/40 flex items-center justify-center text-on-surface">
                            <span class="material-symbols-outlined text-[20px]">savings</span>
                        </div>
                        <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface">60%</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-on-surface">Goal: Emergency Fund</p>
                        <div class="flex items-baseline justify-between mt-1 text-xs text-ink-secondary">
                            <span class="font-semibold text-on-surface">$7,250</span>
                            <span>of $12,000</span>
                        </div>
                        <div class="w-full h-2.5 bg-surface-container-low rounded-full overflow-hidden mt-2.5">
                            <div class="h-full bg-primary rounded-full" style="width: 60%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Editorial Intentional Activity Card -->
                <div class="bg-surface rounded-2xl p-5 shadow-md border border-border-subtle/80 flex flex-col justify-between">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-[18px] text-secondary">lightbulb</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-secondary">Cash Philosophy</span>
                    </div>
                    <p class="text-sm font-medium text-on-surface leading-snug">
                        “Give every dollar and cent an intentional purpose before you spend it.”
                    </p>
                    <span class="text-[11px] text-ink-muted mt-2 block">Stress-free financial clarity</span>
                </div>
            </div>
        </div>

        <!-- Social Proof Footer -->
        <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pt-4 border-t border-border-subtle/60">
            <div class="flex items-center gap-3">
                <div class="flex -space-x-2.5 overflow-hidden">
                    <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-surface bg-accent-peach items-center justify-center text-xs font-bold text-on-surface">AL</div>
                    <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-surface bg-accent-blue items-center justify-center text-xs font-bold text-on-surface">CR</div>
                    <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-surface bg-accent-mint items-center justify-center text-xs font-bold text-on-surface">SO</div>
                    <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-surface bg-butter items-center justify-center text-xs font-bold text-on-surface">+12k</div>
                </div>
                <p class="text-xs sm:text-sm text-ink-secondary">
                    Over <span class="font-semibold text-on-surface">12,000 people</span> manage their finances with calm and clear vision.
                </p>
            </div>
            <div class="flex items-center gap-1 text-xs text-ink-muted">
                <span>Crafted with</span>
                <span class="material-symbols-outlined text-[14px] text-semantic-expense">favorite</span>
                <span>for your peace of mind</span>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const toggleIcon = document.getElementById('toggleIcon');

        if (toggleBtn && passwordInput && toggleIcon) {
            toggleBtn.addEventListener('click', function() {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                toggleIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
            });
        }
    });
</script>
@endsection
