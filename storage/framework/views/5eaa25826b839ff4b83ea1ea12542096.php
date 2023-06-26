<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['method' => 'GET']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['method' => 'GET']); ?>
<?php foreach (array_filter((['method' => 'GET']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php ($method = strtoupper($method)); ?>
<?php ($_method = in_array($method, ['GET', 'POST'])); ?>

<form <?php echo e($attributes); ?> method="<?php echo e($_method ? $method : 'POST'); ?>">
    <?php if (! ($_method)): ?>
        <?php echo method_field($method); ?>
    <?php endif; ?>

    <?php if($method !== 'GET'): ?>
        <?php echo csrf_field(); ?>
    <?php endif; ?>

    <?php echo e($slot); ?>

</form>
<?php /**PATH /var/www/html/resources/views/components/form.blade.php ENDPATH**/ ?>