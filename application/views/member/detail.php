
        <div class="content">
            <div class="container-fluid">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-user">
                        <?php foreach($member as $member){ ?>
                            <div class="image">
                                <img src="<?php echo base_url('assets/')?>/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo base_url('assets/')?>img/faces/face-2.jpg" alt="..."/>
                                  <h4 class="title"><?php echo $member['name']?><br />
                                  <small><?php echo $member['job_desc']?></small>
                                  </h4>
                                </div>
                                <p class="description text-center"><small><i class="ti-email"></i> <?php echo $member['email']?></small></p>
                                <p class="description text-center"><small><i class="ti-mobile"></i> <?php echo $member['phone']?></small></p>
                                </p>
                            </div>
                            <div class="text-center">
                                <div class="row">
                                    <a href="<?php echo base_url('member/edit/').$member['id']?>" class="btn btn-warning">Edit</a>
                                </div>
                                <div class="row">
                                    <h5><small>Member Since: 
                                    <?php echo date('d-m-Y', strtotime($member['member_since']))?></small>
                                    </h5>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6">
                        <div class="card">
                            <div class="header">
                                Salary Report
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tr>
                                        <td>August 2017</td>
                                        <td><?php echo rupiah(0)?></td>
                                        <td><a href="#"><i class="ti-download"></i> Slip</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <link href="<?php echo base_url('assets/')?>css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/')?>js/bootstrap-datepicker.js" type="text/javascript"></script>