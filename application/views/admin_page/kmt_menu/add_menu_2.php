<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>THÊM MỚI DANH MỤC CẤP 2</h1>
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
            
            <form action="<?=base_url()?>admin_menu/save_menu_2" method="post">
                
                <table class="kmt_admin_addarticles">
                    <tr class="kmt_hidden">
                        <td class="right">Chọn hình đại diện:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text"/>
                            <input onclick="BrowseServer('Files:/danhmuc/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Danh mục cấp 1:</td>
                        <td class="left">
                            <select name="idMN_1">
                            <?php 
                                foreach($menu_1 as $value_mn){
                            ?>
                                <option value="<?=$value_mn->idMN_1?>"><?=$value_mn->Ten_vi?></option>
                            <?php }?>
                            </select>
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
                                        <td class="right">Tên danh mục:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="Ten_vi" type="text" placeholder="Vui lòng điền tên danh mục"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr class="kmt_hidden">
                                        <td class="right">Trích dẫn:</td>
                                        <td class="left">
                                            <textarea name="TomTat_vi" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                    <!-- Begin content -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Mô tả</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="MoTa_vi" id="MoTa_vi"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'MoTa_vi',{
                                           	        height : '250px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?=base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?=base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});
                                                		
                                            </script>
                                        </td>
                                    </tr>
                                    <!-- End content -->
                                    
                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Menu name :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="Ten_en" type="text" placeholder="Please enter menu name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr class="kmt_hidden">
                                        <td class="right">Quote:</td>
                                        <td class="left">
                                            <textarea name="TomTat_en" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                    <!-- Begin content -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Description</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="MoTa_en" id="MoTa_en"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'MoTa_en',{
                                       	            height : '250px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?=base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?=base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});		
                                                
                                            </script>
                                        </td>
                                    </tr>
                                    <!-- End content -->
                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới danh mục"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_menu/menu_2"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->