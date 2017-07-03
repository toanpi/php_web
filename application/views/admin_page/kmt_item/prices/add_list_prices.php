<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>THÊM ĐƠN GIÁ</h1>
        <div id="kmt_admin_content">
            
            
            <form action="<?php echo base_url()?>admin_item/save_list_prices" method="post">
                <input name="idIT" type="hidden" value="<?php echo $idIT?>"/>
                
                <table class="kmt_admin_addarticles">
                    <!-- Begin title -->
                    <tr>
                      <td class="right">Mã số:</td>
                      <td class="left">
                        <input class="kmt_textinput" name="MaSo" type="text" placeholder="Vui lòng điền mã số" required="required"/>
                      </td>
                    </tr>
                    <!-- End title -->
                    
                    <!-- Begin title -->
                    <tr>
                      <td class="right">Thời gian:</td>
                      <td class="left">
                        <input class="kmt_textinput" name="ThoiGian" type="text" placeholder="Vui lòng điền thời gian hết hạn" required="required"/>
                      </td>
                    </tr>
                    <!-- End title -->
                    
                    <!-- Begin title -->
                    <tr>
                      <td class="right">Đơn giá:</td>
                      <td class="left">
                        <input class="kmt_textinput" name="DonGia" type="text" placeholder="Vui lòng điền giá" required="required"/>
                      </td>
                    </tr>
                    <!-- End title -->
                    
                    <tr>
                            <td colspan="2">
                                <input type="submit" class="kmt_buttoninput" value="Thêm mới"/>
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