
    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">CẬP NHẬT TỪ KHÓA</h1>
        <div id="kmt_admin_content">
            <?php
                foreach($seo as $value){
                    $TieuDe_vi = $value->TieuDe_vi;
                    $TieuDe_en = $value->TieuDe_en;
                    $NoiDung_vi = $value->NoiDung_vi;
                    $NoiDung_en = $value->NoiDung_en;
                    $TuKhoa_vi = $value->TuKhoa_vi;
                    $TuKhoa_en = $value->TuKhoa_en;
                }
            ?>
            <form action="<?=base_url()?>admin_seo/update_seo" method="post">
                <input type="hidden" name="idK" value="<?=$value->idK?>"/>
                
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
                                    <td class="left"><input name="TieuDe_vi" value="<?=$TieuDe_vi?>" class="kmt_textinput" type="text"  required="required"/></td>
                                </tr>
                                <!-- End tittle -->
                                
                                <!-- Begin descript -->
                                <tr>
                                    <td class="right">Mô tả:</td>
                                    <td class="left">
                                        <textarea name="NoiDung_vi" class="kmt_textarea"><?=$NoiDung_vi?></textarea>
                                    </td>
                                </tr>
                                <!-- End descript -->
                                
                                <!-- Begin descript -->
                                <tr>
                                    <td class="right">Từ khóa:</td>
                                    <td class="left">
                                        <textarea name="TuKhoa_vi" class="kmt_textarea"><?=$TuKhoa_vi?></textarea>
                                    </td>
                                </tr>
                                <!-- End descript -->

                            </table>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <table class="kmt_admin_addarticles">
                                
                                <!-- Begin tittle -->
                                <tr>
                                    <td class="right">Title:</td>
                                    <td class="left"><input name="TieuDe_en" value="<?=$TieuDe_en?>" class="kmt_textinput" type="text"/></td>
                                </tr>
                                <!-- End tittle -->
                                
                                <!-- Begin descript -->
                                <tr>
                                    <td class="right">Description:</td>
                                    <td class="left">
                                        <textarea name="NoiDung_en" class="kmt_textarea"><?=$NoiDung_en?></textarea>
                                    </td>
                                </tr>
                                <!-- End descript -->
                                
                                <!-- Begin descript -->
                                <tr>
                                    <td class="right">Key word:</td>
                                    <td class="left">
                                        <textarea name="TuKhoa_en" class="kmt_textarea"><?=$TuKhoa_en?></textarea>
                                    </td>
                                </tr>
                                <!-- End descript -->

                            </table>
                        </div>
                        
                    </div>
                    <table class="kmt_admin_addarticles">
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                                <a href="<?=base_url()?>admin_seo/index"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- End kmt_admin_tablink-->
                
            </form>
            
        </div>
    </div>
    <!-- End kmt_admin_middle_right-->