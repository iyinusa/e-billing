<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading"> Students </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Setup</li>
                    <li><a class="link-effect" href="<?php echo base_url('students'); ?>">Students</a></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content content-narrow">
        
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">
                	Students
                    <span class="pull-right">
                        <a href="javascript:;" class="btn btn-primary btn-sm btn-rounded pop" pageTitle="Add Student" pageName="<?php echo base_url('students/form/add'); ?>">
                            <i class="si si-plus"></i> Add
                        </a>
                    </span>
                </h3>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped js-dataTable-full-pagination small">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Matric No.</th>
                            <th>Department</th>
                            <th>Phone</th>
                            <th>Email</th>
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
