

<style>
  .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 34px;
    user-select: none;
    -webkit-user-select: none;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 4px;
    right: 1px;
    width: 20px;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
            <?php echo $title;?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <!-- <?php// print_r($bloodgroups);?> -->
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('Worker/store');?>" method="post" autocomplete="off" >
                    <div class="box-body">

                        <div class="form-group">
                        <label for="worker_name" class="col-sm-2 control-label">Name :</label>
                        <div class="col-sm-6">
                            <input id="worker_name" name="worker_name" type="text" class="form-control"  value="<?php echo set_value('worker_name'); ?>">
                            <span class="error" id="error"><?php echo form_error('worker_name'); ?></span>
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Job Title :</label>
                        <div class="col-sm-4">
                        <select name="job_title" id="job_title" class="form-control">
                                <!-- <option value=""></option> -->
                                <?php
                                if(!empty($jobTitle)){
                                    foreach($jobTitle as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php echo set_select('job_title',$item->id); ?> ><?php echo $item->job_title;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                            <span class="error" id="error"><?php echo form_error('job_title'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label"> Address : </label>
                            <div class="col-sm-4">
                            <textarea id="address" name="address" class="form-control" rows="3"><?php echo set_value('address'); ?></textarea>
                                <span class="error" id="error"><?php echo form_error('address'); ?></span>
                            </div>
                        </div>
                            <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">T.P : </label>
                            <div class="col-sm-3">
                            <input id="phone" name="phone" type="text" class="form-control" maxlength="10" value="<?php echo set_value('phone'); ?>">
                                <span class="error" id="error"><?php echo form_error('phone'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="amount" class="col-sm-2 control-label">Day charge : Rs. </label>
                            <div class="col-sm-2">
                            <input id="amount" name="amount" type="text" class="form-control text-right"  value="<?php echo set_value('amount'); ?>">
                                <span class="error" id="error"><?php echo form_error('amount'); ?></span>
                            </div>
                        </div>
                        
                    </div>
                <!-- /.box-body -->
                    <div class="box-footer text-right">
                        
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Clear</button>
                    </div>
                <!-- /.box-footer -->
                </form>
            </div>
          <!-- /.box -->
        </div>
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->

<script>
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    $('.select2').select2();

    jQuery(function($) {
      $('#amount').autoNumeric('init');    
    });
   

</script>