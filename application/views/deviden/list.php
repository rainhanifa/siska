<div class="content">


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <a href="#" class="btn btn-warning"  data-dismiss="modal" data-toggle="modal" data-target="#add_new">New Deviden</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            	<th>#</th>
                            	<th>Name</th>
                                <th>Since</th>
                            	<th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach($deviden as $deviden) { ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $deviden['name']?></td>
                                    <td><?php echo date("d-m-Y", strtotime($deviden['deviden_since']))?></td>
                                    <td><a href="#"><i class="ti-pencil"></i></a> <a href="#"><i class="ti-trash"></i></a></td>
                                </tr>
                                <?php $no++;
                                        } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>

    <!-- Modal -->
    <div class="modal fade modal-white" id="add_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form action="<?php echo base_url("deviden/process_add");?>" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content infotrophy-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">New Deviden</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12 col-lg-12 controls">
                                    <select name="member" class="form-control">
                                        <?php foreach($member as $member){?>
                                            <option value="<?php echo $member['id']?>"><?php echo $member['name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-12 col-lg-12 controls">
                                    <input type="text" name="date" class="form-control date-picker" placeholder="Member Since" value="01-09-2017">
                                </div>
                            </div>             
                        </div>  
                    </div>
                  <!-- end modal-body -->
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-info " value="Save" name="submit" >
                    </div>
                </div>
                <!-- end modal-content -->
            </div>
        </form>    
    </div>
    <!-- END Modal-->
    </div>