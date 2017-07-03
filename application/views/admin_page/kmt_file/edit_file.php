    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">CẬP NHẬT FILE</h1>
        <div id="kmt_admin_content">

            <?php
                foreach($file as $value){
                    $idF = $value->idF;
                    $idNF = $value->idNF;
                    $MaHinh = $value->MaHinh;
                    $Url_file = $value->Url_file;
                    $TenFile_vi = $value->TenFile_vi;
                    $TenFile_en = $value->TenFile_en;
                }
            ?>
            <form action="<?php echo base_url()?>admin_file/update_file" method="post">
                <input name="idF" value="<?php echo $idF?>" type="hidden"/>
                <input name="MaHinh" value="<?php echo $MaHinh?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">File hiện tại:</td>
                        <td class="left">
                            <a href="<?php echo $Url_file?>" target="_blank"><?php echo $TenFile_vi?></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Chọn file:</td>
                        <td class="left">
                            <input class="kmt_textinput" id="imageP" name="Url_file" type="text" value="<?php echo $Url_file?>" required="required"/>
                            <input onclick="BrowseServer('Files:/','imageP')" class="kmt_buttoninput" type="button" value="Chọn file"/>
                        </td>
                    </tr>
                    
                    
                    <tr class="kmt_hidden">
                        <td class="right">Thuộc nhóm:</td>
                        <td class="left">
                            <select name="idNF">
                                <?php
                                    foreach($file_group as $value_fg){
                                ?>
                                <option <?php if($idNF == $value_fg->idNF){echo 'selected="selected"';}?> value="<?php echo $value_fg->idNF?>"><?php echo $value_fg->TenNhom_vi?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                      <td class="right">Size:</td>
                      <td class="left">
                         <input class="kmt_textinput" name="Size" value="<?php echo $value->Size?>" type="text"/>
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
                                        <td class="right">Tên file:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?php echo $TenFile_vi?>" name="TenFile_vi" type="text" placeholder="Vui lòng nhập tên file"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Mô tả:</td>
                                        <td class="left">
                                            <textarea name="MoTa_vi" class="kmt_textarea"><?php echo $value->MoTa_vi?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Hệ điều hành:</td>
                                        <td class="left">
                                            <textarea name="YeuCau_vi" class="kmt_textarea"><?php echo $value->YeuCau_vi?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->

                                </table>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <table class="kmt_admin_addarticles">
        
                                    <!-- Begin title -->
                                    <tr>
                                        <td class="right">Name :</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?php echo $TenFile_en?>" name="TenFile_en" type="text" placeholder="Please enter file name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Description:</td>
                                        <td class="left">
                                            <textarea name="MoTa_en" class="kmt_textarea"><?php echo $value->MoTa_en?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">OS version:</td>
                                        <td class="left">
                                            <textarea name="YeuCau_en" class="kmt_textarea"><?php echo $value->YeuCau_en?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật file"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?php echo base_url()?>admin_file/file"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->