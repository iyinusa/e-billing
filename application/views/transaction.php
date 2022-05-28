<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading"> Transactions </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>E-Billing</li>
                    <li><a class="link-effect" href="<?php echo base_url('transactions'); ?>">Transactions</a></li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="content content-narrow">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">
                	Transactions
                </h3>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped js-dataTable-full-pagination small">
                    <thead>
                        <tr>
                            <th width="100px">Date</th>
                            <th>Order ID</th>
                            <?php if($ebs_user_role == 'Admin'){echo '<th>Student</th>';} ?>
                            <th>Fee</th>
                            <th>Amount</th>
                            <th>Card</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th class="text-center" width="40px"></th>
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
