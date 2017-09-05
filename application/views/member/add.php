
        <div class="content">
            <div class="container-fluid">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content">
                                <form action="<?php echo base_url('member/process_add')?>" method="post">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control border-input">
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Job Description</label>
                                                <input type="text" name="job_desc" class="form-control border-input" placeholder="Job Description" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Member Since</label>
                                                <input type="text" name="date" class="form-control border-input date-picker" placeholder="Date Transaction" value="01-09-2017">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Place of Birth</label>
                                                <input type="text" name="pob" class="form-control border-input" placeholder="City Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="text" name="dob" class="form-control border-input date-picker" placeholder="Date of Birth" value="01-09-2017">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control border-input" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" name="phone" class="form-control border-input" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-input"></textarea>
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


    <link href="<?php echo base_url('assets/')?>css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/')?>js/bootstrap-datepicker.js" type="text/javascript"></script>