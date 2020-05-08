<!DOCTYPE html>
<html>
    <head>
        <title> Shop list | Giftery </title>
           
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
         
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_shopList.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    </head>

    <body> 
        <div class="container myContainer"> 
            <div class="row menu text-center "> 
               
                <div class="col-sm-3 menu_item"> 
                    <a href="changeDataUser.html">
                    Edit profile
                    </a>
                </div>

            
                <div class="col-sm-3 menu_item">
                    <a href="contactUser.html">
                     
                    Contact
                </a>
                </div>

            
                <div class="col-sm-3 menu_item"> 
                    <a href="aboutUs.html">
                    About us
                </a>
                </div>
            
                <div class="col-sm-3 menu_item"> 
                    Something
                </div>
            </div>
            <div class="row search_row"> 
                <div class="col-sm-2"> 
                    Sort by:
                    <form> 
                        <select>
                            <option>Rating ascending</option>
                            <option>Rating descending</option>
                        </select>
                      
                        
                    </form>
                </div>
                <div class=" col-sm-8" align="center">
                    <input type="text" placeholder="Search here" id="search_input"> 
                    <img src="../icons/search-icon.png" class="icons" > 
                </div> 
                <div class="col-sm-2 filter" align="right"> 
                   <span onClick="toggleFilter()">
                    Filter
                    <img src="../icons/filter.svg" class="icons">
                 </span>
                </div>
            </div>
            <br>
        <div class="row filter_div_row">
            <div class="offset-sm-5 col-sm-7" id="filter_div"> 
                <form align="center"> 
                    <input class="product_category" type="checkbox"> Kategorija 1 
                    <input class="product_category" type="checkbox"> Kategorija 2 
                    <input class="product_category" type="checkbox"> Kategorija 3   
                    <br> 
                    <input class="product_category" type="checkbox"> Kategorija 4  
                    <input class="product_category" type="checkbox"> Kategorija 5  
                    <input class="product_category" type="checkbox"> Kategorija 6 

                    <br>
                    <br>
                    <button onClick="hideFilterDiv()" class="btn btn-primary filter_btn">Submit filter</button>
                    

                </form>
            </div>
            </div>
            <br>
            <div class="shops_container" align="center">
                
                
                <?php
                
                    foreach ($shops as $shop) {
                        
                        $data=["shop"=>$shop, 
                                "shopPageLink"=>"".base_url("".$controller."/"."shopPage")
                            ]; 
                        
                        
                        echo view("templates/shopInShopList", $data);
                        
                    }
                
                ?> 
                
              
            
           
            
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