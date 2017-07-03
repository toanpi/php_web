<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>CẬP NHẬT ĐƠN GIÁ</h1>
        <div id="kmt_admin_content">
            
            
            <?php
                foreach($list_prices as $value){
                    $idIT = $value->idIT;
                    $idPL = $value->idPL;
                    $MaSo = $value->MaSo;
                    $DonGia = $value->DonGia;
                    $ThoiGian = $value->ThoiGian;
                }
            ?>
            
            <form action="<?php echo base_url()?>admin_item/update_list_prices" method="post">
                <input name="idPL" type="hidden" value="<?php echo $idPL?>"/>
                <input name="idIT" type="hidden" value="<?php echo $idIT?>"/>
                
                <table class="kmt_admin_addarticles">
                    
                    <!-- Begin title -->
                    <tr>
                      <td class="right">Mã số:</td>
                      <td class="left">
                        <input class="kmt_textinput" name="MaSo" type="text" value="<?php echo $MaSo?>" placeholder="Vui lòng điền mã số" required="required"/>
                      </td>
                    </tr>
                    <!-- End title -->
                    
                    <!-- Begin title -->
                    <tr>
                      <td class="right">Thời gian:</td>
                      <td class="left">
                        <input class="kmt_textinput" value="<?php echo $ThoiGian?>" name="ThoiGian" type="text" placeholder="Vui lòng điền thời gian hết hạn" required="required"/>
                      </td>
                    </tr>
                    <!-- End title -->
                    
                    <!-- Begin title -->
                    <tr>
                      <td class="right">Đơn giá:</td>
                      <td class="left">
                        <input class="kmt_textinput" value="<?php echo $DonGia?>" name="DonGia" type="text" placeholder="Vui lòng điền giá" required="required"/>
                      </td>
                    </tr>
                    <!-- End title -->
                    
                    <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Cập nhật"/>
                                <input type="reset" class="kmt_buttoninput" value="Nhập lại"/>
                            <a href="<?php echo base_url()?>admin_item/list_prices/<?php echo $idIT?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                            </td>
                        </tr>
                    
                </table>
            
            
            </div>
            <!-- End kmt_admin_tablink-->
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->