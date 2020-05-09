<!DOCTYPE html>
<html>
    <head>
        <title> Shop list | Giftery </title>
   
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
         
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_shopList.css">
   
    </head>

    <body> 
        <div class="container-fluid myContainer">    
            <form name="filterForm"  method="GET" action="<?php
                echo base_url("".$controller."/listShops"); 
            ?>"> 
            
            <div class="row"> 
                
                
            
                
                <div class="offset-lg-2 col-lg-10 col-sm-12" align="center"> 
                    
                    <input type="text" class="search_input" name="search" value="" placeholder="Search here"> 
                    <button type="submit" class="btn search_submit"><img class="icon" id="search_icon" src="../images/icons/search-icon.png"></button>
               </div>
            </div>
            <div class="row h-100">
                <div class="col-sm-12 col-lg-2 filter_div_wrapper">
                        <div class='sort_div '>
                            <div class="sortOrder">
                              
                        <div class="form-check">
                              <input class="form-check-input" type="radio" name="sortOrder" id="exampleRadios1" value="desc" checked>
                              <label class="form-check-label" for="exampleRadios1">
                                Descending
                              </label>
                        </div>
                         <div class="form-check">
                              <input class="form-check-input" type="radio" name="sortOrder" id="exampleRadios2" value="asc">
                              <label class="form-check-label" for="exampleRadios2">
                                Ascending
                              </label>
                         </div>
                            </div>
                            <br>
                    <select name='sortColumn' class="custom-select">
                        <option  selected >Sort</option>
                    <option name='sortColumn' value="rating">By rating</option>
                    <option name='sortColumn' value="submitDate">By date</option>
                    <option name='sortColumn' value="shopName">By name</option>
                     </select>
                        <br>
                        <br>
                    </div>
                    <div  class="filter_div">
                 
                        <h6 class="filters_caption" style="font-weight: 700;">Filters</h6>
                       
                        
                        <?php
                        
                                    foreach ($filters as $filter) {
                                        echo '<div class="form-check d-sm-inline d-md-block checkbox_div">';
                                        
                                        echo "<input class=' form-check-input' type='checkbox' name='categories[".$filter->idC."]' value='".$filter->idC."' id='".$filter->idC.$filter->name."'"; 
                                            if(isset($_POST["categories"]) && isset($_POST['categories']["".$filter->idC])){
                                                
                                                echo ' checked ';
                                            }
                                                
                                                echo "   >";
                                        echo '<label class="form-check-label" for="'.$filter->idC.$filter->name.'">'.$filter->name. '</label>';
                                        
                                        echo '</div>';
                                        
                                    }
                        
                        
                        ?>
                        <br>
                        
                        <div class='filter_submit_wrapper' align='center'>
                    <button  class='btn btn-secondary'> Submit</button>   
               
                    </div>
                    </div>
                 </div>
          
                      
                <div class="col-sm-12 col-lg-10 ">
                <div class=" shop_container " align="center">
                
                
                <?php
                
                    foreach ($shops as $shop) {
                        
                        $data=["shop"=>$shop, 
                                "shopPageLink"=>"".base_url("".$controller."/"."shopPage")
                            ]; 
                        
                        
                        echo view("templates/shopInShopList", $data);
                        
                    }
                    
                
                ?> 
                
              
            
           
              </div>
                  </form>  
            </div>
                </div>
            </div>
        

        <!--HEHEHEHHEHE-->
        <script>
            function toggleFilter() {
              var x = document.getElementById("filter_div");
              if (x.style.display === "none") {
                x.style.display = "block";
              } else {
                x.style.display = "none";
              }
            }
            function hideFilterDiv(){


                var x=document.getElementById("filter_div"); 
                x.style.display="none";
            }
            </script>
    </body>
</html>