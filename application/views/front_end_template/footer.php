<!-- Begin wrap_block_3 -->
    <div id="wrap_block_3">
        
        <div class="container">
        	
        	<div class="row">
            	
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 wrap_add_f">
                	<?php
                            foreach($this->address as $value){
                                if($this->lan=='vi'){
                                    echo $value->NoiDung_vi;
                                }else{
                                    echo $value->NoiDung_en;
                                }
                          }
                    ?>
                </div>
                <?php
                     foreach($this->social as $value){
                         $Facebook = $value->Facebook;
                         $Google = $value->Google;
                         $Twitter = $value->Twitter;
                     }
                ?>
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 wrap_social">
                    <p class="icon_social">
                    	<a href="<?php echo $Facebook?>" title="Facebook" target="_blank">
                        	<i class="fa fa-facebook fa-1"></i>
                        </a>
                        <a href="<?php echo $Google?>" title="Google +" target="_blank">
                        	<i class="fa fa-google fa-1"></i>
                        </a>
                        <a href="<?php echo $Twitter?>" title="Twitter" target="_blank">
                        	<i class="fa fa-twitter fa-1"></i>
                        </a>
                    </p>
                    
                    <p>
                       <?php
                            $this->get->tachSo($this->visitor);
                            foreach(array_reverse($this->get->array_temp) as $i){
                              echo '<span class="count_num">'.$i.'</span>';
                            }
                        ?>                          
                        <span>Online : <?=$this->useronline?></span>      
                    </p>
                    <p>2017 Diagnostic Soft</p>
                </div>
                
            </div>
        
        </div>
        
    </div>
    <!-- End wrap_block_3 -->
    <style>
    <?php echo $this->Css_code?>
    </style>
    
	<script src="<?php echo base_url()?>public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/js/responsiveslides.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/js/ymslider.js"></script>
    <script src="<?php echo base_url()?>public/js/jquery.touchSwipe.min.js"></script>
    <script src="<?php echo base_url()?>public/js/kmt_script.js"></script>
    <script>
        var base_url = '<?php echo base_url()?>';
    	MPinitSlider();
	</script>
    
</body>
</html>