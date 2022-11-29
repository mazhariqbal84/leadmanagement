<!--CRUMBS CONTAINER (LEFT)-->
<div class="col-md-12 <?php echo e(runtimeCrumbsColumnSize($page['crumbs_col_size'] ?? '')); ?> align-self-center <?php echo e($page['crumbs_special_class'] ?? ''); ?>" id="breadcrumbs">
    <h3 class="text-themecolor"><?php echo e($page['heading']); ?></h3>
    <!--crumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?php echo e(cleanLang(__('lang.app'))); ?></li>
        <?php if(isset($page['crumbs'])): ?>
        <?php $__currentLoopData = $page['crumbs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <li class="breadcrumb-item <?php if($loop->last): ?> active active-bread-crumb <?php endif; ?>"><?php echo e($title ?? ''); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ol>
    <!--crumbs-->
</div>

<!--include various checkbox actions-->

<?php if(isset($page['page']) && $page['page'] == 'files'): ?>
<?php echo $__env->make('pages.files.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($page['page']) && $page['page'] == 'notes'): ?>
<?php echo $__env->make('pages.notes.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/u716989511/domains/heydukan.com/public_html/leadmanagement/application/resources/views/misc/heading-crumbs.blade.php ENDPATH**/ ?>