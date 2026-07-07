<?php
/**
 * Server-rendered toast item
 * @param string $category    "success"|"info"|"warning"|"error"
 * @param string $title
 * @param string $description
 * @param array  $action      ["label" => ..., "href" => ...] or ["label" => ..., "onclick" => ...]
 * @param array  $cancel      ["label" => ..., "onclick" => ...]
 * @param int    $duration    -1 for sticky, null for default
 */
$category = $category ?? 'success';
$title = $title ?? '';
$description = $description ?? '';
$action = $action ?? null;
$cancel = $cancel ?? null;
$duration = $duration ?? '';
?>
<div class="toast" role="status" aria-atomic="true" aria-hidden="false" data-category="<?= $category ?>"<?= $duration !== '' ? ' data-duration="' . $duration . '"' : '' ?>>
    <div class="toast-content">
        <?php if ($category === 'success'): ?>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
        <?php elseif ($category === 'error'): ?>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
        <?php elseif ($category === 'warning'): ?>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
        <?php elseif ($category === 'info'): ?>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        <?php endif; ?>
        <section>
            <h2><?= htmlspecialchars($title) ?></h2>
            <?php if ($description): ?>
            <p><?= htmlspecialchars($description) ?></p>
            <?php endif; ?>
        </section>
        <?php if ($action || $cancel): ?>
        <footer>
            <?php if ($action): ?>
            <button type="button" class="btn" data-size="sm" data-toast-action<?= isset($action['href']) ? ' onclick="location.href=\'' . htmlspecialchars($action['href'], ENT_QUOTES) . '\'"' : (isset($action['onclick']) ? ' onclick="' . htmlspecialchars($action['onclick'], ENT_QUOTES) . '"' : '') ?>><?= htmlspecialchars($action['label']) ?></button>
            <?php endif; ?>
            <?php if ($cancel): ?>
            <button type="button" class="btn" data-variant="outline" data-size="sm" data-toast-cancel<?= isset($cancel['onclick']) ? ' onclick="' . htmlspecialchars($cancel['onclick'], ENT_QUOTES) . '"' : '' ?>><?= htmlspecialchars($cancel['label']) ?></button>
            <?php endif; ?>
        </footer>
        <?php endif; ?>
    </div>
</div>
