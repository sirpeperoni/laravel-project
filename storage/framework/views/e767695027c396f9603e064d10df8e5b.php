<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['color' => 'primary', 'size'=>'', 'id_work' => '',]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['color' => 'primary', 'size'=>'', 'id_work' => '',]); ?>
<?php foreach (array_filter((['color' => 'primary', 'size'=>'', 'id_work' => '',]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>



<button <?php echo e($attributes->class([
    "btn btn-{$color}", ($size ? "btn-{$size}" : ''),
])->merge([
    'type' =>'button',
    'id_work'=> ($attributes->get('id_work') ?: $id_work),
])); ?> class="btn btn-primary">
    <?php echo e($slot); ?>

</button>
<?php /**PATH /var/www/html/resources/views/components/button.blade.php ENDPATH**/ ?>