        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <a href="<?php echo base_url('income/add')?>" class="btn btn-warning">Export to PDF</a>
                                <h4 class="pull-right"><?php echo rupiah($grand_total);?></h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="table-transaction">
                                    <thead>
                                        <th>#</th>
                                    	<th>Date</th>
                                    	<th>Description</th>
                                    	<th>PIC</th>
                                    	<th>Debit</th>
                                        <th>Credit</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($transactions as $transaction) { ?>
                                        <tr>
                                        	<td><?php echo $no;?></td>
                                        	<td><?php echo date("d-m-Y", strtotime($transaction['date']))?></td>
                                        	<td><?php echo $transaction['description']?></td>
                                        	<td><?php echo $transaction['member_name']?></td>
                                        	<td><?php echo ($transaction['category_id'] == 0) ? $transaction['total'] : '' ?></td>
                                            <td><?php echo ($transaction['category_id'] == 1) ? $transaction['total'] : '' ?></td>
                                        </tr>
                                        <?php $no++;
                                                } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

        <!--page specific css styles and js-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/assets/data-tables/bootstrap3/dataTables.bootstrap.css" />
        <script type="text/javascript" src="<?php echo base_url('assets')?>/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets')?>/assets/data-tables/bootstrap3/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
                $(document).ready( function() {
                    $('#table-transaction').dataTable( {
                        "aoColumnDefs": [
                          { "bSortable": true, "aTargets": [ 5 ] }
                        ] } );
                });
        </script>