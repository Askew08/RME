
<?php
	$current_value = old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? '';
    $entity_model = $crud->getRelationModel($field['entity'],  - 1);
    $field['allows_null'] = $field['allows_null'] ?? $entity_model::isColumnNullable($field['name']);

    //if it's part of a relationship here we have the full related model, we want the key.
    if (is_object($current_value) && is_subclass_of(get_class($current_value), 'Illuminate\Database\Eloquent\Model') ) {
        $current_value = $current_value->getKey();
    }

    if (!isset($field['options'])) {
        $options = $field['model']::all();
    } else {
        $options = call_user_func($field['options'], $field['model']::query());
    }
?>

<?php echo $__env->make('crud::fields.inc.wrapper_start', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(isset($field['prefix']) || isset($field['suffix'])): ?> <div class="input-group"> <?php endif; ?>
        <?php if(isset($field['prefix'])): ?> <span class="input-group-text"><?php echo $field['prefix']; ?></span> <?php endif; ?>
        <select
            name="<?php echo e($field['name']); ?>"
            <?php echo $__env->make('crud::fields.inc.attributes', ['default_class' => 'form-control form-select'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            >

            <?php if($field['allows_null']): ?>
                <option value="">-</option>
            <?php endif; ?>

            <?php if(count($options)): ?>
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $connected_entity_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($current_value == $connected_entity_entry->getKey()): ?>
                        <option value="<?php echo e($connected_entity_entry->getKey()); ?>" selected><?php echo e($connected_entity_entry->{$field['attribute']}); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($connected_entity_entry->getKey()); ?>"><?php echo e($connected_entity_entry->{$field['attribute']}); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
        <?php if(isset($field['suffix'])): ?> <span class="input-group-text"><?php echo $field['suffix']; ?></span> <?php endif; ?>
    <?php if(isset($field['prefix']) || isset($field['suffix'])): ?> </div> <?php endif; ?>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>

<?php echo $__env->make('crud::fields.inc.wrapper_end', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH D:\Dzaky\Kuliah\Semester6\SIRS\SIMRS\vendor\backpack\crud\src\resources\views\crud/fields/select.blade.php ENDPATH**/ ?>