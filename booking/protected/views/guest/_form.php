<div class="form">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'guest-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <table>
        <tbody>

            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'irt_id'); ?>
                    <?php echo CHtml::link($model->irt_id, Yii::app()->createUrl("itineraryRoomType/view", array("id" => $model->irt_id))); ?>
                    <?php //echo $form->textField($model, 'irt_id', array('maxlength' => 20, 'readonly' => true)); ?>
                    <?php //echo $form->dropDownList($model, 'irt_id', GxHtml::listDataEx(ItineraryRoomType::model()->findAllAttributes(null, true))); ?>
                    <?php echo $form->error($model, 'irt_id'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'booking_id'); ?>
                    <?php echo CHtml::link($model->booking_id, Yii::app()->createUrl("booking/view", array("id" => $model->booking_id))); ?>
                    <?php //echo $form->textField($model, 'booking_id', array('maxlength' => 20, 'readonly' => true)); ?>
                    <?php //echo $form->dropDownList($model, 'booking_id', GxHtml::listDataEx(Booking::model()->findAllAttributes(null, true))); ?>
                    <?php echo $form->error($model, 'booking_id'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'promotion_id'); ?>
                    <?php //echo $form->textField($model, 'irt_id', array('maxlength' => 32, 'readonly' => true)); ?>
                    <?php echo CHtml::link($model->promotion_id, Yii::app()->createUrl("promotionCode/view", array("id" => $model->promotion_id))); ?>
                    <?php //echo $form->dropDownList($model, 'promotion_id', GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)), array('readonly' => true)); ?>
                    <?php echo $form->error($model, 'promotion_id'); ?>
                </td>
                <td>
                    <?php // echo $form->labelEx($model, 'assigned_room_id'); ?>
                    <?php //echo CHtml::link($model->assigned_room_id, Yii::app()->createUrl("roomInventory/view", array("id" => $model->assigned_room_id))); ?>
                    <?php //echo $form->error($model, 'assigned_room_id'); ?>
                </td>
            </tr>

            <tr>
                <td colspan="4"><br/></td>
            </tr>

            <tr>
                <td>
                    <b><?php echo $form->labelEx($model, 'assigned_room_id'); ?></b>
                    <?php echo CHtml::link($model->assigned_room_id, Yii::app()->createUrl("roomInventory/view", array("id" => $model->assigned_room_id))); ?>
                </td>
                <td style="display:none;">
                    <b><?php echo RoomType::model()->getAttributeLabel('rt_id'); ?></b><br/>
                    <?php echo $itineraryRoomType_Model['rt']->rt_id; ?>
                </td>
                <td>
                    <b><?php echo RoomType::model()->getAttributeLabel('rt_name'); ?></b><br/>
                    <?php echo CHtml::link($itineraryRoomType_Model['rt']->rt_name, Yii::app()->createUrl("roomType/view", array("id" => $itineraryRoomType_Model['rt']->sys_rt_id))); ?>
                </td>
            </tr>


            <tr>
                <td colspan="4"><br/><hr/></td>
            </tr>


            <tr>
                <td colspan="4"><h3>Personal Details:</h3></td>
            </tr>

            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'title'); ?>
                    <?php
                    echo $form->DropDownList($model, 'title', array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Miss'), array(
                        'style' => 'width:60px'));
                    ?>
                    <?php echo $form->error($model, 'title'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'gender'); ?>
                    <?php
                    echo $form->DropDownList($model, 'gender', array('M' => 'M', 'F' => 'F'), array(
                        'style' => 'width:60px'));
                    ?>
                    <?php echo $form->error($model, 'gender'); ?>
                </td>

                <td>
                    <?php echo $form->labelEx($model, 'citizenship'); ?>

                    <?php
                    echo $form->DropDownList($model, 'citizenship', array('China' => 'China', 'USA' => 'USA'), array(
                        'style' => 'width:60px'));
                    ?>
                    <?php echo $form->error($model, 'citizenship'); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'first_name'); ?>
                    <?php echo $form->textField($model, 'first_name', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'first_name'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'middle_name'); ?>
                    <?php echo $form->textField($model, 'middle_name', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'middle_name'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'last_name'); ?>
                    <?php echo $form->textField($model, 'last_name', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'last_name'); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'date_of_birth'); ?>
                    <?php
                    //echo $form->textField($model, 'date_of_birth'); 
                    if ($model->date_of_birth === false)
                        $model->date_of_birth = '';

                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'date_of_birth',
                        'options' => array(
                            'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'date_of_birth'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'phone_no'); ?>
                    <?php echo $form->textField($model, 'phone_no'); ?>
                    <?php echo $form->error($model, 'phone_no'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('maxlength' => 64)); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </td>
            </tr>

			<!--
            <tr>
                <td>
                    <?php //echo $form->labelEx($model, 'document_type'); ?>
                    <?php //echo $form->textField($model, 'document_type', array('maxlength' => 32)); ?>
                    <?php //echo $form->error($model, 'document_type'); ?>
                </td>
                <td>
                    <?php //echo $form->labelEx($model, 'document_number'); ?>
                    <?php //echo $form->textField($model, 'document_number', array('maxlength' => 32)); ?>
                    <?php //echo $form->error($model, 'document_number'); ?>
                </td>
            </tr>
			-->
            <tr>
                <td colspan="4"><br/><hr/></td>
            </tr>
            <tr>
                <td colspan="4"><h3>Charge Details:</h3></td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'cruise_fare'); ?>
                    <?php echo $form->textField($model, 'cruise_fare', array('readonly' => true)); ?>
                    <?php echo $form->error($model, 'cruise_fare'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'subtotal'); ?>
                    <?php echo $form->textField($model, 'subtotal', array('readonly' => true)); ?>
                    <?php echo $form->error($model, 'subtotal'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'tax_fees_port'); ?>
                    <?php echo $form->textField($model, 'tax_fees_port', array('readonly' => true)); ?>
                    <?php echo $form->error($model, 'tax_fees_port'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'discount'); ?>
                    <?php echo $form->textField($model, 'discount', array('readonly' => true)); ?>
                    <?php echo $form->error($model, 'discount'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"><br/><hr/></td>
            </tr>
        </tbody>
    </table>



    <h3>Others:</h3>

    <div class="row">
        <?php //echo $form->labelEx($model, 'status');    ?>
        <?php //echo $form->textField($model, 'status', array('maxlength' => 11));   ?>
        <?php //echo $form->error($model, 'status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'rc_global_guest_id'); ?>
        <?php echo $form->textField($model, 'rc_global_guest_id', array('maxlength' => 11)); ?>
        <?php echo $form->error($model, 'rc_global_guest_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'allow_personalData'); ?>
        <?php //echo $form->textField($model, 'allow_personalData', array('maxlength' => 11, 'readonly' => true)); ?>
        <?php //echo $form->error($model, 'allow_personalData'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'internal_notes'); ?>
        <?php
        Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'internal_notes');
        ?>
        <?php echo $form->error($model, 'internal_notes'); ?>
    </div><!-- row -->

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->