<?php
$seo->title("Docs — LoomPHP")
    ->description(
        "LoomPHP documentation — overview, installation, routing, components, API, Vite HMR, and more.",
    )
    ->og("og:title", "Docs — LoomPHP")
    ->og(
        "og:description",
        "LoomPHP documentation — overview, installation, routing, components, API, Vite HMR, and more.",
    )
    ->og("og:type", "website"); ?>
<?php
$sections = [
    "Overview",
    "Installation",
    "File-based Routing",
    "Dynamic Routes",
    "Nested Layouts",
    "Global Hooks",
    "Trailing Slash",
    "API Endpoints",
    "Components",
    "Custom JS Components",
    "Data Hydration",
    "Client-side Stores",
    "CSRF Protection",
    "SEO",
    "Cache (Redis)",
    "Per-page JavaScript",
    "Vite HMR & Build",
    "Environment Config",
];
function docAnchor(string $s): string
{
    return trim(strtolower(preg_replace("/[^a-z0-9]+/i", "-", $s)), "-");
}
?>
<div class="mx-auto flex max-w-6xl gap-8 px-4 pt-20 pb-16">
    <nav class="sticky top-20 hidden h-fit w-56 shrink-0 lg:block" aria-label="On this page">
        <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-muted-foreground/70">On this page</p>
        <div class="relative">
            <div id="sidebar-indicator" class="pointer-events-none absolute left-0 right-0 z-0 rounded-lg bg-muted/70 transition-all duration-300 ease-out" style="top:0;height:0;opacity:0"></div>
            <div class="relative z-10 space-y-0.5">
                <?php foreach ($sections as $i => $s): ?>
                <a href="#<?= docAnchor(
                    $s,
                ) ?>" data-i="<?= $i ?>" data-sidebar-link class="relative block rounded-lg px-3 py-1.5 text-sm text-muted-foreground transition-colors duration-200"><?= htmlspecialchars(
    $s,
) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>

    <div class="min-w-0 flex-1">
        <h1 class="mb-2 text-3xl font-bold tracking-tight">Documentation</h1>
        <p class="mb-10 text-muted-foreground">Everything you need to build and ship with LoomPHP.</p>

        <div class="space-y-12">

            <section id="overview">
                <h2 class="mb-3 text-xl font-semibold">Overview</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>LoomPHP is an opinionated, zero-framework PHP boilerplate built for developers who want modern tooling without the overhead of a full framework. It gives you:</p>
                    <ul class="list-disc space-y-1.5 pl-5">
                        <li><strong class="text-foreground">File-based routing</strong> — pages map to files, zero config</li>
                        <li><strong class="text-foreground">Vite + HMR</strong> — instant CSS updates and full page reload on PHP changes</li>
                        <li><strong class="text-foreground">Tailwind CSS v4 + Lightning CSS</strong> — modern CSS with fast production minification</li>
                        <li><strong class="text-foreground">Basecoat UI</strong> — accessible, semantic component primitives</li>
                        <li><strong class="text-foreground">Global Hooks</strong> — intercept every request before routing</li>
                        <li><strong class="text-foreground">Reactive JS stores</strong> — lightweight client state, zero dependencies</li>
                        <li><strong class="text-foreground">Redis Cache</strong> — optional caching with graceful fallback</li>
                        <li><strong class="text-foreground">Per-page JS splitting</strong> — Vite code-splits by page automatically</li>
                        <li><strong class="text-foreground">Built-in CSRF protection</strong> — auto-validates all POST requests</li>
                        <li><strong class="text-foreground">Fluent SEO helper</strong> — titles, meta, Open Graph, JSON-LD</li>
                    </ul>
                </div>
            </section>

            <section id="installation">
                <h2 class="mb-3 text-xl font-semibold">Installation</h2>
                <div class="space-y-4 text-sm leading-relaxed text-muted-foreground">
                    <p><strong class="text-foreground">Prerequisites:</strong> PHP 8.1+, Composer, Node.js 18+.</p>

                    <div>
                        <p class="mb-2 font-medium text-foreground">1. Clone the repository</p>
                        <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                            <code class="block text-xs leading-relaxed">git clone https://github.com/user/loomphp<br>cd loomphp</code>
                        </div>
                    </div>

                    <div>
                        <p class="mb-2 font-medium text-foreground">2. Install dependencies</p>
                        <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                            <code class="block text-xs leading-relaxed">composer install<br>npm install</code>
                        </div>
                    </div>

                    <div>
                        <p class="mb-2 font-medium text-foreground">3. Set up environment</p>
                        <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                            <code class="block text-xs leading-relaxed">cp .env.example .env<br><br># Edit .env and set your values:<br>APP_ENV=dev<br>PORT=8000<br>REDIS_HOST=127.0.0.1   # optional<br>TRAILING_SLASH=never</code>
                        </div>
                    </div>

                    <div>
                        <p class="mb-2 font-medium text-foreground">4. Start the development server</p>
                        <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                            <code class="block text-xs leading-relaxed">npm run dev</code>
                        </div>
                        <p class="mt-2">Open <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">http://localhost:5173</code> — Vite proxies the PHP server and pushes hot updates.</p>
                    </div>

                    <div>
                        <p class="mb-2 font-medium text-foreground">Production build & start</p>
                        <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                            <code class="block text-xs leading-relaxed">APP_ENV=production npm run build<br>npm run start</code>
                        </div>
                        <p class="mt-2">Set <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">APP_ENV=production</code> in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">.env</code> and run <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">npm run build</code> first. The layout auto-detects the manifest and serves hashed assets.</p>
                    </div>

                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-muted-foreground/70">All commands</p>
                        <table class="w-full text-xs">
                            <thead><tr class="border-b border-border"><th class="pb-2 text-left font-medium text-foreground">Command</th><th class="pb-2 text-left font-medium text-foreground">Description</th></tr></thead>
                            <tbody class="divide-y divide-border">
                                <tr><td class="py-1.5 pr-4 font-mono">npm run dev</td><td class="py-1.5">PHP + Vite concurrently (HMR enabled)</td></tr>
                                <tr><td class="py-1.5 pr-4 font-mono">npm run dev:php</td><td class="py-1.5">PHP built-in server only</td></tr>
                                <tr><td class="py-1.5 pr-4 font-mono">npm run dev:vite</td><td class="py-1.5">Vite dev server only</td></tr>
                                <tr><td class="py-1.5 pr-4 font-mono">npm run build</td><td class="py-1.5">Production bundle → <code>public/assets/</code></td></tr>
                                <tr><td class="py-1.5 pr-4 font-mono">npm run start</td><td class="py-1.5">PHP server in production mode</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="file-based-routing">
                <h2 class="mb-3 text-xl font-semibold">File-based Routing</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Routes are resolved by file structure under <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/pages/</code>. No manual route registration. The router tries these patterns in order:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">src/pages/index.php              →  /
