        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <a href="<?php echo base_url('income/add')?>" class="btn btn-warning">New Income</a>
                                <h4 class="pull-right">Rp <?php echo $grand_total;?></h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Date</th>
                                    	<th>Description</th>
                                        <th>Category</th>
                                    	<th>PIC</th>
                                    	<th>Total</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($transactions as $transaction) { ?>
                                        <tr>
                                        	<td><?php echo $no;?></td>
                                        	<td><?php echo date("d-m-Y", strtotime($transaction['date']))?></td>
                                        	<td><?php echo $transaction['description']?></td>
                                            <td><?php echo ($transaction['category_id'] == '1') ? 'Income' : 'Operasional'?></td>
                                        	<td><?php echo $transaction['member_name']?></td>
                                        	<td><?php echo $transaction['total']?></td>
                                        </tr>
                                        <?php $no++;
                                                } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

