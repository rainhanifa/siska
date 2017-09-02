<div class="content">


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <a href="#" class="btn btn-warning"  data-dismiss="modal" data-toggle="modal" data-target="#add_new">New Category</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            	<th>#</th>
                            	<th>Name</th>
                            	<th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach($categories as $category) { ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $category['name']?></td>
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
        <form action="<?php echo base_url("category/process_add");?>" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content infotrophy-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">New Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12 col-lg-12 controls">
                                    <input type="text" name="name" class="form-control" value="" placeholder="Category Name">
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