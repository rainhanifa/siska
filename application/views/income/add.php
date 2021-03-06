        <div class="content">
            <div class="container-fluid">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content">
                                <form action="<?php echo base_url('income/process_add')?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input class="datepicker form-control border-input" type="text" name="date" placeholder="01-09-2017" data-date-format="dd-mm-yyyy"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="form-control border-input">
                                                        <option value="1">Pemasukan</option>
                                                        <option value="0">Pengeluaran</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Member</label>
                                                <select name="member" class="form-control border-input">
                                                    <?php foreach($members as $member) {?>
                                                            <option value="<?php echo $member['id']?>"><?php echo $member['name']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="description" class="form-control border-input" placeholder="Description" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="number" name="total" class="form-control border-input" placeholder="Total">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-warning btn-fill btn-wd">Save</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

     
    <link href="<?php echo base_url('assets/')?>css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/')?>js/bootstrap-datepicker.js"></script>


    <script type="text/javascript">
        $(function(){
            $('.datepicker').datepicker({
                 weekStart:1,
                 color: 'yellow'
             });
        });
        
    </script>