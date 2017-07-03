<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>CẬP NHẬT PHẦN MỀM</h1>
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
                foreach($menu as $value){
                    $idMN_1 = $value->idMN_1;
                    $Ten_vi = $value->Ten_vi;
                    $Ten_en = $value->Ten_en;
                    $TomTat_vi = $value->TomTat_vi;
                    $TomTat_en = $value->TomTat_en;
                    $MoTa_vi = $value->MoTa_vi;
                    $MoTa_en = $value->MoTa_en;
                    $MaHinh = $value->MaHinh;
                    $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
                }
            ?>
            
            <form action="<?php echo base_url()?>admin_menu/update_menu_1" method="post">
                <input name="idMN_1" type="hidden" value="<?php echo $idMN_1?>"/>
                <input name="MaHinh" type="hidden" value="<?php echo $MaHinh?>"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right title_pro">Hình hiện tại:</td>
                        <td class="left">
                            <a href="<?php echo base_url($UrlHinh)?>" class="fancybox">
                                <img src="<?php echo base_url($UrlHinh)?>"height="60px"/>
                            </a>
                        </td> 
                    </tr>
                    <tr>
                        <td class="right">Chọn hình đại diện:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" value="<?php echo base_url($UrlHinh)?>" name="UrlHinh" type="text"/>
                            <input onclick="BrowseServer('Files:/phanmem/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
                        </td>
                    </tr>
                </table>
            
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
                                        <td class="right">Tên phần mềm:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?php echo $Ten_vi?>" name="Ten_vi" type="text" placeholder="Vui lòng điền tên phần mềm"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    
                                    <!-- Begin descript -->
                                    <tr><td class="center" colspan="2">Mô tả</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_vi" class="kmt_textarea" id="MoTa_vi"><?php echo $MoTa_vi?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Software name :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?php echo $Ten_en?>" name="Ten_en" type="text" placeholder="Please enter software name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->

                                    <!-- Begin descript -->
                                    <tr><td class="center" colspan="2">Description</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_en" class="kmt_textarea" id="MoTa_en"><?php echo $MoTa_en?></textarea>
                                            
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?php echo base_url()?>admin_menu/menu_1"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->