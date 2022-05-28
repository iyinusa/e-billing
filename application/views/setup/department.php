<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading"> Department </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Setup</li>
                    <li><a class="link-effect" href="<?php echo base_url('department'); ?>">Department</a></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content content-narrow">
        
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">
                	Department
                    <span class="pull-right">
                        <a href="javascript:;" class="btn btn-primary btn-sm btn-rounded pop" pageTitle="Add Department" pageName="<?php echo base_url('department/form/add'); ?>">
                            <i class="si si-plus"></i> Add
                        </a>
                    </span>
                </h3>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped js-dataTable-full-pagination small">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>School</th>
                            <th>Code</th>
                            <th class="text-center" width="40"></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php echo $list; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
