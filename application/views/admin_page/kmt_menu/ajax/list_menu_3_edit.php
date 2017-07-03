 <option value="0">Chọn danh mục cấp 3</option>
<?php
    foreach($menu_3 as $value){
?>
    <option <?php if($idMN_3_f == $value->idMN_3){echo 'selected="selected"';}?> value="<?=$value->idMN_3?>"><?=$value->Ten_vi?></option>
<?php }?>