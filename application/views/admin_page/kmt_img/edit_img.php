<?php
    foreach($type_img as $value_t){
        $Page = $value_t->Page;
        $MoTa = $value_t->MoTa;
        $Url = $value_t->Url;
    }
?>
    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">CẬP NHẬT HÌNH ẢNH - <?php echo $title_type_img?></h1>
        <div id="kmt_admin_content">
            <?php
                foreach($img as $value_l){
                    $idH = $value_l->idH;
                    $idLH = $value_l->idLH;
                    $idP = $value_l->idP;
                    $Link = $value_l->Link;
                    $TenHinh_vi = $value_l->TenHinh_vi;
                    $TenHinh_en = $value_l->TenHinh_en;
                    $Name = $value_l->Name;
                    $MoTa_vi = $value_l->MoTa_vi;
                    $MoTa_en = $value_l->MoTa_en;
                    $UrlHinh = $value_l->UrlHinh;
                    
                }
            ?>
            <form action="<?php echo base_url()?>admin_img/update_img" method="post">
                <input name="idH" value="<?php echo $idH?>" type="hidden"/>
                <input name="idLH" value="<?php echo $idLH?>" type="hidden"/>
                <input name="MaHinh" value="<?php echo $MaHinh?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right title_pro">Hình hiện tại:</td>
                        <td class="left kmt_img_ad">
                            <a href="<?php echo base_url($UrlHinh)?>" class="fancybox">
                                <img src="<?php echo base_url($UrlHinh)?>" height="70px"/>
                            </a>
                        </td> 
                    </tr>
                    <tr>
                        <td class="right">Chọn hình khác:</td>
                        <td class="left">
                            <input class="kmt_textinput" value="<?php echo base_url($UrlHinh)?>" id="imageP" name="UrlHinh" type="text" required="required"/>
                            <input onclick="BrowseServer('Files:/chung/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình khác"/>
                        </td>
                    </tr>
                    
                    <?php
                        if($Page == 1 ){
                    ?>
                    <tr>
                        <td class="right">Thuộc trang:</td>
                        <td class="left">
                            <select name="idP">
                                <option value="0" >Không thuộc riêng trang nào</option>
                                <?php
                                    foreach($list_page as $value){
                                        if($value->idP!=1 && $value->idP!=8){
                                ?>
                                <option <?php if($value->idP == $idP){echo 'selected="selected"';}?> value="<?php echo $value->idP?>"><?php echo $value->TenTrang?></option>
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
                            <input class="kmt_textinput" value="<?php echo $Link?>" name="Link" type="text" placeholder="Vui lòng nhập đường dẫn dạng http://"/>
                        </td>
                    </tr>
                    <?php }?>
                    
                    <?php
                        if($idLH == 2 || $idLH ==3 ){
                    ?>
                    <tr>
                        <td class="right">Tên:</td>
                        <td class="left">
                            <input class="kmt_textinput" value="<?php echo $Name?>" name="Name" type="text" placeholder="Vui lòng nhập tên"/>
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
                                            <input class="kmt_textinput" value="<?php echo $TenHinh_vi?>" name="TenHinh_vi" type="text" placeholder="Vui lòng nhập ghi chú nếu có"/>
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
                                            <textarea name="MoTa_vi" id="MoTa_vi"><?php echo $MoTa_vi?></textarea>
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
                                            <input class="kmt_textinput" value="<?php echo $TenHinh_en?>" name="TenHinh_en" type="text" placeholder="Please enter note"/>
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
                                            <textarea name="MoTa_en" id="MoTa_en"><?php echo $MoTa_en?></textarea>
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
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật hình"/>
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