
    <!-- Begin kmt_admin_middle_right-->
    <div id="kmt_admin_middle_right">
        <h1 style="text-transform: uppercase;">THÊM MỚI HÌNH ẢNH - <?=$title_type_img?></h1>
        <div id="kmt_admin_content">
            
            <!-- Begin kmt_admin_bar_1-->
            <div class="kmt_admin_bar_1">
                
                <div class="kmt_admin_search">
                    <span class="note" style="padding: 0px 10px;">
                        <?php
                            if($this->session->flashdata('error_ud')!=null){
                                echo $this->session->flashdata('error_ud');
                            }
                        ?>
                    </span>
                </div>
                
            </div>
            <!-- End kmt_admin_bar_1-->
            
            <form action="<?=base_url()?>admin_img/save_list_img" method="post" enctype="multipart/form-data">
                <input name="idLH" value="<?=$idLH?>" type="hidden"/>
                <table class="kmt_admin_addarticles">
                    <tr>
                        <td class="right">Chọn file:</td>
                        <td class="left">
                            <input type="file" class="kmt_textinput" name="myfile[]" id="myfile" multiple="multiple" />
                        </td>
                    </tr>
                    
                    <tr>
                    <td colspan="2">
                        <input type="submit" class="kmt_buttoninput" value="Thêm mới hình"/>
                        <a href="<?=base_url()?>admin_img/img/<?=$idLH?>"><input type="button" class="kmt_buttoninput" value="Quay lại"/></a>
                    </td>
                    </tr>

                </table>
            
            </form>
            
        </div>
    </div>
    <!-- Begin kmt_admin_middle_right-->