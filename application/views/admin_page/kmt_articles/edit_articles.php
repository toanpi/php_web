<?php
    foreach($type_article as $value_t){
        $Nhom = $value_t->Nhom;
        $HinhAnh = $value_t->HinhAnh;
        $TieuBieu = $value_t->TieuBieu;
        $TrichDan = $value_t->TrichDan;
    }
      
?>

    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">CẬP NHẬT BÀI VIẾT - <?php echo $title_type_articles?></h1>
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
                foreach($articles as $value){
                    $idBV = $value->idBV;
                    $idNBV = $value->idNBV;
                    $idLBV = $value->idLBV;
                    $idMN_1 = $value->idMN_1;
                    $TieuDe_vi = $value->TieuDe_vi;
                    $TieuDe_en = $value->TieuDe_en;
                    $TomTat_vi = $value->TomTat_vi;
                    $TomTat_en = $value->TomTat_en;
                    $NoiDung_vi = $value->NoiDung_vi;
                    $NoiDung_en = $value->NoiDung_en;
                    $MaHinh = $value->MaHinh;
                    $UrlHinh = $this->get->kmt_get_col_where('kmt_hinhanh','UrlHinh',array('MaHinh'=>$MaHinh));
                }
            ?>
            <form action="<?php echo base_url()?>admin_articles/update_articles" method="post">
                <input type="hidden" name="idLBV" value="<?php echo $idLBV?>"/>
                <input type="hidden" name="idBV" value="<?php echo $idBV?>"/>
                <input type="hidden" name="MaHinh" value="<?php echo $MaHinh?>"/>
                <table class="kmt_admin_addarticles">
                    <?php
                        if($HinhAnh == 1 ){
                    ?>
                    <tr>
                        <td class="right title_pro">Hình hiện tại:</td>
                        <td class="left">
                            <a href="<?php echo base_url($UrlHinh)?>" class="fancybox">
                                <img src="<?php echo base_url($UrlHinh)?>"height="60px"/>
                            </a>
                        </td> 
                    </tr>
                    <tr>
                        <td class="right">Chọn hình khác:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="UrlHinh" type="text" value="<?php echo base_url($UrlHinh)?>"/>
                            <input onclick="BrowseServer('Files:/baiviet/','imageP')" class="kmt_buttoninput" type="button" value="Chọn hình khác" readonly="readonly"/>
                        </td>
                    </tr>
                    <?php }?>
                    
                    <?php
                        if($Nhom ==1 ){
                            
                    ?>
                    <tr>
                        <td class="right">Thuộc nhóm:</td>
                        <td class="left">
                            <select name="idNBV">
                            <?php 
                                foreach($articles_group as $value_nbv){
                            ?>
                                <option <?php if($idNBV == $value_nbv->idNBV){echo 'selected="selected"';}?> value="<?php echo $value_nbv->idNBV?>"><?php echo $value_nbv->TenNhom_vi?></option>
                            <?php }?>
                            </select>
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
                            
                                <!-- Begin tittle -->
                                <tr>
                                    <td class="right">Tiêu đề:</td>
                                    <td class="left"><input name="TieuDe_vi" value="<?php echo $TieuDe_vi?>" class="kmt_textinput" type="text" placeholder="Nhập tiêu đề tin ..." required="required"/></td>
                                </tr>
                                <!-- End tittle -->
                                
                                <?php
                                    if($TrichDan ==1 ){
                                ?>
                                
                                    <?php
                                        if($idLBV == 1 ){
                                    ?>
                                    <!-- Begin quote -->
                                    <tr><td class="center" colspan="2">Trích dẫn:</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="TomTat_vi" id="TomTat_vi"><?php echo $TomTat_vi?></textarea>
                                            <script type="text/javascript">
                                            	var editor = CKEDITOR.replace( 'TomTat_vi',{
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
                                    <!-- End quote -->
                                    <?php }else{?>
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Trích dẫn:</td>
                                        <td class="left">
                                            <textarea name="TomTat_vi" class="kmt_textarea"><?php echo $TomTat_vi?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    <?php }?>
                                
                                <?php }?>
                                
                                <!-- Begin content -->
                                <tr><td class="center" colspan="2">Nội dung:</td></tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="NoiDung_vi" id="NoiDung_vi"><?php echo $NoiDung_vi?></textarea>
                                        <script type="text/javascript">
                                        	var editor = CKEDITOR.replace( 'NoiDung_vi',{
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
                                
                                <!-- Begin tittle -->
                                <tr>
                                    <td class="right">Seo title:</td>
                                    <td class="left"><input name="Seo_title_vi" value="<?php echo $value->Seo_title_vi?>" class="kmt_textinput" type="text"/></td>
                                </tr>
                                <!-- End tittle -->
                                
                                
                                <!-- Begin description -->
                                <tr>
                                    <td class="right">Seo description:</td>
                                    <td class="left">
                                        <textarea name="Seo_description_vi" class="kmt_textarea"><?php echo $value->Seo_description_vi?></textarea>
                                    </td>
                                </tr>
                                <!-- End description -->
                                
                                <!-- Begin keyword -->
                                <tr>
                                    <td class="right">Seo keyword:</td>
                                    <td class="left">
                                        <textarea name="Seo_keyword_vi" class="kmt_textarea"><?php echo $value->Seo_keyword_vi?></textarea>
                                    </td>
                                </tr>
                                <!-- End keyword -->
                                
                            </table>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <table class="kmt_admin_addarticles">
                                
                                 <!-- Begin tittle -->
                                <tr>
                                    <td class="right">Title:</td>
                                    <td class="left"><input name="TieuDe_en" value="<?php echo $TieuDe_en?>" class="kmt_textinput" type="text" placeholder="Please enter title articles ..."/></td>
                                </tr>
                                <!-- End tittle -->
                                
                                <?php
                                    if($TrichDan ==1 ){
                                ?>
                                
                                    <?php
                                        if($idLBV == 1 ){
                                    ?>
                                    <!-- Begin quote -->
                                    <tr><td class="center" colspan="2">Quote:</td></tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea name="TomTat_en" id="TomTat_en"><?php echo $TomTat_en?></textarea>
                                            <script type="text/javascript">
                                            	var editor = CKEDITOR.replace( 'TomTat_en',{
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
                                    <!-- End quote -->
                                    <?php }else{?>
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Quote:</td>
                                        <td class="left">
                                            <textarea name="TomTat_en" class="kmt_textarea"><?php echo $TomTat_en?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    <?php }?>
                                
                                <?php }?>
                                
                                <!-- Begin content -->
                                <tr><td class="center" colspan="2">Content</td></tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="NoiDung_en" id="NoiDung_en"><?php echo $NoiDung_en?></textarea>
                                        <script type="text/javascript">
                                        	var editor = CKEDITOR.replace( 'NoiDung_en',{
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
                                
                                <!-- Begin tittle -->
                                <tr>
                                    <td class="right">Seo title:</td>
                                    <td class="left"><input name="Seo_title_en" value="<?php echo $value->Seo_title_en?>" class="kmt_textinput" type="text"/></td>
                                </tr>
                                <!-- End tittle -->
                                
                                
                                <!-- Begin description -->
                                <tr>
                                    <td class="right">Seo description:</td>
                                    <td class="left">
                                        <textarea name="Seo_description_en" class="kmt_textarea"><?php echo $value->Seo_description_en?></textarea>
                                    </td>
                                </tr>
                                <!-- End description -->
                                
                                <!-- Begin keyword -->
                                <tr>
                                    <td class="right">Seo keyword:</td>
                                    <td class="left">
                                        <textarea name="Seo_keyword_en" class="kmt_textarea"><?php echo $value->Seo_keyword_en?></textarea>
                                    </td>
                                </tr>
                                <!-- End keyword -->
                                
                            </table>
                        </div>
                        
                    </div>
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật bài viết"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                                <a href="<?php echo base_url()?>admin_articles/articles/<?php echo $idLBV?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- End kmt_admin_tablink-->
                
            </form>
            
        </div>
    </div>
    <!-- End kmt_admin_middle_right-->