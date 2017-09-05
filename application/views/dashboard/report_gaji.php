<html>
    <head>
        <!-- <link href="<?php echo base_url('assets/')?>css/bootstrap.min.css" rel="stylesheet" /> -->
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
                                <h2>Illiyin Salary Report</h2>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-bordered">
                                    <tr>
                                        <h5>
                                        <td class="text-center" width="20%">NAMA</td>
                                        <td class="text-center" width="15%">POKOK</td>
                                        <td class="text-center" width="15%">DENDA</td>
                                        <td class="text-center" width="15%">UTANG</td>
                                        <td class="text-center" width="15%">PIUTANG</td>
                                        <td class="text-center">TOTAL GAJI</td>
                                        </h5>
                                    </tr>
                                    <tbody>
                                        <?php
                                            $dibayarkan = 0;
                                            foreach($member as $member) { ?>
                                        <tr>
                                            <td><?php echo $member['name']?></td>
                                            <td class="text-right"><?php echo rupiah($gaji); ?></td>
                                            <td class="text-right"><?php echo rupiah(getDendaMember($member['id'])); ?></td>
                                            <td class="text-right"><?php echo rupiah(0) ?></td>
                                            <td class="text-right"><?php echo rupiah(getPiutangMember($member['id']))?></td>
                                            <td class="text-right"><?php echo rupiah($total_bayar = $gaji + getPiutangMember($member['id']) - getDendaMember($member['id']))?></td>
                                        </tr>
                                        <?php   
                                            $dibayarkan = $dibayarkan + $total_bayar;
                                        } ?>
                                    </tbody>
                                        <tr>
                                        <h5>
                                            <td colspan="5" class="text-right">Total Gaji Dibayarkan</td>
                                            <td class="text-right"><?php echo rupiah($dibayarkan)?></td>
                                        </h5>
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
