<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading"> Fees </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>E-Billing</li>
                    <li><a class="link-effect" href="<?php echo base_url('fees'); ?>">Fees</a></li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="content content-narrow">
        <div class="row">
            <?php if($this->session->userdata('ebs_user_role') == 'Admin'){ ?>
            <div class="col-xs-12">
            	<a href="javascript:;" class="btn btn-success btn-sm btn-rounded pop" pageTitle="Create Fees" pageName="<?php echo base_url('fees/form/add'); ?>">
                    <i class="si si-plus"></i> Create New Fees
                </a><hr />
            </div>
            <?php } ?>
            
            <?php echo $list; ?>
            
        </div>
    </div>
</main>
