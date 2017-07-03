<script>
        $.post('<?=base_url()?>admin_menu/list_menu_2_edit/'+<?=$idMN_1_c?>+'/'+<?=$idMN_2_c?>, {}, function(data){
            $('#idMN_2').html(data);
        });
        
        $(document).on('change','#idMN_1',function(){
            idMN_1 = $(this).val();
            $.post('<?=base_url()?>admin_menu/list_menu_2/'+idMN_1, {}, function(data){
            $('#idMN_2').html(data);
            });
        });      
</script>

<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>CẬP NHẬT DANH MỤC CẤP 3</h1>
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
                    $idMN_3 = $value->idMN_3;
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
            
            <form action="<?=base_url()?>admin_menu/update_menu_3" method="post">
                <input name="idMN_3" type="hidden" value="<?=$idMN_3?>"/>
                <input name="MaHinh" type="hidden" value="<?=$MaHinh?>"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right title_pro">Hình hiện tại:</td>
                        <td class="left">
                            <a href="<?=$UrlHinh?>" class="fancybox">
                                <img src="<?=$UrlHinh?>"height="60px"/>
                            </a>
                        </td> 
                    </tr>
                    <tr>
                        <td class="right">Chọn hình đại diện:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" value="<?=$UrlHinh?>" name="UrlHinh" type="text"/>
                            <input onclick="BrowseServer('Files:/danhmuc/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Danh mục cấp 1:</td>
                        <td class="left">
                            <select name="idMN_1" id="idMN_1">
                            <?php 
                                foreach($menu_1 as $value_mn){
                            ?>
                                <option <?php if($idMN_1 == $value_mn->idMN_1){echo 'selected="selected"';}?> value="<?=$value_mn->idMN_1?>"><?=$value_mn->Ten_vi?></option>
                            <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Danh mục cấp 2:</td>
                        <td class="left">
                            <select name="idMN_2" id="idMN_2"></select>
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
                                            <input class="kmt_textinput" value="<?=$Ten_vi?>" name="Ten_vi" type="text" placeholder="Vui lòng điền tên danh mục"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr class="kmt_hidden">
                                        <td class="right">Trích dẫn:</td>
                                        <td class="left">
                                            <textarea name="TomTat_vi" class="kmt_textarea"><?=$TomTat_vi?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                    <!-- Begin content -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Mô tả</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="MoTa_vi" id="MoTa_vi"><?=$MoTa_vi?></textarea>
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
                                            <input class="kmt_textinput" value="<?=$Ten_en?>" name="Ten_en" type="text" placeholder="Please enter menu name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin descript -->
                                    <tr class="kmt_hidden">
                                        <td class="right">Quote:</td>
                                        <td class="left">
                                            <textarea name="TomTat_en" class="kmt_textarea"><?=$TomTat_en?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End descript -->
                                    
                                    <!-- Begin content -->
                                    <tr class="kmt_hidden"><td class="center" colspan="2">Description</td></tr>
                                    <tr class="kmt_hidden">
                                        <td colspan="2">
                                            <textarea name="MoTa_en" id="MoTa_en"><?=$MoTa_en?></textarea>
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
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật danh mục"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_menu/menu_3"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->