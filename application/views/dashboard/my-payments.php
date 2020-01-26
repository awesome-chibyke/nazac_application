<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 boder_p">
				<div class="dashCard borderTop">
						<span class="lefDashCard2">
							<img src="<?php print base_url();?>resource/img/card-in-use.png" width="100px" height="100px" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
						</span>
						<span class="dashWrite"> My Payments History</span>
				 </div>
			  
			<div class="table-responsive boder_p">
			<table id="myTable" style=" font-size: 12px; width: 100% !important;" class="table table-striped table-bordered">
				<thead>
			  		<tr>
			  			<th>S/N</th>
			  			<th>Transaction ID</th>
			  			<th>Status</th>
			  			<th>Payment Method</th>
			  			<th>Payment Type</th>
			  			<th>Amount Paid</th>
			  			<th>Balance</th>
			  			<th>Duration</th>
			  			<th>Date</th>
			  			<th>Last Update</th>
			  			<th>Receipt</th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  	<?php if($all_rented!=0){
				for($i=0;$i<count($all_rented);$i++){
					if($all_rented[$i]['nazac_renting_payment_status']=='confirmed'){
						$print = '<a href="'.base_url().'users/member/generate-receipt/'.$all_rented[$i]['nazac_renting_id'].'">Print</a>';
					}else{
						$print = '<span class="text-success">Processing...</span>';
					}
					?>
			  		<tr>
			  			<td><?php print $i+1;?></td>
			  			<td><?php print $all_rented[$i]['nazac_renting_id'];?></td>
			  			<td><?php print $all_rented[$i]['nazac_renting_payment_status'];?></td>
			  			<td><?php print $all_rented[$i]['nazac_renting_payment_type'];?></td>
			  			<td><?php print $all_rented[$i]['new_renewal_payment_type'];?></td>
			  			<td><?php print number_format($all_rented[$i]['nazac_renting_amount_paid']);?></td>
			  			<td><?php print number_format($all_rented[$i]['nazac_renting_actual_amount_to_pay']-$all_rented[$i]['nazac_renting_amount_paid']);?></td>
			  			<td><?php print $all_rented[$i]['nazac_renting_duration'];?></td>
			  			<td><?php print $all_rented[$i]['nazac_renting_payment_date'];?></td>
			  			<td><?php print $all_rented[$i]['nazac_renting_date_updated'];?></td>
			  			<td><?php print $print;?></td>
			  		</tr>
			  		<?php }}else{ print '<tr><td colspan="9"><h2>No Payment history for your search category was found.</h2></td></tr>';}?>
			  	</tbody>
			</table>
		   </div>
		</div>
	  </div>
	</div>
</section>