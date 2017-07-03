<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>CẬP NHẬT ALBUM</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($stt != null){
                                echo 'Vui lòng nhập đầy đủ các trường ngôn ngữ!';
                            }
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            <?php
                foreach($album as $value_l){
                    $idAB = $value_l->idAB;
                    $Ten_album_vi = $value_l->Ten_album_vi;
                    $Ten_album_en = $value_l->Ten_album_en;
                }
            ?>
            <form action="<?=base_url()?>admin_img/update_album" method="post">
                
                <input name="idAB" value="<?=$idAB?>" type="hidden"/>
                <!-- Begin kmt_admin_tablink-->
                <div class="kmt_admin_tablink">
    
                    <ul class="tabs-menu">
                        <li class="current"><a href="#tab-1">VI</a></li>
                        <li><a href="#tab-2">EN</a></li>
                    </ul>
                    <div class="tab">
                            <div id="tab-1" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Tên album:</td>
                                        <td class="left">
                                            <input value="<?=$Ten_album_vi?>" class="kmt_textinput" name="Ten_album_vi" type="text" placeholder="Vui lòng điền tên album" required="required"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Album name :</td>
                                        <td class="left">
                                            <input value="<?=$Ten_album_en?>" class="kmt_textinput" name="Ten_album_en" type="text" placeholder="Please enter album name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->

                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật abum"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_img/album"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->