src/pages/about.php              →  /about
src/pages/about/index.php        →  /about
src/pages/about/home.php         →  /about
src/pages/blog/[slug].php        →  /blog/:slug   (dynamic)
src/pages/blog/[slug]/index.php  →  /blog/:slug   (dynamic, with layouts)</code>
                    </div>
                    <p>Each page receives <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">$uri</code> (current path) and <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">$seo</code> (SEO helper) from the front controller. Set a custom title at the top of any page with <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">$seo->title('My Page')</code>.</p>
                </div>
            </section>

            <section id="dynamic-routes">
                <h2 class="mb-3 text-xl font-semibold">Dynamic Routes</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Use <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">[param]</code> in filenames or directory names to capture URI segments into <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">$routeParams</code>.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">blog/[slug].php                  →  /blog/hello-world  → $routeParams["slug"] = "hello-world"
users/[id]/posts/[pid].php       →  /users/1/posts/5   → $routeParams["id"] = "1", ["pid"] = "5"
[category]/[slug].php            →  /news/hello        → $routeParams["category"] = "news"</code>
                    </div>
                    <p>Usage in a page file:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php // src/pages/blog/[slug].php<br>$slug = $routeParams["slug"] ?? "";<br>// fetch post by slug...<br>?&gt;<br>&lt;h1&gt;&lt;?= htmlspecialchars($slug) ?&gt;&lt;/h1&gt;</code>
                    </div>
                </div>
            </section>

            <section id="nested-layouts">
                <h2 class="mb-3 text-xl font-semibold">Nested Layouts</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Place a <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">layout.php</code> in any route directory. It wraps all pages under that route (and sub-routes), nesting from outermost to innermost via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">&lt;?= $content ?&gt;</code>.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">src/pages/layout.php            →  root shell (always applied)
