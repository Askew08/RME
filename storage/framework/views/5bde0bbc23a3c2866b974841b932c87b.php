
<li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('dashboard')); ?>"><i class="la la-home nav-icon"></i> <?php echo e(trans('backpack::base.dashboard')); ?></a></li>

<?php if (isset($component)) { $__componentOriginal3304fc1ec27516a666a2f68d6da76d86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdown::resolve(['title' => 'Admin','icon' => 'la la-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-pan' => 'menu-item-user']); ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Users','icon' => 'la la-user','link' => backpack_url('user')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Dokter','icon' => 'la la-question','link' => backpack_url('dokter')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Reservasi ','icon' => 'la la-question','link' => backpack_url('reservasi')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Kode Tindakan','icon' => 'la la-question','link' => backpack_url('kode-tindakan')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $attributes = $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $component = $__componentOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal3304fc1ec27516a666a2f68d6da76d86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdown::resolve(['title' => 'Pasien','icon' => 'la la-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-pan' => 'menu-item-user']); ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Pendaftaran Pasien','icon' => 'la la-user-md','link' => backpack_url('pasien')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Rawat jalan','icon' => 'la la-question','link' => backpack_url('rawat-jalan')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $attributes = $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $component = $__componentOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal3304fc1ec27516a666a2f68d6da76d86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdown::resolve(['title' => 'Pemeriksaan','icon' => 'la la-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-pan' => 'menu-item-user']); ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Pemeriksaan Perawat','icon' => 'la la-question','link' => backpack_url('pemeriksaan-perawat')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Pemeriksaan Dokter','icon' => 'la la-question','link' => backpack_url('pemeriksaan-dokter')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Pemeriksaan Labs','icon' => 'la la-question','link' => backpack_url('pemeriksaan-lab')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Peresepan','icon' => 'la la-question','link' => backpack_url('resep')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $attributes = $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $component = $__componentOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal3304fc1ec27516a666a2f68d6da76d86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdown::resolve(['title' => 'Obat','icon' => 'la la-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-pan' => 'menu-item-user']); ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Obat','icon' => 'la la-question','link' => backpack_url('obat')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0 = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuDropdownItem::resolve(['title' => 'Detail resep','icon' => 'la la-question','link' => backpack_url('detail-resep')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuDropdownItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $attributes = $__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__attributesOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0)): ?>
<?php $component = $__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0; ?>
<?php unset($__componentOriginal4a7c4d33fcbfdc491dc37cabf6bac1f0); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $attributes = $__attributesOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__attributesOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86)): ?>
<?php $component = $__componentOriginal3304fc1ec27516a666a2f68d6da76d86; ?>
<?php unset($__componentOriginal3304fc1ec27516a666a2f68d6da76d86); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Rekam Medis','icon' => 'la la-question','link' => backpack_url('rekam-medis')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php /**PATH D:\Dzaky\Kuliah\Semester6\SIRS\SIMRS\resources\views/vendor/backpack/ui/inc/menu_items.blade.php ENDPATH**/ ?>