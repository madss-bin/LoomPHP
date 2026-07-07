<?php $seo->title("LoomPHP — Opinionated Boilerplate")
    ->description(
        "A lean, modern PHP boilerplate with Tailwind CSS v4, Basecoat UI, Vite HMR, and Filebased routing.",
    )
    ->og("og:title", "LoomPHP — Opinionated Boilerplate")
    ->og(
        "og:description",
        "A lean, modern PHP boilerplate with Tailwind CSS v4, Basecoat UI, Vite HMR, and Filebased routing.",
    )
    ->og("og:type", "website")
    ->schema("WebApplication", [
        "name" => "LoomPHP",
        "description" =>
            "Opinionated PHP boilerplate with Tailwind CSS v4, Basecoat UI, Vite HMR, and Filebased routing.",
        "applicationCategory" => "DeveloperApplication",
    ]); ?>
<div>
    <section class="relative -mt-14 flex min-h-[70vh] items-center justify-center pt-16">
        <div aria-hidden="true" class="pointer-events-none absolute -top-24 left-0 right-0 h-[calc(100%+6rem)] not-dark:bg-[url('/img/gradient.webp')] dark:bg-accent bg-cover bg-center"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -top-24 left-0 right-0 h-[calc(100%+6rem)] bg-gradient-to-b from-background/85 via-background/60 to-background"></div>
        <div class="relative z-10 px-4 text-center">
            <h1 class="animate-fade-up bg-gradient-to-br from-black to-stone-500 bg-clip-text text-center text-5xl font-bold tracking-[-0.02em] text-transparent opacity-0 drop-shadow-sm [text-wrap:balance] dark:from-white dark:to-stone-400 md:text-8xl md:leading-[6rem]" style="animation-delay:0.15s;animation-fill-mode:forwards">LoomPHP</h1>
            <p class="animate-fade-up mx-auto mb-8 mt-4 max-w-lg text-muted-foreground" style="animation-delay:0.25s;animation-fill-mode:forwards">Opinionated boilerplate — vanilla PHP, Tailwind CSS v4, Basecoat UI, Vite HMR, file-based routing, zero bloat.</p>
            <div class="flex flex-wrap justify-center gap-4" style="animation-delay:0.3s;animation-fill-mode:forwards">
                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="group flex max-w-fit items-center justify-center space-x-2 rounded-full border border-black bg-black px-8 py-2 text-sm text-white transition-colors hover:bg-white hover:text-black dark:border-white dark:bg-white dark:text-black dark:hover:bg-black dark:hover:text-white">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                    <span>Github</span>
                </a>
                <a href="/docs" class="group flex max-w-fit items-center justify-center space-x-2 rounded-full border border-border bg-background/50 px-5 py-2 text-sm text-foreground shadow-sm backdrop-blur-sm transition-all hover:border-foreground hover:bg-muted hover:shadow-md">
                    <span>Get Started</span>
                    <svg class="h-3 w-3 transition-transform group-hover:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-5xl px-4 py-16 sm:py-24 border-t border-border/60">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl bg-gradient-to-br from-foreground to-muted-foreground bg-clip-text text-transparent">
                Framework-level Power, Zero Bloat
            </h2>
            <p class="mt-4 text-muted-foreground">
                LoomPHP brings modern developer experience to vanilla PHP. Build fast, keep it clean, and scale without framework overhead.
            </p>
        </div>

        <div class="grid gap-8 lg:grid-cols-12 items-start mb-16">
            <div class="lg:col-span-5 space-y-6">
                <div class="card p-6 border border-border/80 bg-card shadow-sm rounded-2xl">
                    <h3 class="font-semibold text-lg mb-2">Get Started in Seconds</h3>
                    <p class="text-sm text-muted-foreground mb-4">Select your package manager and copy the command to ship your next idea.</p>

                    <div class="flex border-b border-border mb-4 gap-2">
                        <button type="button" data-tab="git" class="term-tab px-3 py-1.5 text-xs font-medium border-b-2 border-primary -mb-[2px] transition-colors">Git</button>
                        <button type="button" data-tab="npm" class="term-tab px-3 py-1.5 text-xs font-medium border-b-2 border-transparent -mb-[2px] text-muted-foreground hover:text-foreground transition-colors">NPM</button>
                        <button type="button" data-tab="composer" class="term-tab px-3 py-1.5 text-xs font-medium border-b-2 border-transparent -mb-[2px] text-muted-foreground hover:text-foreground transition-colors">Composer</button>
                    </div>

                    <div class="relative overflow-hidden rounded-xl bg-neutral-950 font-mono text-xs text-neutral-300 p-4 pt-10 shadow-inner">
                        <div class="absolute top-3 left-4 flex gap-1.5">
                            <span class="h-2.5 w-2.5 rounded-full bg-red-500/80"></span>
                            <span class="h-2.5 w-2.5 rounded-full bg-yellow-500/80"></span>
                            <span class="h-2.5 w-2.5 rounded-full bg-green-500/80"></span>
                        </div>
                        <button type="button" id="copy-btn" class="absolute top-2.5 right-4 rounded p-1 text-neutral-500 hover:text-neutral-300 transition-colors" aria-label="Copy code">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                        </button>

                        <div id="cmd-git" class="term-pane space-y-1">
                            <div><span class="text-emerald-500">$</span> git clone https://github.com/user/loomphp</div>
                            <div><span class="text-emerald-500">$</span> cd loomphp</div>
                            <div><span class="text-emerald-500">$</span> composer install && npm install</div>
                            <div class="text-neutral-500 mt-2"># Start development environment</div>
                            <div><span class="text-emerald-500">$</span> npm run dev</div>
                        </div>
                        <div id="cmd-npm" class="term-pane hidden space-y-1">
                            <div><span class="text-emerald-500">$</span> npm run dev <span class="text-neutral-500"># Run dev server</span></div>
                            <div><span class="text-emerald-500">$</span> npm run build <span class="text-neutral-500"># Production compile</span></div>
                            <div><span class="text-emerald-500">$</span> npm run start <span class="text-neutral-500"># Launch prod server</span></div>
                        </div>
                        <div id="cmd-composer" class="term-pane hidden space-y-1">
                            <div><span class="text-emerald-500">$</span> composer install <span class="text-neutral-500"># Install PHP vendor deps</span></div>
                            <div><span class="text-emerald-500">$</span> composer update <span class="text-neutral-500"># Update PHP packages</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="card p-6 border border-border/80 bg-card shadow-md rounded-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-3">
                        <span class="badge" data-variant="outline">Interactive Live Demo</span>
                    </div>
                    <h3 class="font-semibold text-lg mb-1">State & UI Hydration</h3>
                    <p class="text-xs text-muted-foreground mb-6">Test the reactive components and toasts pre-configured in LoomPHP.</p>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="flex flex-col justify-between p-4 rounded-xl bg-muted/40 border border-border/60">
                            <div>
                                <h4 class="text-sm font-medium">Interactive Toggle</h4>
                                <p class="text-xs text-muted-foreground mt-1">Pre-styled semantic switch with zero dependencies.</p>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-xs text-muted-foreground" id="switch-state-text">State: Off</span>
                                <?php
                                $id = "demo-switch";
                                $label = "";
                                $checked = false;
                                require __DIR__ .
                                    "/../components/ui/switch.php";
                                ?>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between p-4 rounded-xl bg-muted/40 border border-border/60">
                            <div>
                                <h4 class="text-sm font-medium">Reactive Store</h4>
                                <p class="text-xs text-muted-foreground mt-1">writable store syncing values reactively.</p>
                            </div>
                            <div class="mt-4 flex items-center justify-between gap-4">
                                <button type="button" id="counter-dec" class="btn" data-size="sm" data-variant="outline">-</button>
                                <span id="counter-val" class="font-mono font-bold text-lg">0</span>
                                <button type="button" id="counter-inc" class="btn" data-size="sm" data-variant="outline">+</button>
                            </div>
                        </div>

                        <div class="sm:col-span-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-muted/40 border border-border/60">
                            <div class="max-w-md">
                                <h4 class="text-sm font-medium">Real-time Notification</h4>
                                <p class="text-xs text-muted-foreground mt-1">Trigger draggable, dismissible toasts built directly into the core layout.</p>
                            </div>
                            <button type="button" id="toast-trigger" class="btn shrink-0" data-size="sm">Trigger Toast</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="card p-6 border border-border/50 bg-card/60 shadow-sm rounded-2xl hover:border-primary/30 transition-all duration-300 hover:shadow-md">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <h3 class="font-semibold text-base text-foreground mb-1">File-based Routing</h3>
                <p class="text-xs text-muted-foreground leading-relaxed">File-based nested layouts and dynamic segment resolution out of the box. Zero configuration required.</p>
            </div>

            <div class="card p-6 border border-border/50 bg-card/60 shadow-sm rounded-2xl hover:border-primary/30 transition-all duration-300 hover:shadow-md">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="font-semibold text-base text-foreground mb-1">Global Hooks / Middleware</h3>
                <p class="text-xs text-muted-foreground leading-relaxed">Intercept incoming requests globally via <code class="rounded bg-muted px-1 py-0.5 text-[10px]">src/hooks.php</code> to manage authentication guards, redirects, or headers.</p>
            </div>

            <div class="card p-6 border border-border/50 bg-card/60 shadow-sm rounded-2xl hover:border-primary/30 transition-all duration-300 hover:shadow-md">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-semibold text-base text-foreground mb-1">Vite Dev Server & HMR</h3>
                <p class="text-xs text-muted-foreground leading-relaxed">CSS updates in place, JS HMR, and automatic hot reload for PHP templates. Keep your browser and editor perfectly in sync.</p>
            </div>

            <div class="card p-6 border border-border/50 bg-card/60 shadow-sm rounded-2xl hover:border-primary/30 transition-all duration-300 hover:shadow-md">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </div>
                <h3 class="font-semibold text-base text-foreground mb-1">Basecoat & Tailwind v4</h3>
                <p class="text-xs text-muted-foreground leading-relaxed">Leverage the brand new Tailwind CSS v4 coupled with beautiful, accessible Basecoat design primitives for premium aesthetics.</p>
            </div>

            <div class="card p-6 border border-border/50 bg-card/60 shadow-sm rounded-2xl hover:border-primary/30 transition-all duration-300 hover:shadow-md">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-semibold text-base text-foreground mb-1">Client Stores</h3>
                <p class="text-xs text-muted-foreground leading-relaxed">Lightweight state management stores built into LoomPHP JS. Sync states across multiple components on the page reactively.</p>
            </div>

            <div class="card p-6 border border-border/50 bg-card/60 shadow-sm rounded-2xl hover:border-primary/30 transition-all duration-300 hover:shadow-md">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                </div>
                <h3 class="font-semibold text-base text-foreground mb-1">Graceful Cache Wrapper</h3>
                <p class="text-xs text-muted-foreground leading-relaxed">Redis caching with the custom <code class="rounded bg-muted px-1 py-0.5 text-[10px]">Cache::remember</code> wrapper. Fails over silently to raw execution if Redis falls offline.</p>
            </div>
        </div>
    </section>
</div>
