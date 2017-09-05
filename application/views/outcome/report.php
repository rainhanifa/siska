<html>
    <head>
        <link href="<?php echo base_url('assets/')?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/')?>css/paper-dashboard.css" rel="stylesheet"/>
        <link href="<?php echo base_url('assets/')?>css/custom.css" rel="stylesheet" />
    </head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="header text-center">
                                <img src="<?php echo base_url('assets/')?>img/illiyin_logo.jpeg" class="logo-report">
                                <h2>Illiyin Outcome Report</h2>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-bordered">
                                    <tr class="table-info">
                                        <td width="5%" class="text-center"><h5>#</h5></td>
                                        <td width="10%" class="text-center"><h5>DATE</h5></td>
                                        <td width="30%" class="text-center"><h5>DESCRIPTION</h5></td>
                                        <td width="20%" class="text-center"><h5>CATEGORY</h5></td>
                                        <td width="15%" class="text-center"><h5>PIC</h5></td>
                                        <td width="10%" class="text-center"><h5>TOTAL</h5></td>
                                    </tr>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($transactions as $transaction) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo date("d-m", strtotime($transaction['date']))?></td>
                                            <td><?php echo $transaction['description']?></td>
                                            <td><?php echo $transaction['category_name']?></td>
                                            <td><?php $name=explode(" ",$transaction['member_name']); echo $name[0]." ".$name[1]?></td>
                                            <td class="text-right"><?php echo rupiah($transaction['total'])?></td>
                                        </tr>
                                        <?php $no++;
                                                } ?>
                                    </tbody>
                                    <tr>
                                        <td colspan="5" class="text-right"><h5>Total Outcome</h5></td>
                                        <td class="text-right"><h><?php echo rupiah($grand_total)?></h5></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
</body>

    <script src="<?php echo base_url('assets/')?>js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/')?>js/bootstrap.min.js" type="text/javascript"></script>
</html>
