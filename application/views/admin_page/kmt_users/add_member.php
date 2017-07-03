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
        <h1>THÊM MỚI TÀI KHOẢN</h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($rs=="success"){
                                echo 'Successful';
                            }elseif($rs=="fail"){
                                echo 'Fails';
                            }else{}
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
                
                <form action="<?=base_url()?>users_method/save_member" method="post">
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td class="right" style="width: 200px;">Email:</td>
                            <td class="left">
                                <input type="email" name="email" class="kmt_textinput" required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="right" style="width: 200px;">Tên đại lý:</td>
                            <td class="left">
                                <input name="name" class="kmt_textinput" required="required" type="text" placeholder="Nhập tên đại lý ..." />
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="right" style="width: 200px;">Số điện thoại:</td>
                            <td class="left">
                                <input name="phone" class="kmt_textinput" required="required" type="text" placeholder="Vui lòng nhập số điện thoại..." />
                            </td>
                        </tr>
                        <tr>
                            <tr><td class="center" colspan="2">Địa chỉ:</td></tr>
                            <tr>
                                    <td colspan="2">
                                        <textarea name="address" id="address"></textarea>
                                        <script type="text/javascript">
                                        	var editor = CKEDITOR.replace( 'address',{
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
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="left">
                                 <input type="submit" class="kmt_buttoninput" value="Thêm mới"/>
                                <a href="<?=base_url()?>users_method/member">
                                    <input type="button" class="kmt_buttoninput" value="Quay lại"/>
                                </a>
                            </td>
                        </tr>
    
                    </table>
                </form>
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->