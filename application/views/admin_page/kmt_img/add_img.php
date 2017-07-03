<?php
    foreach($type_img as $value_t){
        $Page = $value_t->Page;
        $MoTa = $value_t->MoTa;
        $Url = $value_t->Url;
        $Fol_img = $value_t->Fol_img;
    }
?>
    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">THÊM MỚI HÌNH ẢNH - <?php echo $title_type_img?></h1>
        <div id="kmt_admin_content">
            
            <form action="<?php echo base_url()?>admin_img/save_img" method="post">
                <input name="idLH" value="<?php echo $idLH?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">Chọn hình đại diện:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text" required="required"/>
                            <input onclick="BrowseServer('Files:/<?php echo $Fol_img?>/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình đại diện"/>
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
                                    foreach($list_page as $value){
                                        if($value->idP!=1 && $value->idP!=8){
                                ?>
                                <option value="<?php echo $value->idP?>"><?php echo $value->TenTrang?></option>
                                <?php }}?>
                            </select>
                        </td>
                    </tr>
                    <?php }?>
                    
                    <?php
                        if($Url == 1 ){
                    ?>
                    <tr>
                        <td class="right">Đường dẫn:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="Link" type="text" placeholder="Vui lòng nhập đường dẫn dạng http://"/>
                        </td>
                    </tr>
                    <?php }?>
                    
                    <?php
                        if($idLH == 2 || $idLH ==3 ){
                    ?>
                    <tr>
                        <td class="right">Tên:</td>
                        <td class="left">
                            <input class="kmt_textinput" name="Name" type="text" placeholder="Vui lòng nhập tên"/>
                        </td>
                    </tr>
                    <?php }?>
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
                                        <td class="right">Ghi chú:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="TenHinh_vi" type="text" placeholder="Vui lòng nhập ghi chú nếu có"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <?php
                                        if($MoTa == 1 ){
                                    ?>
                                    <!-- Begin content -->
                                    <tr><td class="center" colspan="2">Mô tả</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_vi" id="MoTa_vi"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'MoTa_vi',{
                                           	        height : '250px',
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
                                    <?php }?>
                                    
                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Note :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" name="TenHinh_en" type="text" placeholder="Please enter note"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <?php
                                        if($MoTa == 1 ){
                                    ?>
                                    <!-- Begin content -->
                                    <tr><td class="center" colspan="2">Description</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="MoTa_en" id="MoTa_en"></textarea>
                                            <script type="text/javascript">
                                                
                                               	var editor = CKEDITOR.replace( 'MoTa_en',{
                                       	            height : '250px',
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
                                    <?php }?>
                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới hình"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?php echo base_url()?>admin_img/img/<?php echo $idLH?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->