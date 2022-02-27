<?php
include("authentication.php");
include("includes/header.php");

?>
<style>
	.on-print{
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr,td,th{
			border:1px solid black;
		}
	</style>
</noscript>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
                    <div class="row">
						<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>
					<div id="report">
					<div class="on-print">
						 <p><center>Rental Balances Report</center></p>
						 <p><center>As of <b><?php echo date('F ,Y') ?></b></center></p>
					</div>
                    <div class="row">
							<table id="myDataTable" class="table table-bordered table-stripe">
								<thead>
									<tr>
										<th>#</th>
										<th>Tenant</th>
										<th>House Address</th>
										<th>Monthly Rate</th>
										<th>Payable Months</th>
										<th>Payable Amount</th>
										<th>Paid</th>
										<th>Outstanding Balance</th>
										<th>Last Payment</th>
									</tr>
								</thead>
								<tbody>
                                    <?php 
									$i = 1;
									// $tamount = 0;
									$tenants = mysqli_query("SELECT u.*,concat(u.fname,', ',u.lname) as name,h.house_address,
                                                            h.house_price, b.bill_total, b.due_date, p.payment_total, p.payment_date,
                                                            FROM users u
                                                            INNER JOIN tenant t ON u.id = t.users_id
                                                            INNER JOIN house h ON t.house_id = h.house_id
                                                            INNER JOIN bills b ON b.tenant_id = t.tenant_id
                                                            INNER JOIN payments p ON p.bill_id = b.bill_id
                                                            WHERE t.tenant_status != 2 AND ");
                                    $tenants_run = mysqli_query($con,$tenants);
									$i = 1;
                                            
                                    if(mysqli_num_rows($tenants_run) > 0 ):       
                                        while($row=$tenants_run->fetch_assoc()):
                                            $months = abs(strtotime(date('Y-m-d')." 23:59:59") - strtotime($row['due_date']." 23:59:59"));
                                            $months = floor(($months) / (30*60*60*24));
                                            $payable = $row['bill_total'] * $months;
                                            $paid = mysqli_query("SELECT SUM(payment_total) as paid FROM payments where tenant_id =".$row['id']);
											$paid_run = mysqli_query($con,$paid);
                                            $last_payment = mysqli_query("SELECT * FROM payments where tenant_id =".$row['id']." order by unix_timestamp(date_created) desc limit 1");
											$payment_run = mysqli_query($con,$tenants);
                                            $paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
                                            $last_payment = $last_payment->num_rows > 0 ? date("M d, Y",strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
                                            $outstanding = $payable - $paid;
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo ucwords($row['name']) ?></td>
                                                <td><?php echo $row['house_no'] ?></td>
                                                <td class="text-right"><?php echo number_format($row['price'],2) ?></td>
                                                <td class="text-right"><?php echo $months.' mo/s' ?></td>
                                                <td class="text-right"><?php echo number_format($payable,2) ?></td>
                                                <td class="text-right"><?php echo number_format($paid,2) ?></td>
                                                <td class="text-right"><?php echo number_format($outstanding,2) ?></td>
                                                <td><?php echo date('M d,Y',strtotime($last_payment)) ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <th colspan="9"><center>No Data.</center></th>
                                            </tr>
                                        <?php endif; ?>
								    </tbody>
							    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php

include("includes/footer.php");
include("includes/scripts.php");

?>