Dear <?php echo $name;?>
<br /><br />
Thank you for your Online Payment.<br />
Your reservation details:<br /><br />
<table border="0" cellpadding="0" cellspacing="10" width="100%">
	<tr>
		<td width="20%">Booking ID:</td>
		<td><?php echo $bookingID;?></td>
	</tr>
	<tr>
		<td>Reservation ID:</td>
		<td><?php echo $reservationID;?></td>
	</tr>
	<tr>
		<td>No. of Guests:</td>
		<td><?php echo $guest;?></td>
	</tr>
	<tr>
		<td>Promotion Code:</td>
		<td><?php echo $promotionCode;?></td>
	</tr>
	<tr>
		<td>Total Payment:</td>
		<td><?php echo $total;?></td>
	</tr>
</table><br />
<hr />
<table border="0" cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th style="text-align: left;">Promotion Name</th>
		<th style="text-align: left;">Title</th>
		<th style="text-align: left;">First Name</th>
		<th style="text-align: left;">Cruise Fare</th>
		<th style="text-align: left;">Taxes, Fees & Port Expenses</th>
		<th style="text-align: left;">Discount</th>
		<th style="text-align: left;">Subtotal</th>
	</tr>
	<?php if(!empty($items)):?>
		<?php foreach($items as $item):?>
			<tr>
				<td style="text-align: left;"><?php echo $item["promotion"]?></td>
				<td style="text-align: left;"><?php echo $item["title"]?></td>
				<td style="text-align: left;"><?php echo $item["name"]?></td>
				<td style="text-align: left;"><?php echo $item["cruise"]?></td>
				<td style="text-align: left;"><?php echo $item["tax"]?></td>
				<td style="text-align: left;"><?php echo $item["discount"]?></td>
				<td style="text-align: left;"><?php echo $item["subtotal"]?></td>
			</tr>
		<?php endforeach;?>
	<?php endif;?>
	
</table>
<br />
Royal Caribbean