<?php
    foreach($type_img as $value_t){
        $Page = $value_t->Page;
        $MoTa = $value_t->MoTa;
        $Url = $value_t->Url;
    }
?>
    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">Thêm hình - <?=$title_type_img?></h1>
        <div id="kmt_admin_content">
            
            <form action="<?=base_url()?>admin_item/save_img_child" method="post">
                <input name="idLH" value="<?=$idLH?>" type="hidden"/>
                <input name="MaHinh" value="<?=$MaHinh?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">Chọn hình ảnh:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text" required="required"/>
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
                                <option value="0" selected="selected">Không thuộc riêng trang nào</option>
                                <?php
                                    foreach($list_page as $value_p){
                                ?>
                                <option value="<?=$value_p->idMN_1?>"><?=$value_p->Ten_vi?></option>
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
                            <input class="kmt_textinput" name="Link" type="text" placeholder="Please enter a path format http://"/>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            
                <!-- Begin kmt_admin_tablink-->
                <div class="kmt_admin_tablink">
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới"/>
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