# LoomPHP

LoomPHP is a lightweight, modern boilerplate designed to bring framework-level developer experience (DX) and tooling to vanilla PHP applications. It combines file-based routing, global middleware hooks, and a Svelte-like reactive client store with Tailwind CSS v4, Basecoat UI components, and Vite-powered Hot Module Replacement (HMR).

## Installation & Getting Started

### 1. Prerequisites
Ensure you have **PHP 8.1+**, **Composer**, and **Node.js (v18+)** installed.

### 2. Clone the Repository
```bash
git clone https://github.com/madss-bin/loomphp && cd loomphp
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
