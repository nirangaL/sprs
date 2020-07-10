

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
            Rider Record
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <!-- <?php// print_r($bloodgroups);?> -->
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('job/store');?>" method="post" autocomplete="off" >
                    <div class="box-body">

                        <div class="form-group">
                        <label for="job_name" class="col-sm-2 control-label">Job Name :</label>
                        <div class="col-sm-6">
                            <input id="job_name" name="job_name" type="text" class="form-control"  value="<?php echo set_value('job_name'); ?>">
                            <span class="error" id="error"><?php echo form_error('job_name'); ?></span>
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="job_location" class="col-sm-2 control-label">Location :</label>
                        <div class="col-sm-4">
                            <input id="job_location" name="job_location" type="text" class="form-control"  value="<?php echo set_value('job_location'); ?>">
                            <span class="error" id="error"><?php echo form_error('job_location'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="job_desc" class="col-sm-2 control-label"> Description : </label>
                            <div class="col-sm-6">
                            <textarea id="job_desc" name="job_desc" class="form-control" rows="3"><?php echo set_value('job_desc'); ?></textarea>
                                <span class="error" id="error"><?php echo form_error('job_desc'); ?></span>
                            </div>
                        </div>


                            <div class="form-group">
                            <label for="startDate" class="col-sm-2 control-label">Start Date : </label>
                            <div class="col-sm-3">
                            <input id="startDate" name="startDate" type="text" class="form-control datepicker" value="<?php echo set_value('startDate'); ?>">
                                <span class="error" id="error"><?php echo form_error('startDate'); ?></span>
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

   

</script>