<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>THÊM MỚI PHẦN MỀM</h1>
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
            
            <form action="<?=base_url()?>admin_menu/save_menu_1" method="post">

            
                <!-- Begin kmt_admin_tablink-->
                <div class="kmt_admin_tablink">
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td class="right">Chọn hình đại diện:</td>
                            <td class="left">
                                <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text"/>
                                <input onclick="BrowseServer('Files:/phanmem/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
                            </td>
                        </tr>
                       
                    </table>
                    
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
                                            <input class="kmt_textinput" name="Ten_vi" type="text" placeholder="Vui lòng điền tên phần mềm"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr><td class="center" colspan="2">Mô tả</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_vi" class="kmt_textarea" id="MoTa_vi"></textarea>
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
                                            <input class="kmt_textinput" name="Ten_en" type="text" placeholder="Please enter software name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    
                                    <!-- Begin descript -->
                                    <tr><td class="center" colspan="2">Description</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_en" class="kmt_textarea" id="MoTa_en"></textarea>
                                            
                                        </td>
                                    </tr>
                                    <!-- End descript -->

                                </table>
                            </div>
                            
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_menu/menu_1"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->