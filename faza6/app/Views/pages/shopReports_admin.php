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
    <body> 
        <div class="container-fluid myContainer">


             
                     <div class=" row">  
                         <div class="col-sm-12 col-md-2 col-lg-2"> 
                             <div class="options_div">
                                Options
                                <div class="row">
                                    <div class="col-md-12  col-sm-3 col-xs-3"> 
                                        Sth
                                    </div>
                                    <div class="col-md-12 col-xs-3 col-sm-3"> 
                                        Sth
                                    </div>
                                    <div class="col-md-12 col-xs-3 col-sm-3"> 
                                        Sth
                                    </div>
                                    <div class="col-md-12 col-xs-3 col-sm-3"> 
                                        Sth
                                    </div>

                                </div>
                           
                            </div>

                         </div>
                        <div class="col-lg-10 col-md-10 col-sm-12">

                            <div class="shop_report_container">
                            <!--Shop report 1-->
                            <h4>
                                All active reports 
                            </h4>
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