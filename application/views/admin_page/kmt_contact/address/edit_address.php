<?php
    $rs = -1;
    $stt = 0;
    if($this->uri->segment_array()>$rs){
        $rs = end($this->uri->segment_array());
        $list_stt = explode('-',$rs);
        if(count($list_stt)==1){
            $rs = $list_stt[0];
        }else{
            $stt = 1;
            $s = $list_stt[0];
            $f = $list_stt[1];
        }
    }                  
?>

<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>CẬP NHẬT ĐỊA CHỈ</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($rs=="success"){
                                echo 'Thao tác thành công';
                            }elseif($rs=="fail"){
                                echo 'Thao tác thất bại';
                            }else{}
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            <?php 
                foreach($address as $value){
            ?>
            <form action="<?=base_url()?>admin_contact/update_address" method="post">
                <input type="hidden" value="<?=$value->idVT?>" name="idVT"/>
                
                <?php
                    if($value->idVT==1){
                ?>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right" style="width: 200px;">Bản đồ hiện tại:</td>
                        <td class="left" style="height: 350px;"><?=$value->BanDo?></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Nhập bản đồ khác :</td>
                        <td class="left">
                            <textarea style="height: 250px;" name="BanDo" class="kmt_textarea"><?=$value->BanDo?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 200px;">Địa chỉ:</td>
                        <td class="left">
                            <textarea name="NoiDung_vi" id="NoiDung_vi"><?=$value->NoiDung_vi?></textarea>
                            <script type="text/javascript">
                               	var editor = CKEDITOR.replace( 'NoiDung_vi',{
                           	        height : '150px',
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
                    <tr>
                        <td class="right" style="width: 200px;">Address:</td>
                        <td class="left">
                            <textarea name="NoiDung_en" id="NoiDung_en"><?=$value->NoiDung_en?></textarea>
                            <script type="text/javascript">
                               	var editor = CKEDITOR.replace( 'NoiDung_en',{
                           	        height : '150px',
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
                    
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="kmt_buttoninput" value="Cập nhật địa chỉ"/>
                            <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_contact"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                        </td>
                    </tr>
                </table>
                <?php }else{?>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right" style="width: 200px;">Địa chỉ:</td>
                        <td class="left">
                            <textarea name="NoiDung_vi" id="NoiDung_vi"><?=$value->NoiDung_vi?></textarea>
                            <script type="text/javascript">
                               	var editor = CKEDITOR.replace( 'NoiDung_vi',{
                           	        height : '150px',
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
                    <tr>
                        <td class="right" style="width: 200px;">Address:</td>
                        <td class="left">
                            <textarea name="NoiDung_en" id="NoiDung_en"><?=$value->NoiDung_en?></textarea>
                            <script type="text/javascript">
                               	var editor = CKEDITOR.replace( 'NoiDung_en',{
                           	        height : '150px',
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
                    
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="kmt_buttoninput" value="Cập nhật địa chỉ"/>
                            <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?=base_url()?>admin_contact"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                        </td>
                    </tr>
                </table>
                <?php }?>
                
                <?php }?>
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->