# LoomPHP — Opinionated Vanilla PHP Boilerplate

LoomPHP is a lightweight, modern boilerplate designed to bring framework-level developer experience (DX) and tooling to vanilla PHP applications. It combines file-based routing, global middleware hooks, and a Svelte-like reactive client store with Tailwind CSS v4, Basecoat UI components, and Vite-powered Hot Module Replacement (HMR).

---

## Key Features

- **Modern File-Based Routing**: Clean structure-based page resolution (`src/pages/[id].php` maps directly to `/pages/:id`) with support for nested layouts.
- **Vite & HMR (Hot Module Replacement)**: Near-instant browser feedback loop in development. Vite automatically injects style updates and hot-reloads the page when PHP, CSS, or JS files change.
- **Tailwind CSS v4 & Lightning CSS**: Leverage the brand new Tailwind v4 compiler for styling, with Lightning CSS minifying production builds.
- **Global Middleware Hooks**: Intercept requests globally via `src/hooks.php` to handle authentication guards, custom header injections, or rate-limiting.
- **Basecoat UI Components**: Clean, pre-styled semantic HTML primitives using the framework-agnostic Basecoat design system.
- **Reactive State Management**: Sync state across vanilla JavaScript components on the page seamlessly with lightweight reactive stores (`store.js`).
- **Silent Redis Cache Failover**: Cache heavy database or API queries using the `Cache::remember` wrapper which falls back to raw execution if Redis goes offline.

---

## Installation & Getting Started

### 1. Prerequisites
Ensure you have **PHP 8.1+**, **Composer**, and **Node.js (v18+)** installed.

### 2. Clone the Repository
```bash
git clone https://github.com/user/loomphp && cd loomphp
```

### 3. Install Dependencies
```bash
composer install && npm install
```

### 4. Environment Setup
Copy the example environment configuration:
```bash
cp .env.example .env
```

### 5. Launch Development Server
```bash
npm run dev
```
Open `http://localhost:5173` to see your application with Vite HMR running.

---

## Project Commands

| Command | Action |
|---|---|
| `npm run dev` | Start concurrent PHP dev server (port 8000) & Vite (port 5173) with HMR |
| `npm run build` | Compile and bundle production assets with Lightning CSS minification |
| `npm run start` | Start the PHP built-in server in production mode |
| `npm run dev:php` | Run the PHP built-in development server only |
| `npm run dev:vite` | Run the Vite asset dev server only |

---

## Project Structure

```text
├── public/
│   ├── index.php      # Front controller (routing & request handling)
│   ├── router.php     # Built-in PHP server router
│   └── assets/        # Compiled production assets (gitignored)
├── src/
│   ├── app.css        # Tailwind CSS v4 entry point & basecoat themes
│   ├── app.js         # Global JS entry (basecoat plugins, global libraries)
│   ├── hooks.php      # Global request interception (middleware)
│   ├── api/           # JSON endpoints (/api/<path>.php)
│   ├── pages/         # Page templates and page-specific JS entry points
│   ├── components/    # Reusable PHP UI templates & Javascript modules
│   ├── lib/           # Core PHP libraries (Cache, Csrf, Seo, config)
│   └── utils/         # Client-side stores, API wrappers, environment utils
```
