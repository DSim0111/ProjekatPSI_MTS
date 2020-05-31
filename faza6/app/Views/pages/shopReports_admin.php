<!DOCTYPE html> 
<html>
    <head> 
        <title> 
            Reports | Giftery 
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
        <link rel="stylesheet" href="<?php echo base_url('css/style_shopReportsAdmin.css')?>">
         </head>
    <body style="background-color:#f2f2f2 !important"> 
        <?php
        
        if(isset($header)){
            
            echo view($header);
        }
        
        ?>
        <div class="container-fluid ">

       
             
                     <div class="  row"> 
                         
                         <div class=" col-sm-12 col-md-2 col-lg-2"> 
                             
                               
                                <div class="row options_div text-center" >
                                    <div class="noPadding col-md-12  col-sm-6 col-6"> 
                                        <a  href="<?php echo base_url('Administrator/shopReports?unread=true')?>">
                                        <div class="options_item">
                                       Unread report
                                        </div>
                                        </a>
                                        </div>
                                    <div class=" noPadding col-md-12  col-sm-6 col-6"> 
                                         <a  href="<?php echo base_url('Administrator/shopReports')?>">
                                        <div class="options_item">
                                       All reports
                                        </div>
                                        </a>
                                    </div>
                                  
                                    

                                </div>
                           
                         

                         </div>
                        <div class="col-lg-10 col-md-10 col-sm-12">

                            <div class="row shop_report_container">
                            <!--Shop report 1-->
                            <div class="col-sm-12">
                                     <h4 style="color:black"> Requests for new shop accounts</h4>
                            </div>
                            <?php
                                if(isset($error)){
                                    
                                    echo "<p style='color:red'>".$error."</p>"; 
                                }else{
                                    
                                        if(!isset($reports)){
                                            echo "<p style='color:red'>Woops! Something went wrong</p>"; 
                                        }else{
                                            
                                            if(count($reports)==0){
                                                
                                                echo "<p>There is no new reports to show.</p>"; 
                                                
                                            }else{
                                                
                                               
                                                foreach ($reports as $report) {
                                                   
                                                    echo view("templates/shopReportAdmin", ["report"=>$report]); 
                                                    
                                                }
                                                
                                            }
                                            
                                        }
                                    
                                }
                            
                            ?>
                            
                         
                            <!--Shop report 2-->
                         
                    </div>

                    </div>
                </div>
            

        </div>

    </body>
</html> 