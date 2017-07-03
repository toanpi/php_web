<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>CẬP NHẬT LOẠI THUỐC</h1>
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
                foreach($menu_lt as $value){
                    $idL = $value->idL;
                    $Ten_vi = $value->Ten_vi;
                    $Ten_en = $value->Ten_en;
                    $MaHinh = $value->MaHinh;
                    $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
                }
            ?>
            
            <form action="<?=base_url()?>admin_menu/update_menu_lt" method="post">
                <input name="idL" type="hidden" value="<?=$idL?>"/>
                <input name="MaHinh" type="hidden" value="<?=$MaHinh?>"/>
                
            
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
                                        <td class="right">Tên loại thuốc:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?=$Ten_vi?>" name="Ten_vi" type="text" placeholder="Vui lòng điền tên loại"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    
                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Type name :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?=$Ten_en?>" name="Ten_en" type="text" placeholder="Please enter the type"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->

                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật danh mục"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_menu/menu_lt"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->