src/pages/admin/layout.php      →  wraps all /admin/* pages
src/pages/admin/[id]/layout.php →  wraps individual /admin/:id pages</code>
                    </div>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php // src/pages/admin/layout.php ?&gt;<br>&lt;div class="mx-auto max-w-4xl px-4"&gt;<br>    &lt;?= $content ?&gt;<br>&lt;/div&gt;</code>
                    </div>
                </div>
            </section>

            <section id="global-hooks">
                <h2 class="mb-3 text-xl font-semibold">Global Hooks</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Create <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/hooks.php</code> and it will run <strong class="text-foreground">before every request</strong> — before routing, before rendering. Use it for global middleware logic.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php // src/hooks.php<br><br>// Inject custom response headers<br>header("X-Powered-By: LoomPHP");<br><br>// Global auth guard<br>$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);<br>if (str_starts_with($uri, "/admin") &amp;&amp; !isset($_SESSION["user"])) {<br>    header("Location: /login");<br>    exit();<br>}</code>
                    </div>
                    <p>The file is optional — if it doesn't exist, the router continues normally.</p>
                </div>
            </section>

            <section id="trailing-slash">
                <h2 class="mb-3 text-xl font-semibold">Trailing Slash</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Configure via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">TRAILING_SLASH</code> in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">.env</code>. Three modes available:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">TRAILING_SLASH=never    # default — /about works, /about/ → 308 → /about
TRAILING_SLASH=always   # /about/ works, /about  → 308 → /about/
TRAILING_SLASH=ignore   # both work, no redirect</code>
                    </div>
                    <p>Redirects use <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">308 Permanent Redirect</code> to preserve the request method. The root path <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">/</code> is never redirected.</p>
                </div>
            </section>

            <section id="api-endpoints">
                <h2 class="mb-3 text-xl font-semibold">API Endpoints</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Files in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/api/</code> map to <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">/api/&lt;path&gt;</code>. No layout, JSON only. Static and dynamic patterns work identically to page routing.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">src/api/posts.php                →  GET /api/posts
src/api/posts/[id].php           →  GET /api/posts/42
src/api/users/[id]/posts.php     →  GET /api/users/5/posts</code>
                    </div>
                    <p>Example endpoint:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php // src/api/posts/[id].php<br>$id = (int) ($routeParams["id"] ?? 0);<br><br>if (!$id) {<br>    http_response_code(400);<br>    echo json_encode(["error" =&gt; "Invalid ID"]);<br>    exit();<br>}<br><br>echo json_encode(["id" =&gt; $id, "title" =&gt; "Post $id"]);</code>
                    </div>
                    <p>Client-side fetching via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/utils/api.js</code> automatically includes <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">Accept: application/json</code> and <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">X-CSRF-Token</code> headers.</p>
                </div>
            </section>

            <section id="components">
                <h2 class="mb-3 text-xl font-semibold">Components</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p><strong class="text-foreground">PHP UI Components</strong> — Reusable PHP includes in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/components/ui/</code>. Set required variables then require the file:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php<br>$id = 'my-switch';<br>$label = 'Airplane Mode';<br>$checked = true;<br>require __DIR__ . "/../components/ui/switch.php";<br>?&gt;</code>
                    </div>
                    <p>Built-in components:</p>
                    <ul class="list-disc space-y-1 pl-5">
                        <li><code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">switch.php</code> — accessible toggle switch (<code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">role="switch"</code>)</li>
                        <li><code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">toast/toaster.php</code> — drag-to-dismiss notification system</li>
                        <li><code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">command/command.php</code> — command palette dialog (trigger: <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">Ctrl+S</code>)</li>
                        <li><code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">drawer/</code> — slide-in drawer panel</li>
                    </ul>
                    <p><strong class="text-foreground">Basecoat classes</strong> — use <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">btn</code>, <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">card</code>, <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">dialog</code>, <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">badge</code>, <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">input</code>, <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">label</code> anywhere in your PHP templates. Full component library at <a href="https://basecoatui.com/components/" class="text-foreground underline underline-offset-2 hover:no-underline">basecoatui.com/components</a>.</p>
                </div>
            </section>

            <section id="custom-js-components">
                <h2 class="mb-3 text-xl font-semibold">Custom JS Components</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>JavaScript components live in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/components/</code>. Each exports a class with <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">constructor(container, initialData?)</code>:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">// src/components/Counter.js<br>export class Counter {<br>  constructor(container, initialData) {<br>    this.el = container<br>    this.count = initialData?.count ?? 0<br>    this.render()<br>  }<br>  render() {<br>    this.el.textContent = this.count<br>  }<br>}</code>
                    </div>
                    <p>Import from per-page entry points (<code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/pages/*/index.js</code>). Vite code-splits shared components automatically.</p>
                </div>
            </section>

            <section id="data-hydration">
                <h2 class="mb-3 text-xl font-semibold">Data Hydration</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Set <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">$pageData</code> (array) in any page. The root layout embeds it as <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">window.__INITIAL_DATA__</code>. JS components receive it as an optional second argument — no HTTP loopback, no latency, no deadlock risk.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php // in your PHP page<br>$pageData = ["user" =&gt; getCurrentUser()];<br>?&gt;<br><br>// in your page's index.js<br>import { UserProfile } from '../components/UserProfile.js'<br><br>const el = document.getElementById('profile')<br>if (el) new UserProfile(el, window.__INITIAL_DATA__?.user)</code>
                    </div>
                </div>
            </section>

            <section id="client-side-stores">
                <h2 class="mb-3 text-xl font-semibold">Client-side Stores</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Lightweight reactive stores with zero dependencies. Import from <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/utils/store.js</code>:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">import { writable, derived } from '../utils/store.js'<br><br>const count = writable(0)<br>const doubled = derived(count, n =&gt; n * 2)<br><br>count.subscribe(n =&gt; console.log(n)) // fires on every change<br>count.set(5)         // logs 5<br>count.update(n =&gt; n + 1)  // logs 6</code>
                    </div>
                    <p>Pass the same store instance to multiple components for shared reactive state without any framework.</p>
                </div>
            </section>

            <section id="csrf-protection">
                <h2 class="mb-3 text-xl font-semibold">CSRF Protection</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Built-in CSRF via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">LoomPHP\Csrf</code>. Every POST request is auto-validated by the front controller. Returns a 419 page on failure.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php // in HTML forms — output hidden CSRF token field<br>LoomPHP\Csrf::hidden()<br>?&gt;<br><br>// For JSON API POST requests, include header automatically<br>// via src/utils/api.js:<br>// X-CSRF-Token: &lt;token&gt;</code>
                    </div>
                </div>
            </section>

            <section id="seo">
                <h2 class="mb-3 text-xl font-semibold">SEO</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Fluent SEO helper via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">LoomPHP\Seo</code>. The <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">$seo</code> object is injected into every page and layout automatically.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">&lt;?php<br>$seo->title("My Page — LoomPHP")<br>    ->description("A compelling description for search engines.")<br>    ->og("og:title", "My Page")<br>    ->og("og:description", "...")<br>    ->og("og:image", "https://example.com/og.png")<br>    ->schema("WebPage", ["name" =&gt; "My Page"]);<br>?&gt;</code>
                    </div>
                    <p>The root layout calls <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">renderTitle()</code>, <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">renderMeta()</code>, and <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">renderSchema()</code> in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">&lt;head&gt;</code> automatically.</p>
                </div>
            </section>

            <section id="cache-redis">
                <h2 class="mb-3 text-xl font-semibold">Cache (Redis)</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Optional Redis caching via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">LoomPHP\Cache</code> (Predis wrapper). Falls back gracefully if Redis is unavailable — no crashes, just cache misses.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed">use LoomPHP\Cache;<br><br>$posts = Cache::remember('posts:all', 3600, function () {<br>    return fetchPostsFromDatabase();<br>});</code>
                    </div>
                    <p>Configure via <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">REDIS_HOST</code> and <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">REDIS_PORT</code> in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">.env</code>. If Redis is not running the closure executes directly with no error.</p>
                </div>
            </section>

            <section id="per-page-javascript">
                <h2 class="mb-3 text-xl font-semibold">Per-page JavaScript</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Each page can have its own <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">index.js</code> alongside its <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">index.php</code>. Vite discovers them automatically via glob (<code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">src/pages/**/index.js</code>) and outputs code-split, content-hashed chunks.</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">src/pages/index.js         →  loaded only on /
src/pages/docs/index.js    →  loaded only on /docs
src/components/Counter.js  →  shared chunk (deduplicated by Vite)</code>
                    </div>
                    <p>The root layout auto-detects which per-page chunk to load (dev: Vite URL, prod: hashed manifest path). Only the JS needed for the current page is ever sent to the browser.</p>
                </div>
            </section>

            <section id="vite-hmr--build">
                <h2 class="mb-3 text-xl font-semibold">Vite HMR &amp; Build</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Development runs on a single URL (<code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">localhost:5173</code>) — Vite proxies PHP on <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">localhost:8000</code>. CSS HMR updates in place. PHP file changes trigger a full-page reload automatically via the built-in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">phpWatchPlugin</code> in <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">vite.config.js</code>.</p>
                    <p>Production outputs:</p>
                    <ul class="list-disc space-y-1 pl-5">
                        <li><strong class="text-foreground">Lightning CSS</strong> — modern CSS minification with full <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">has()</code> support</li>
                        <li><strong class="text-foreground">CSS code splitting</strong> — each page entry gets its own CSS chunk</li>
                        <li><strong class="text-foreground">Vendor chunking</strong> — chart.js, basecoat-css, and other node_modules split for long-term caching</li>
                        <li><strong class="text-foreground">Manifest</strong> — <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">public/assets/.vite/manifest.json</code> maps source paths to hashed filenames</li>
                    </ul>
                </div>
            </section>

            <section id="environment-config">
                <h2 class="mb-3 text-xl font-semibold">Environment Config</h2>
                <div class="space-y-3 text-sm leading-relaxed text-muted-foreground">
                    <p>Copy <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">.env.example</code> → <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">.env</code> and configure:</p>
                    <div class="rounded-xl bg-card p-4 shadow-sm ring-1 ring-black/[0.03] dark:ring-white/[0.03]">
                        <code class="block text-xs leading-relaxed whitespace-pre">APP_ENV=dev             # "production" enables manifest-based asset loading
APP_DEBUG=true          # enable PHP error display
PORT=8000               # PHP built-in server port
REDIS_HOST=127.0.0.1   # optional
REDIS_PORT=6379         # optional
TRAILING_SLASH=never    # never | always | ignore</code>
                    </div>
                    <p>The front controller loads <code class="rounded-lg bg-muted px-1.5 py-0.5 text-xs font-medium text-foreground">.env</code> automatically on every request. Environment variables set before PHP starts (e.g. via systemd or Docker) take precedence and are never overwritten.</p>
                </div>
            </section>

        </div>
    </div>
</div>

<style>
html { scroll-behavior: smooth; }
section[id] { scroll-margin-top: 100px; }
[data-sidebar-link].active { color: hsl(var(--foreground)); font-weight: 500; }
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const ind = document.getElementById('sidebar-indicator');
  const links = [...document.querySelectorAll('[data-sidebar-link]')];
  if (!ind || !links.length) return;

  const items = links.map(l => {
    const id = l.getAttribute('href').slice(1);
    return { link: l, el: document.getElementById(id) };
  }).filter(m => m.el);

  function pos(el) {
    const r = el.getBoundingClientRect();
    const p = ind.parentElement.getBoundingClientRect();
    return { top: r.top - p.top, height: r.height };
  }

  function move(to) {
    if (!to) { ind.style.opacity = '0'; return; }
    const p = pos(to);
    ind.style.cssText = `top:${p.top}px;height:${p.height}px;opacity:1`;
  }

  let active = null;
  let hover = null;

  function activate(link) {
    if (link === active) return;
    active = link;
    links.forEach(l => l.classList.toggle('active', l === link));
    if (!hover) move(link);
  }

  const observer = new IntersectionObserver(entries => {
    const visible = entries.filter(e => e.isIntersecting);
    if (!visible.length) return;
    const top = visible.reduce((a, b) =>
      a.boundingClientRect.top < b.boundingClientRect.top ? a : b
    );
    const match = links.find(l => l.getAttribute('href') === `#${top.target.id}`);
    if (match) activate(match);
  }, { rootMargin: '-10% 0px -75% 0px', threshold: 0 });

  items.forEach(({ el }) => observer.observe(el));

  links.forEach(l => {
    l.addEventListener('mouseenter', () => { hover = l; move(l); });
    l.addEventListener('mouseleave', () => { hover = null; move(active); });
    l.addEventListener('click', e => {
      e.preventDefault();
      const t = document.getElementById(l.getAttribute('href').slice(1));
      if (!t) return;
      activate(l);
      window.scrollTo({ top: t.getBoundingClientRect().top + window.scrollY - 100, behavior: 'smooth' });
      history.pushState(null, null, l.getAttribute('href'));
    });
  });

  setTimeout(() => {
    const hash = window.location.hash;
    const init = hash ? links.find(l => l.getAttribute('href') === hash) : links[0];
    if (init) { activate(init); move(init); }
  }, 100);
});
</script>
