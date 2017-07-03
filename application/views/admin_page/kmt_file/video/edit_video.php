    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">CẬP NHẬT VIDEO</h1>
        <div id="kmt_admin_content">

            <?php
                foreach($video as $value){
                    $idV = $value->idV;
                    $MaHinh = $value->MaHinh;
                    $Url_video = $value->Url_video;
                    $TenV_vi = $value->TenV_vi;
                    $TenV_en = $value->TenV_en;
                    $MoTa_vi = $value->MoTa_vi;
                    $MoTa_en = $value->MoTa_en;
                }
            ?>
            <form action="<?php echo base_url()?>admin_file/update_video" method="post">
                <input name="idV" value="<?php echo $idV?>" type="hidden"/>
                <input name="MaHinh" value="<?php echo $MaHinh?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">Video:</td>
                        <td class="left">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $Url_video?>" frameborder="0" allowfullscreen></iframe>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Mã video:</td>
                        <td class="left">
                            <input class="kmt_textinput" value="<?php echo $Url_video?>" name="Url_video" type="text" placeholder="Vui lòng nhập link video" required="required"/>
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
                                        <td class="right">Tên video:</td>
                                        <td class="left">
                                            <input class="kmt_textinput" value="<?php echo $TenV_vi?>" name="TenV_vi" type="text" placeholder="Vui lòng nhập tên video"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Mô tả:</td>
                                        <td class="left">
                                            <textarea name="MoTa_vi" class="kmt_textarea"><?php echo $MoTa_vi?></textarea>
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
                                            <input class="kmt_textinput" value="<?php echo $TenV_en?>" name="TenV_en" type="text" placeholder="Please enter video name"/>
                                        </td>
                                    </tr>
                                    <!-- End title -->
                                    
                                    <!-- Begin quote -->
                                    <tr>
                                        <td class="right">Description:</td>
                                        <td class="left">
                                            <textarea name="MoTa_en" class="kmt_textarea"><?php echo $MoTa_en?></textarea>
                                        </td>
                                    </tr>
                                    <!-- End quote -->
                                    
                                </table>
                            </div>
                    </div>
                    
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật video"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?php echo base_url()?>admin_file/video/<?php echo $MaHinh?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->