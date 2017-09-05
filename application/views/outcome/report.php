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
                                        <td width="10%" class="text-center"><h5>DATE</h5></td>
                                        <td width="30%" class="text-center"><h5>DESCRIPTION</h5></td>
                                        <td width="20%" class="text-center"><h5>CATEGORY</h5></td>
                                        <td width="15%" class="text-center"><h5>PIC</h5></td>
                                        <td width="20%" class="text-center"><h5>TOTAL</h5></td>
                                    </tr>
                                    <tbody>
                                        <?php
                                            foreach($transactions as $transaction) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo date("d/m", strtotime($transaction['date']))?></td>
                                            <td><?php echo $transaction['description']?></td>
                                            <td class="text-center"><?php echo $transaction['category_name']?></td>
                                            <td class="text-center"><?php $name=explode(" ",$transaction['member_name']); echo $name[0]." ".$name[1]?></td>
                                            <td class="text-right"><?php echo rupiah($transaction['total'])?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tr>
                                        <td colspan="4" class="text-right"><h5>Outcome</h5></td>
                                        <td class="text-right"><h5><?php echo rupiah($grand_total)?></h5></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><h5>Sisa Operasional Bulan Lalu</h5></td>
                                        <td class="text-right"><h5><?php echo rupiah(928900)?></h5></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><h5>Total Outcome</h5></td>
                                        <td class="text-right"><h5><?php echo rupiah($grand_total - 928900)?></h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <h3>Outcome Modal </h3>
                                <table class="table table-bordered">
                                    <tr class="table-info">
                                        <td width="10%" class="text-center"><h5>DATE</h5></td>
                                        <td width="30%" class="text-center"><h5>DESCRIPTION</h5></td>
                                        <td width="15%" class="text-center"><h5>PIC</h5></td>
                                        <td width="15%" class="text-center"><h5>TOTAL</h5></td>
                                    </tr>
                                    <tbody>
                                        <?php
                                            foreach($transactions2 as $transaction2) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo date("d/m", strtotime($transaction2['date']))?></td>
                                            <td><?php echo $transaction2['description']?></td>
                                            <td class="text-center"><?php $name=explode(" ",$transaction2['member_name']); echo $name[0]." ".$name[1]?></td>
                                            <td class="text-right"><?php echo rupiah($transaction2['total'])?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tr class="table-success">
                                        <td colspan="3" class="text-right"><h5>Total Outcome Modal</h5></td>
                                        <td class="text-right"><h5><?php echo rupiah($grand_total_2)?></h5></td>
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
