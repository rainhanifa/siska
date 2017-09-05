
        <div class="content">
            <div class="container-fluid">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content">
                                <?php foreach ($member as $member){?>
                                <form action="<?php echo base_url('member/process_edit')?>" method="post">
                                    <div class="row">
                                        <input type="hidden" name="id" value=" <?php echo $member['id']?>">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Name" value="<?php echo $member['name']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control border-input">
                                                    <option value="M" <?php echo($member['gender'] == 'M' ? 'selected' : '')?>>Male</option>
                                                    <option value="F" <?php echo($member['gender'] == 'F' ? 'selected' : '')?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Job Description</label>
                                                <input type="text" name="job_desc" class="form-control border-input" placeholder="Job Description" value="<?php echo $member['job_desc']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Member Since</label>
                                                <input type="text" name="date" class="form-control border-input date-picker" value="<?php echo date('d-m-Y', strtotime($member['member_since']))?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Place of Birth</label>
                                                <input type="text" name="pob" class="form-control border-input" placeholder="City Name" value="<?php echo $member['place_of_birth']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="text" name="dob" class="form-control border-input date-picker" placeholder="Date of Birth" value="<?php echo date('d-m-Y', strtotime($member['date_of_birth']))?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control border-input" placeholder="Email" value="<?php echo $member['email']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" name="phone" class="form-control border-input" placeholder="Phone" value="<?php echo $member['phone']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-input"><?php echo $member['address']?></textarea>
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
                    <?php } ?>

                </div>
            </div>
        </div>


    <link href="<?php echo base_url('assets/')?>css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/')?>js/bootstrap-datepicker.js" type="text/javascript"></script>