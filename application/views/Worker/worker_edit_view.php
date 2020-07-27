

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
                <form class="form-horizontal" action="<?php echo base_url('job/edit/').$data[0]->id;?>" method="post" autocomplete="off" >
                    <div class="box-body">

                        <div class="form-group">
                        <label for="job_name" class="col-sm-2 control-label">Job Name :</label>
                        <div class="col-sm-6">
                            <input id="job_name" name="job_name" type="text" class="form-control"  value="<?php echo $data[0]->job_name; ?>">
                            <span class="error" id="error"><?php echo form_error('job_name'); ?></span>
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="job_location" class="col-sm-2 control-label">Location :</label>
                        <div class="col-sm-4">
                            <input id="job_location" name="job_location" type="text" class="form-control"  value="<?php echo  $data[0]->location; ?>">
                            <span class="error" id="error"><?php echo form_error('job_location'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="job_desc" class="col-sm-2 control-label"> Description : </label>
                            <div class="col-sm-6">
                            <textarea id="job_desc" name="job_desc" class="form-control" rows="3"><?php echo $data[0]->job_des; ?></textarea>
                                <span class="error" id="error"><?php echo form_error('job_desc'); ?></span>
                            </div>
                        </div>


                            <div class="form-group">
                            <label for="startDate" class="col-sm-2 control-label">Start Date : </label>
                            <div class="col-sm-3">
                            <input id="startDate" name="startDate" type="text" class="form-control datepicker" value="<?php echo  $data[0]->start_date; ?>">
                                <span class="error" id="error"><?php echo form_error('startDate'); ?></span>
                            </div>
                            
                        </div>
                        
                    </div>
                <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
                        <button type="button" class="btn btn-danger hidden-print" onclick="jobDelete(<?php echo $data[0]->id?>)" ><i class="fa  fa-trash"></i> Delete </button>
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

    function jobDelete(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: ' #d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            window.location.replace("<?php echo base_url('job/delete/')?>"+id+"");
        }
        })
    }
   

</script>