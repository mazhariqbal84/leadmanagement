<!--main table view-->
<?php echo $__env->make('pages.clients.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.clients.components.misc.filter-clients', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter-->

<!--export-->
<?php if(config('visibility.list_page_actions_exporting')): ?>
<?php echo $__env->make('pages.export.clients.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--export--><?php /**PATH /home/u716989511/domains/heydukan.com/public_html/leadmanagement/application/resources/views/pages/clients/components/table/wrapper.blade.php ENDPATH**/ ?>