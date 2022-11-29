<div class="card count-<?php echo e(@count($clients)); ?>" id="clients-table-wrapper">
    <div class="card-body">
        <div class="table-responsive list-table-wrapper">
            <?php if(@count($clients) > 0): ?>
            <table id="clients-list-table" class="table m-t-0 m-b-0 table-hover no-wrap contact-list"
                data-page-size="10">
                <thead>
                    <tr>
                        <th class="clients_col_id">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_client_id" href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=client_id&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.id'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                        </th>
                        <th class="clients_col_company">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_client_company_name"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=client_company_name&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.company_name'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>
                        <th class="clients_col_account_owner">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_contact" href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=contact&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.account_owner'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>
                        <?php if(config('visibility.modules.projects')): ?>
                        <th class="clients_col_projects">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_count_projects"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=count_projects&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.projects'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                        </th>
                        <?php endif; ?>
                        <th class="clients_col_invoices">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_sum_invoices"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=sum_invoices&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.invoices'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                        </th>
                        <th class="clients_col_tags"><a href="javascript:void(0)"><?php echo e(cleanLang(__('lang.tags'))); ?></a>
                        </th>
                        <th class="clients_col_category">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_category" href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=category&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.category'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                        </th>
                        <th class="clients_col_status">
                            <a class="js-ajax-ux-request js-list-sorting" id="sort_client_status"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('/clients?action=sort&orderby=client_status&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.status'))); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                        </th>
                        <?php if(config('visibility.action_column')): ?>
                        <th class="clients_col_action"><a
                                href="javascript:void(0)"><?php echo e(cleanLang(__('lang.action'))); ?></a></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody id="clients-td-container">
                    <!--ajax content here-->
                    <?php echo $__env->make('pages.clients.components.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--ajax content here-->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="20">
                            <!--load more button-->
                            <?php echo $__env->make('misc.load-more-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!--load more button-->
                        </td>
                    </tr>
                </tfoot>
            </table>
            <?php endif; ?> <?php if(@count($clients) == 0): ?>
            <!--nothing found-->
            <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--nothing found-->
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/u716989511/domains/heydukan.com/public_html/leadmanagement/application/resources/views/pages/clients/components/table/table.blade.php ENDPATH**/ ?>