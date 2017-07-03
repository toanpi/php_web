 <option value="0">Chọn danh mục cấp 2</option>
<?php
    foreach($menu_2 as $value){
?>
    <option <?php if($idMN_2_f == $value->idMN_2){echo 'selected="selected"';}?> value="<?=$value->idMN_2?>"><?=$value->Ten_vi?></option>
<?php }?>