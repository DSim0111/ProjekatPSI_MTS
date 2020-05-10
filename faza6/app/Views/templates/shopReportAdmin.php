<?php

    if(!isset($report)){
        
        echo "There has been an error"; 
    return; 
        }
  

?>     


<div class="row shop_report">
                                <div class="col-sm-10 noPadding">  
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
                                </div>
                                <div class="col-sm-2 noPadding"> 
                                    <!--What to do here ????-->
                                    <button type='button' class="btn btn-danger float-right">Mark as read </button>
                                </div>
                      </div>