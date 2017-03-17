<?php include 'tracking_tag_transaction.php'; ?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: SLT 7 - Thank you page
URL of the webpage where the tag is expected to be placed: http://TBC
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=tk;cat=slt7-0;u1=<?php echo $_SESSION['captcha']['totalvalue'] ?>;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=tk;cat=slt7-0;u1=<?php echo $_SESSION['captcha']['totalvalue'] ?>;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<script type="text/javascript">
//         var lbTrans = <?php // echo $booking_item->booking_id ?>;
        var lbValue = <?php echo $_SESSION['captcha']['totalvalue'] ?>;
//         var lbData = '[Attribute/Value Pairs for Custom Data]';
    </script>

<div class="header">
    <ul>
        <li class="stepone"><span></span><?php echo Yii::t('booking', 'Cruise'); ?><div class="next"></div></li>
        <li class="steptwo"><span></span><?php echo Yii::t('booking', 'Information'); ?><div class="next"></div></li>
        <li class="stepthree"><span></span><?php echo Yii::t('booking', 'Review'); ?><div class="next"></div></li>
        <li class="stepfour current"><span></span><?php echo Yii::t('booking', 'Payment'); ?></li>
        <li class="clearboth"></li>
    </ul>
</div>

<div class="content thankyou-page">
    <div class="row title">
        <h1><?php echo Yii::t('booking', 'Thank you');?></h1>
        <hr />
    </div>
    <div class="row">
        <div class="thankyou-msg">
            <?php echo str_replace("{CODE}", $code ,Yii::t('booking',
            'Your Booking Reference Number is <span>{CODE}</span><br />
            Details of cruise document will be sent to you within the next two working days. <br />
            Meanwhile, you can plan your onboard agenda with various add-on package options. <br />
           Please visit our website <a href="mailto:sales@royalcaribbean.com.hk">www.royalcaribbean.com.hk</a> or should you have further questions, <br />
           please email us at <a href="mailto:sales@royalcaribbean.com.hk">sales@royalcaribbean.com.hk</a> <br />'));?>
        </div>
    </div>
</div>
