        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <a href="<?php echo base_url('member/add')?>" class="btn btn-warning">New Member</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="table-member">
                                    <thead>
                                        <th>#</th>
                                    	<th>Name</th>
                                    	<th>Job Description</th>
                                        <th>Member Since</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($members as $member) { ?>
                                        <tr>
                                        	<td><?php echo $no;?></td>
                                        	<td><?php echo $member['name']?></td>
                                            <td><?php echo $member['job_desc']?></td>
                                            <td><?php echo $member['member_since']?></td>
                                            <td><a href="<?php echo base_url('member/detail/').$member['id']?>"><i class="ti-angle-double-right"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++;
                                                } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

        