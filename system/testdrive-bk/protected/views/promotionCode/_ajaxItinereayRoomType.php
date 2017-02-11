<?php
//CVarDumper::dump($promotionCodeModels, 10, true);
//exit();
?>
<b>Stateroom Cat.</b>
<ul>
    <?php
    foreach ($itineraryRoomTypeModels as $key => $itineraryRoomTypeModel) {
        ?>
        <li>
            <input type="hidden" name="Others[room_model][<?php echo $itineraryRoomTypeModel['rt']->sys_rt_id; ?>]" value="0" />
            <input id="RoomTypes_<?php echo $key ?>" value="1" <?php
                   if (in_array($itineraryRoomTypeModel->rt_id, $promotionCodeModels)) {
                       echo 'checked';
                   }
                   ?> type="checkbox" name="Others[room_model][<?php echo $itineraryRoomTypeModel['rt']->sys_rt_id; ?>]">
            <label for="RoomTypes_<?php echo $key ?>"><?php echo $itineraryRoomTypeModel['rt']->rt_id . ': ' . $itineraryRoomTypeModel['rt']->rt_name; ?></label>
        </li>
        <?php
    }
    ?>
</ul>