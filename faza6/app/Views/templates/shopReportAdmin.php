<?php

    if(!isset($report)){
        
        echo "There has been an error"; 
    return; 
        }
  

?>     
<style>
    
    .report_padding{
        
        padding:10px;margin-bottom:20px;
    }
</style>

                                <div class="col-sm-12 report_padding light_yellow data_box">  
                                <p>Date submitted: 
                                    <?php
                                        echo $report->submitDate; 
                                    ?>
                                
                                </p>               
                                <p> Shop with ID: <a href="<?php echo base_url('Administrator/shopPage?shopId='.$report->idShop);?>">
                                        <?php
                                        echo $report->idShop;
                                        
                                        ?>
                                    </a> was reported by a user with ID: <a >
                                        <?php
                                        
                                        echo $report->idUser; // is it necessary?
                                        ?>
                                        
                                    </a> </p>
                                <h5>Comment sent by user: </h5> 
                                <p class="comment"> 
                                    
                                    <?php
                                    
                                    echo $report->description; 
                                    ?>
                                </p>
                                <style>
                                    .as_read{
                                        
                                            position:absolute; 
                                            top:10px; 
                                            right:10px;
                                        
                                    }
                                    
                                    
                                </style><?php if($report->status=='A'){?>
                                 <div class=" as_read"> 
                                    <!--What to do here ????-->
                                    <a href="<?php echo base_url("Administrator/markAsRead?idUser=".$report->idUser."&idShop=".$report->idShop)?>"
                                    <button type='button' class="btn btn-danger float-right">Mark as read </button></a>
                                </div><?php }?>
                                </div> 
                               
                    