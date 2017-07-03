<?php    
    $arr = array();
    $arr_mn2 = array();
    foreach($menu_1 as $value_mn1){
        $arr[] = $value_mn1->idMN_1;
    }
    foreach($menu_2 as $value_mn2){
        $arr_mn2[] = $value_mn2->idMN_2;
    }
    $idMN_1_aj = reset($arr);
    $idMN_2_aj = reset($arr_mn2);
?>

<script>

        /*
        $.post('<?php echo base_url()?>admin_menu/list_menu_2/'+<?php echo $idMN_1_aj?>, {}, function(data){
            $('#idMN_2').html(data);
        });
        
        $(document).on('change','#idMN_1',function(){
            idMN_1 = $(this).val();
            $.post('<?php echo base_url()?>admin_menu/list_menu_2/'+idMN_1, {}, function(data){
            $('#idMN_2').html(data);
            });
        });
        
        
        
        $.post('<?php echo base_url()?>admin_menu/list_menu_3/'+<?php echo $idMN_1_aj?>+'/'+<?php echo $idMN_2_aj?>, {}, function(data){
            $('#idMN_3').html(data);
        });
        
        $(document).on('change','#idMN_2',function(){
            idMN_1 = $('#idMN_1').val();
            idMN_2 = $(this).val();
            $.post('<?php echo base_url()?>admin_menu/list_menu_3/'+idMN_1+'/'+idMN_2, {}, function(data){
            $('#idMN_3').html(data);
            });
        });  
        
        */    
</script>
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>THÊM MỚI phiên bản</h1>
        <div id="kmt_admin_content">
            <a href="#end_p">
                <input style="width: 100px;padding: 2px;margin-bottom: 5px;" type="button" value="Về cuối trang"/>
            </a>
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
            
            <form action="<?php echo base_url()?>admin_item/save_item" method="post">
                <table class="kmt_admin_addarticles">
                    <tr class="kmt_hidden">
                        <td class="right">Chọn hình đại diện:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text"/>
                            <input onclick="BrowseServer('Files:/duan/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Thuộc phần mềm:</td>
                        <td class="left">
                            <select name="idMN_1" id="idMN_1">
                            <?php 
                                foreach($menu_1 as $value_mn){
                            ?>
                                <option value="<?php echo $value_mn->idMN_1?>"><?php echo $value_mn->Ten_vi?></option>
                            <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr class="kmt_hidden">
                        <td class="right">Danh mục cấp 2:</td>
                        <td class="left">
                            <select name="idMN_2" id="idMN_2"></select>
                        </td>
                    </tr>
                    
                    <tr class="kmt_hidden">
                        <td class="right">Danh mục cấp 3:</td>
                        <td class="left">
                            <select name="idMN_3" id="idMN_3"></select>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td class="right">Mã phiên bản:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="MaSo" type="text" placeholder="Vui lòng điền mã" required="required"/>
                        </td>
                    </tr>
                    <tr class="kmt_hidden">
                        <td class="right">Giá dự án:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="DonGia" type="text" value="0"/>
                        </td>
                    </tr>
                    <tr class="kmt_hidden">
                        <td class="right">Giá khuyến mãi:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="DonGiaKM" type="text" value="0"/>
                        </td>
                    </tr>
                    <tr class="kmt_hidden">
                        <td class="right">Thương hiệu:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="ThuongHieu" type="text" placeholder="Nhập thương hiệu nếu có"/>
                        </td>
                    </tr>
                    
                    
                    <tr class="kmt_hidden">
                        <td class="right">Khối lượng:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="KichThuoc" type="text" placeholder="Nhập khối lượng nếu có"/>
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
                                        <td class="right">Tên phiên bản:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="Ten_vi" type="text" placeholder="Vui lòng điền tên phiên bản"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin quote -->
                                    <tr><td class="center" colspan="2">Trích dẫn</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="TomTat_vi" id="TomTat_vi" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    
                                    <!-- Begin content -->
                                    <tr><td class="center" colspan="2">Mô tả</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_vi" id="MoTa_vi"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'MoTa_vi',{
                                           	        height : '450px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?php echo base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?php echo base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});
                                                		
                                            </script>
                                        </td>
                                    </tr>
                                    <!-- End content -->
                                    
                                    
                                    
                                    <!-- Begin tag -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Thẻ từ khóa</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="Tag_vi" id="Tag_vi"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'Tag_vi',{
                                           	        height : '100px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?php echo base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?php echo base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});
                                                		
                                            </script>
                                        </td>
                                    </tr>
                                    <!-- End tag -->
                                    
                                    <!-- Begin tittle -->
                                    <tr>
                                        <td class="right">Seo title:</td>
                                        <td class="left"><input name="Seo_title_vi" class="kmt_textinput" type="text"/></td>
                                    </tr>
                                    <!-- End tittle -->
                                    
                                    
                                    <!-- Begin description -->
                                    <tr>
                                        <td class="right">Seo description:</td>
                                        <td class="left">
                                            <textarea name="Seo_description_vi" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End description -->
                                    
                                    <!-- Begin keyword -->
                                    <tr>
                                        <td class="right">Seo keyword:</td>
                                        <td class="left">
                                            <textarea name="Seo_keyword_vi" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End keyword -->
                                    
                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Version name :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="Ten_en" type="text" placeholder="Please enter version name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    
                                    
                                    <!-- Begin quote -->
                                    <tr><td class="center" colspan="2">Quote</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="TomTat_en" id="TomTat_en" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    
                                    <!-- Begin content -->
                                    <tr><td class="center" colspan="2">Description</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_en" id="MoTa_en"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'MoTa_en',{
                                           	        height : '450px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?php echo base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?php echo base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});
                                                		
                                            </script>
                                        </td>
                                    </tr>
                                    <!-- End content -->
                                    
                                    
                                    
                                    <!-- Begin tag -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Tag</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="Tag_en" id="Tag_en"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'Tag_en',{
                                       	            height : '150px',
                                              		uiColor : '#C4C4C4',
                                              		language:'vi',
                                              		skin:'moono1',
                                              		filebrowserImageBrowseUrl : '<?php echo base_url()?>public/admin/ckfinder/ckfinder.html?Type=Files',
                                              		filebrowserImageUploadUrl : '<?php echo base_url()?>public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',					
                                        	      	toolbar:'Full'
                                               	});		
                                                
                                            </script>
                                        </td>
                                    </tr>
                                    <!-- End tag -->
                                    
                                    <!-- Begin tittle -->
                                    <tr>
                                        <td class="right">Seo title:</td>
                                        <td class="left"><input name="Seo_title_en" class="kmt_textinput" type="text"/></td>
                                    </tr>
                                    <!-- End tittle -->
                                    
                                    
                                    <!-- Begin description -->
                                    <tr>
                                        <td class="right">Seo description:</td>
                                        <td class="left">
                                            <textarea name="Seo_description_en" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End description -->
                                    
                                    <!-- Begin keyword -->
                                    <tr>
                                        <td class="right">Seo keyword:</td>
                                        <td class="left">
                                            <textarea name="Seo_keyword_en" class="kmt_textarea"></textarea>
                                        </td>
                                    </tr>
                                    <!-- End keyword -->
                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles" id="end_p">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                                <a href="<?php echo base_url()?>admin_item/item">
                                    <input type="button" class="kmt_buttoninput" value="Quay lại"/>
                                </a>
                                <a href="#kmt_admin_content">
                                    <input style="width: 100px;" class="kmt_buttoninput" type="button" value="Lên đầu trang"/>
                                </a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->