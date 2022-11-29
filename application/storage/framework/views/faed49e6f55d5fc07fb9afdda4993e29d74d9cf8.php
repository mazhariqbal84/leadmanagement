<div class="count-<?php echo e(@count($projects)); ?>" id="projects-view-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive list-table-wrapper">
                <?php if(@count($projects) > 0): ?>
                <table id="projects-list-table" class="table m-t-0 m-b-0 table-hover no-wrap contact-list"
                    data-page-size="10">
                    <thead>
                        <tr>
                            <?php if(config('visibility.projects_col_checkboxes')): ?>
                            <th class="list-checkbox-wrapper">
                                <!--list checkbox-->
                                <span class="list-checkboxes display-inline-block w-px-20">
                                    <input type="checkbox" id="listcheckbox-projects" name="listcheckbox-projects"
                                        class="listcheckbox-all filled-in chk-col-light-blue"
                                        data-actions-container-class="projects-checkbox-actions-container"
                                        data-children-checkbox-class="listcheckbox-projects">
                                    <label for="listcheckbox-projects"></label>
                                </span>
                            </th>
                            <?php endif; ?>
                            <th class="projects_col_id">
                                <a class="js-ajax-ux-request js-list-sorting" id="sort_project_id"
                                    href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_id&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.id'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <th class="projects_col_project">
                                <a class="js-ajax-ux-request js-list-sorting" id="sort_project_title"
                                    href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_title&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.title'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <?php if(config('visibility.projects_col_client')): ?>
                            <th class="projects_col_client">
                                <a class="js-ajax-ux-request js-list-sorting" id="sort_project_client"
                                    href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_client&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.client'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <?php endif; ?>
                            <th class="projects_col_start_date hidden">
                                <a class="js-ajax-ux-request js-list-sorting" id="sort_project_date_start"
                                    href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_date_start&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.start_date'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <th class="projects_col_end_date">
                                <a class="js-ajax-ux-request js-list-sorting" id="sort_project_date_due"
                                    href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_date_due&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.due_date'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <?php if(config('visibility.projects_col_tags')): ?>
                            <th class="projects_col_tags"><?php echo e(cleanLang(__('lang.tags'))); ?></th>
                            <?php endif; ?>
                            <th class="projects_col_progress"><a class="js-ajax-ux-request js-list-sorting"
                                    id="sort_project_progress" href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_progress&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.progress'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <?php if(config('visibility.projects_col_team')): ?>
                            <th class="projects_col_team"><a
                                    href="javascript:void(0)"><?php echo e(cleanLang(__('lang.team'))); ?></a></th>
                            <?php endif; ?>
                            <th class="projects_col_status">
                                <a class="js-ajax-ux-request js-list-sorting" id="sort_project_status"
                                    href="javascript:void(0)"
                                    data-url="<?php echo e(urlResource('/projects?action=sort&orderby=project_status&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.status'))); ?><span
                                        class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
                            </th>
                            <th class="projects_col_action"><a
                                    href="javascript:void(0)"><?php echo e(cleanLang(__('lang.action'))); ?></a></th>
                        </tr>
                    </thead>
                    <tbody id="projects-td-container">
                        <!--ajax content here-->
                        <?php echo $__env->make('pages.projects.views.list.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--/ajax content here-->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="20">
                                <!--load more button-->
                                <?php echo $__env->make('misc.load-more-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <!--/load more button-->
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php endif; ?> <?php if(@count($projects) == 0): ?>
                <!--nothing found-->
                <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--nothing found-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u716989511/domains/heydukan.com/public_html/leadmanagement/application/resources/views/pages/projects/views/list/table/table.blade.php ENDPATH**/ ?>