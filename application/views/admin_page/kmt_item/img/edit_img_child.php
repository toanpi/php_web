<?php
    foreach($type_img as $value_t){
        $Page = $value_t->Page;
        $MoTa = $value_t->MoTa;
        $Url = $value_t->Url;
    }
?>
    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">Cập nhật hình ảnh - <?=$title_type_img?></h1>
        <div id="kmt_admin_content">
            <?php
                foreach($img as $value_l){
                    $MaHinh = $value_l->MaHinh;
                    $idH = $value_l->idH;
                    $idLH = $value_l->idLH;
                    $idP = $value_l->idP;
                    $Link = $value_l->Link;
                    $TenHinh_vi = $value_l->TenHinh_vi;
                    $TenHinh_en = $value_l->TenHinh_en;
                    $MoTa_vi = $value_l->MoTa_vi;
                    $MoTa_en = $value_l->MoTa_en;
                    $UrlHinh = $value_l->UrlHinh;
                    
                }
            ?>
            <form action="<?=base_url()?>admin_item/update_img_child" method="post">
                <input name="idH" value="<?=$idH?>" type="hidden"/>
                <input name="idLH" value="<?=$idLH?>" type="hidden"/>
                <input name="MaHinh" value="<?=$MaHinh?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right title_pro">Hình hiện tại:</td>
                        <td class="left kmt_img_ad">
                            <a href="<?=base_url($UrlHinh)?>" class="fancybox">
                                <img src="<?=base_url($UrlHinh)?>" height="70px"/>
                            </a>
                        </td> 
                    </tr>
                    <tr>
                        <td class="right">Chọn một hình:</td>
                        <td class="left">
                            <input class="kmt_textinput" value="<?=$UrlHinh?>" id="imageP" name="UrlHinh" type="text" required="required"/>
                            <input onclick="BrowseServer('Files:/screenshots/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình"/>
                        </td>
                    </tr>
                    
                    <?php
                        if($Page == 1 ){
                    ?>
                    <tr>
                        <td class="right">Thuộc trang:</td>
                        <td class="left">
                            <select name="idP">
                                <option value="0" selected="selected">Không thu?c riêng trang nào</option>
                                <?php
                                    foreach($list_page as $value_p){
                                ?>
                                <option <?php if($idP == $value_p->idMN_1){echo 'selected="selected"';}?> value="<?=$value_p->idMN_1?>"><?=$value_p->Ten_vi?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <?php }?>
                    
                    <?php
                        if($Url == 1 ){
                    ?>
                    <tr>
                        <td class="right">Link:</td>
                        <td class="left">
                            <input class="kmt_textinput" value="<?=$Link?>" name="Link" type="text" placeholder="Please enter a path format http://"/>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            
                <!-- Begin kmt_admin_tablink-->
                <div class="kmt_admin_tablink">
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                                <a href="<?=base_url()?>admin_item/img_child/<?=$MaHinh?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->