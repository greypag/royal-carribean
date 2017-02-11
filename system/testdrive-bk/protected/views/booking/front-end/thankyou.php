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
