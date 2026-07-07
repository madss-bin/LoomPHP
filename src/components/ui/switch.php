<?php
/**
 * Switch component
 * @param string $id      Input id (required)
 * @param string $label   Visible label
 * @param bool   $checked Initial state
 * @param bool   $disabled
 * @param bool   $invalid
 * @param string $size    "sm" or null for default
 * @param string $description Help text
 */
$id = $id ?? '';
$label = $label ?? '';
$checked = $checked ?? false;
$disabled = $disabled ?? false;
$invalid = $invalid ?? false;
$size = $size ?? '';
$description = $description ?? '';
$fieldAttrs = 'role="group" class="field" data-orientation="horizontal"';
if ($disabled) $fieldAttrs .= ' data-disabled="true"';
if ($invalid) $fieldAttrs .= ' data-invalid="true"';
?>
<div <?= $fieldAttrs ?>>
    <?php if ($description): ?>
    <section>
        <label for="<?= $id ?>"><?= htmlspecialchars($label) ?></label>
        <p id="<?= $id ?>-desc"><?= htmlspecialchars($description) ?></p>
    </section>
    <?php endif; ?>
    <input type="checkbox" id="<?= $id ?>" role="switch" class="input"<?= $checked ? ' checked' : '' ?><?= $disabled ? ' disabled' : '' ?><?= $invalid ? ' aria-invalid="true"' : '' ?><?= $size ? ' data-size="' . htmlspecialchars($size) . '"' : '' ?><?= $description ? ' aria-describedby="' . $id . '-desc"' : '' ?> />
    <?php if (!$description): ?>
    <label for="<?= $id ?>"><?= htmlspecialchars($label) ?></label>
    <?php endif; ?>
</div>
