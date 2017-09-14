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
                                <h2>Illiyin Capital & Deviden Report</h2>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <h4>Modal</h4>
                                <table class="table table-bordered" id="table-transaction">
                                    <tr>
                                        <td class="text-center">DATE</h5></td>
                                        <td class="text-center">DESCRIPTION</h5></td>
                                        <td class="text-center" width="20%">PIC</h5></td>
                                        <td class="text-center">DEBIT</h5></td>
                                        <td class="text-center">CREDIT</h5></td>
                                    </tr>
                                    <tbody>
                                        <?php
                                            foreach($transactions as $transaction) { ?>
                                        <tr>
                                            <td><?php echo date("d/m", strtotime($transaction['date']))?></td>
                                            <td><?php echo $transaction['description']?></td>
                                            <td><?php echo $transaction['member_name']?></td>
                                            <td class="text-right"><?php echo rupiah(($transaction['category_id'] == 0) ? $transaction['total'] : 0) ?></td>
                                            <td class="text-right"><?php echo rupiah(($transaction['category_id'] == 1) ? $transaction['total'] : 0) ?></td>
                                        </tr>
                                        <?php } ?>

                                        <tr>
                                            <td><?php echo date("d/m")?></td>
                                            <td>Income Modal Agustus</td>
                                            <td>Imaniar</td>
                                            <td></td>
                                            <td class="text-right"><?php echo rupiah($income_modal)?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo date("d/m")?></td>
                                            <td>Total Denda Agustus</td>
                                            <td>Dimas</td>
                                            <td></td>
                                            <td class="text-right"><?php echo rupiah(1468000)?></td>
                                        </tr>
                                    </tbody>
                                    <tr>

                                        <h5>
                                        <td colspan="4" class="text-right"><h5>Saldo Modal</h5></td>
                                        <td class="text-right"><h5><?php echo rupiah($saldo_modal + 1468000)?></h5></td>
                                        </h5>
                                    </tr>
                                </table>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <h4>Deviden</h4>
                                Total Pendapatan Deviden Agustus 2017 : <?php echo rupiah($income_deviden)?><br/>Pendapatan per deviden <?php echo rupiah($income_deviden/4)?>

                                <table class="table table-bordered">
                                    <tr>
                                        <h5>
                                        <td class="text-center" width="20%">NAMA</td>
                                        <td class="text-center">JUNE 2017</td>
                                        <td class="text-center">JULY 2017</td>
                                        <td class="text-center">AUGUST 2017</td>
                                        <td class="text-center">TOTAL</td>
                                        </h5>
                                    </tr>
                                    <tbody>
                                        <?php
                                            $total_deviden = 0;
                                            foreach($deviden as $deviden) { ?>
                                        <tr>
                                            <td><?php echo $deviden['name']?></td>
                                            <td class="text-right"><?php echo rupiah(558250); ?></td>
                                            <td class="text-right"><?php echo rupiah(576375); ?></td>
                                            <td class="text-right"><?php echo rupiah($income_deviden/4)?></td>
                                            <td class="text-right"><?php echo rupiah( $total = 558250 + 576375 + $income_deviden/4 )?></td>
                                        </tr>
                                        <?php 
                                                $total_deviden = $total_deviden + $total;
                                            } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <h5>
                                            <td colspan="4" class="text-right">Total Saldo Deviden</td>
                                            <td class="text-right"><?php echo rupiah($total_deviden)?></td>
                                        </h5>
                                        </tr>
                                    </tfoot>
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
<!-- 8327600 -->