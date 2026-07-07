
<header class="sticky top-4 z-50 mx-auto max-w-5xl rounded-2xl border border-border bg-background/60 px-4 py-2 backdrop-blur-xl sm:mx-4 lg:mx-auto">
    <nav class="flex items-center gap-6">
        <a href="/" class="flex items-center gap-2 text-lg font-semibold tracking-tight">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
            LoomPHP
        </a>
        <div class="hidden items-center gap-1 sm:flex">
            <a href="/" class="relative px-3 py-1.5 text-sm after:absolute after:bottom-0 after:left-1/2 after:h-[2px] after:w-full after:-translate-x-1/2 after:scale-x-0 after:rounded-full after:bg-foreground after:transition-transform after:duration-200 hover:after:scale-x-100 <?= $uri ===
            "/"
                ? "font-medium"
                : "text-muted-foreground" ?>">Home</a>

            <a href="/docs" class="relative px-3 py-1.5 text-sm after:absolute after:bottom-0 after:left-1/2 after:h-[2px] after:w-full after:-translate-x-1/2 after:scale-x-0 after:rounded-full after:bg-foreground after:transition-transform after:duration-200 hover:after:scale-x-100 <?= str_starts_with(
                $uri,
                "/docs",
            )
                ? "font-medium"
                : "text-muted-foreground" ?>">Docs</a>
        </div>
        <div class="ml-auto flex items-center gap-2">
            <button type="button" id="cmd-palette-btn" class="hidden items-center gap-1.5 rounded-lg border border-border bg-background/50 px-2.5 py-1.5 text-xs text-muted-foreground shadow-sm backdrop-blur-sm transition-all hover:border-foreground hover:text-foreground hover:shadow-md sm:flex" aria-label="Command palette">
                <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <span>Search</span>
                <kbd class="rounded-md border border-border bg-muted px-1 py-0.5 font-mono text-[10px] font-medium">⌘S</kbd>
            </button>
            <button type="button" id="theme-toggle" class="rounded-lg p-2 text-muted-foreground transition-colors hover:text-foreground focus:outline-none" aria-label="Toggle theme">
                <svg class="hidden dark:block h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                <svg class="block dark:hidden h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
            </button>
            <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="rounded-lg p-2 text-muted-foreground transition-colors hover:text-foreground" aria-label="GitHub">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
            </a>
            <button type="button" id="menu-toggle" class="flex sm:hidden" aria-label="Toggle menu" aria-expanded="false">
                <svg class="h-5 w-5 menu-icon-hamburger" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16"/><path d="M4 12h16"/><path d="M4 18h16"/></svg>
                <svg class="h-5 w-5 menu-icon-close hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
    </nav>
    <div id="mobile-menu" class="grid transition-all duration-300 ease-out sm:hidden" style="grid-template-rows:0fr" aria-hidden="true">
        <div class="overflow-hidden">
            <div class="flex flex-col gap-2 border-t border-border pb-3 pt-3">
                <a href="/" class="rounded-lg px-3 py-2 text-sm transition-colors hover:bg-muted <?= $uri ===
                "/"
                    ? "font-medium"
                    : "text-muted-foreground" ?>">Home</a>

                <a href="/docs" class="rounded-lg px-3 py-2 text-sm transition-colors hover:bg-muted <?= str_starts_with(
                    $uri,
                    "/docs",
                )
                    ? "font-medium"
                    : "text-muted-foreground" ?>">Docs</a>
                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm text-muted-foreground transition-colors hover:bg-muted">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                    GitHub
                </a>
                <a href="/docs" class="mt-1 rounded-full border border-border bg-background/50 px-4 py-1.5 text-center text-xs text-foreground shadow-sm backdrop-blur-sm transition-all hover:border-foreground hover:bg-muted hover:shadow-md">Get Started</a>
            </div>
        </div>
    </div>
</header>
