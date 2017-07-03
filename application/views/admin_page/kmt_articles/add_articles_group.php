<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>THÊM MỚI 
            <?php
                if($idP==3){
                    echo ' Loại lớp học';
                }elsE{
                    echo ' Khu vực học';
                }
            ?>
        </h1>
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
            
            <form action="<?=base_url()?>admin_articles/save_articles_group" method="post">
                <input type="hidden" name="idP" value="<?php echo $idP?>"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">Chọn hình đại diện:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text"/>
                            <input onclick="BrowseServer('Files:/baiviet/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
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
                                        <td class="right">Tên:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="TenNhom_vi" type="text" placeholder="Vui lòng điền tên"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr>
                                        <td class="right">Ghi chú:</td>
                                        <td class="left">
                                            <textarea name="TomTat_vi" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                    <!-- Begin content -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Nội dung</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="NoiDung_vi" id="NoiDung_vi"></textarea>
                                            <script type="text/javascript">
                                                /*
                                               	var editor = CKEDITOR.replace( 'NoiDung_vi',{
                                           	        height : '250px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?=base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?=base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});
                                                */		
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
                                        <td class="right">Group name :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="TenNhom_en" type="text" placeholder="Please enter group name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr>
                                        <td class="right">Note:</td>
                                        <td class="left">
                                            <textarea name="TomTat_en" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                    <!-- Begin content -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Content</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="NoiDung_en" id="NoiDung_en"></textarea>
                                            <script type="text/javascript">
                                                /*
                                               	var editor = CKEDITOR.replace( 'NoiDung_en',{
                                       	            height : '250px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?=base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?=base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});		
                                                */
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
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_articles/articles_group/<?php echo $idP?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->