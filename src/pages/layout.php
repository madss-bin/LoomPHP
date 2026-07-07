<?php use LoomPHP\Config; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $seo->renderTitle() ?></title>
    <?= $seo->renderMeta() ?>
    <?= $seo->renderSchema() ?>
    <script>
    (() => {
      try {
        const stored = localStorage.getItem('themeMode')
        if (stored ? stored === 'dark' : true) {
          document.documentElement.classList.add('dark')
        }
      } catch (_) {}
    })()
    </script>
<?php if (IS_DEV):
    $vitePort = Config::get('vite_port', '5173');
    $viteUrl = "http://localhost:{$vitePort}";
    $pageJs =
        $pageFile === ""
            ? (file_exists(__DIR__ . "/index.js")
                ? "{$viteUrl}/src/pages/index.js"
                : null)
            : (file_exists(__DIR__ . "/{$pageFile}/index.js")
                ? "{$viteUrl}/src/pages/{$pageFile}/index.js"
                : (file_exists(__DIR__ . "/{$pageFile}.js")
                    ? "{$viteUrl}/src/pages/{$pageFile}.js"
                    : null)); ?>
    <script type="module" src="<?= $viteUrl ?>/@vite/client"></script>
    <link rel="stylesheet" href="<?= $viteUrl ?>/src/app.css">
    <script type="module" src="<?= $viteUrl ?>/src/app.js"></script>
    <?php if ($pageJs): ?>
    <script type="module" src="<?= $pageJs ?>"></script>
    <?php endif; ?>
<?php
else:

    $mf = __DIR__ . "/../../build/.vite/manifest.json";
    $m = file_exists($mf) ? json_decode(file_get_contents($mf), true) : [];
    $app = $m["src/app.js"] ?? [];
    $pageJsKey =
      $pageFile === ""
        ? "src/pages/index.js"
        : "src/pages/{$pageFile}/index.js";
    $page = $m[$pageJsKey] ?? ($m["src/pages/{$pageFile}.js"] ?? []);
    ?>
    <?php foreach (array_merge($app["css"] ?? [], $page["css"] ?? []) as $f): ?>
    <link href="/<?= $f ?>" rel="stylesheet">
    <?php endforeach; ?>
    <script type="module" src="/<?= $app["file"] ?>"></script>
    <?php if (isset($page["file"])): ?>
    <script type="module" src="/<?= $page["file"] ?>"></script>
    <?php endif; ?>
<?php
endif; ?>
</head>
<body class="min-h-screen bg-background text-foreground">
    <?php require __DIR__ . "/../components/header.php"; ?>
    <main>
        <?= $content ?>
    </main>
<?php if (!empty($pageData)): ?>
<script>window.__INITIAL_DATA__ = <?= json_encode($pageData) ?>;</script>
<?php endif; ?>
<?php require __DIR__ . "/../components/ui/command/command.php"; ?>
<?php require __DIR__ . "/../components/ui/toast/toaster.php"; ?>
</body>
