
<!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1>
            CHI TIẾT ĐƠN HÀNG : <?php echo $MaDH?>
        </h1>
        <div id="info_user">
            
            <ul id="titlle_u">
                <li>Mã giao dịch : </li>
                <li>Họ tên người đặt : </li>
                <li>Email : </li>
                <li>SDT: </li>
                <li>Địa chỉ : </li>
                <li>Trạng thái : </li>
                <li>Thanh toán bằng : </li>
                <li>Ghi chú : </li>
            </ul>      
            <ul id="info_u">
                <li><?php echo $Code?></li>
                <li><?php echo $HoTen?></li>
                <li><?php echo $Email?></li>
                <li><?php echo $SDT?></li>
                <li><?php echo $DiaChi?></li>
                <li>
                    <?php 
                        if($TrangThai==0){
                            echo 'Chưa xác nhận';
                        }else{
                            echo 'Đã xác nhận';
                        }
                    ?>
                </li>
                <li><?php echo $HinhThucThanhToan?></li>
                <li>
                    <?php
                        if($GhiChu!=''){
                            echo $GhiChu;
                        }else{
                            echo 'Không có ghi chú';
                        }
                    ?>
                </li>
            </ul> 
           
         </div>
        <div id="kmt_admin_content">
            
                <table class="kmt_admin_table">
                    <tr class="kmt_admin_titletable">
                        <td>STT</td>
                        <td>Tên phần mềm</td>
                        <td>Mã số</td>
                        <td>Hình</td>
                        <td>File yêu cầu</td>
                        <td>Loại bản quyền</td>
                        <td>Đơn giá</td>
                        <td>Thành tiền</td>
                    </tr>
                    <?php
                         $i=1;
                         $list_idIT = explode(',',$idIT);
                         $list_idPL = explode(',',$idPL);
                         $list_Gia = explode(',',$Gia);
                         //$tongtien=0;
                         for($k=0;$k<count($list_idIT);$k++){ 
                         $con_product = array('idIT'=>$list_idIT[$k]);
                         $list_product = $this->get->kmt_get_where('kmt_item',$con_product);
                         foreach($list_product as $value){ 
                            $MaHinh= $value->MaHinh;
                            $idIT = $this->get->kmt_get_col_where('kmt_item','idIT',array('MaHinh'=>$MaHinh));
                            $TenSP = $this->get->kmt_get_col_where('kmt_item','Ten_vi',array('MaHinh'=>$MaHinh));
                            //$tongtien += $gia*$list_SL[$k];
                            $url_p = base_url().'version/'.mb_strtolower(url_title(removesign($TenSP))).'-'.$idIT;  
                     ?>
                    <tr <?php if($i%2==0){echo "class='kmt_admin_c1'";}else{echo "class='kmt_admin_c2'";}?>>
                        <td><?php echo $i;?></td>
                        <td>
                            <a href="<?php echo $url_p?>" target="_blank"><?php echo $TenSP?></a>
                        </td>
                        <td><?php echo $MaSP?></td>
                        <td>
                            <a href="<?php echo base_url($File_img)?>" class="fancybox"><img src="<?php echo base_url($File_img)?>" width="100px"/></a>
                        </td>
                        <td>
                            <a href="<?php echo base_url('upload/real/'.$File_name)?>" target="_blank"><?php echo $File_name?></a>
                        </td>
                        <td>
                            <?php echo $this->get->kmt_get_col_where('kmt_list_prices','ThoiGian',array('idPL'=>$list_idPL[$k]));?>
                        </td>
                        <td>$<?php echo $list_Gia[$k]?></td>
                        <td>$<?php echo $list_Gia[$k]?></td>
                    </tr>
                    <?php $i++;}}?>
                    <tr class="kmt_admin_titletable">
                        <td colspan="8">
                            Tổng hóa đơn : $<?php echo $TongTien?>
                        </td>
                    </tr>
                </table>

            <!-- Begin kmt_admin_bar_3-->
            <div class="kmt_admin_bar_3">
                <p>
                    <?php if($TrangThai ==0){?>
                        <a href="<?php echo base_url()?>admin_cart/confirm_order/<?php echo $idDH?>/<?php echo $TrangThai?>">
                            <input type="button" id="bt_del" class="kmt_buttoninput" value="Xác nhận đơn hàng"/>
                        </a>
                        <a href="<?php echo base_url()?>same_method/del_one/kmt_donhang/<?php echo $idDH?>" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng đã chọn!')">
                            <input type="button" id="bt_del" class="kmt_buttoninput" value="Xóa đơn hàng"/>
                        </a>
                    <?php }else{?>
                        <a href="<?php echo base_url()?>same_method/del_one/kmt_donhang/<?php echo $idDH?>" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng đã chọn!')">
                            <input type="button" id="bt_del" class="kmt_buttoninput" value="Xóa đơn hàng"/>
                        </a>
                    <?php }?>
                    <a href="<?php echo base_url()?>admin_cart/index/<?php echo $TrangThai?>">
                        <input type="button" id="bt_del" class="kmt_buttoninput" value="Quay lại"/>
                    </a>
                </p>
            </div>
            <!-- End kmt_admin_bar_3-->

        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->
