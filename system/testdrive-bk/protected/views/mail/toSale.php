Dear <?php echo $name; ?>
<br /><br />
Thank you for your Online Payment.<br />
Your reservation details:<br /><br />
<table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tr>
        <td width="20%">Booking ID:</td>
        <td><?php echo $bookingID; ?></td>
    </tr>
    <tr>
        <td>Reservation ID:</td>
        <td><?php echo $reservationID; ?></td>
    </tr>
    <tr>
        <td>Itinerary Booked:</td>
        <td><?php echo $itinerary; ?></td>
    </tr>
    <tr>
        <td>Sailing Dates:</td>
        <td><?php echo $sailing; ?></td>
    </tr>
    <tr>
        <td>No. of Guests:</td>
        <td><?php echo $guest; ?></td>
    </tr>
    <tr>
        <td>Ship:</td>
        <td><?php echo $ship; ?></td>
    </tr>
    <tr>
        <td>Stateroom Category:</td>
        <td><?php echo $category; ?></td>
    </tr>
    <tr>
        <td>Promotion Code:</td>
        <td><?php echo $promotionCode; ?></td>
    </tr>
    <tr>
        <td>Total Payment:</td>
        <td><?php echo $total; ?></td>
    </tr>
</table><br />
<hr />
<table border="0" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th style="text-align: left;">Title</th>
        <th style="text-align: left;">First Name</th>
        <th style="text-align: left;">Last Name</th>
        <th style="text-align: left;">Cruise Fare
            <?php
            if (!empty($singleSupplement)) {
                echo '<br/>(including SingleSupplement)' . $singleSupplement;
            }
            ?>
        </th>
        <th style="text-align: left;">Taxes, Fees &amp; Port Expenses</th>
        <th style="text-align: left;">Discount</th>
        <th style="text-align: left;">Subtotal</th>
    </tr>
    <?php if (!empty($items)): ?>
        <?php foreach ($items as $item): ?>
            <tr>
                <td style="text-align: left;"><?php echo $item["title"] ?></td>
                <td style="text-align: left;"><?php echo $item["first_name"] ?></td>
                <td style="text-align: left;"><?php echo $item["last_name"] ?></td>
                <td style="text-align: left;"><?php echo $item["cruise"] ?></td>
                <td style="text-align: left;"><?php echo $item["tax"] ?></td>
                <td style="text-align: left;"><?php echo $item["discount"] ?></td>
                <td style="text-align: left;"><?php echo $item["subtotal"] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

</table>
<br />
Royal Caribbean