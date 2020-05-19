<!DOCTYPE html>
<html>
    <head>
        <title> Shop list | Giftery </title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/css/style_common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/css/style_shopList.css">
        <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">



    </head>

    <body> 
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>    
        <div class="container-fluid myContainer">    

            <form name="filterForm"  method="GET" action="<?php
            echo base_url("" . $controller . "/listShops");
            ?>"> 

                <div class="row"> 


                    <div  class="col-sm-2 col-2 d-lg-none noPadding" style="padding-left:20px;" >

                        <img onclick='toggleFilter()' src="<?php echo base_url('images/icons/filter.png'); ?>" class="show_filter">


                    </div> 

                    <div class="offset-lg-4  col-lg-6 col-sm-8  col-8 noPadding" align="center"> 

                        <input type="text" class="search_input" name="search" value="" placeholder="Search here"> 
                        <button type="submit" class="btn search_submit"><img class="icon" id="search_icon" src="../images/icons/search-icon.png"></button>


                    </div>
                    <div class="col-lg-2  col-sm-2 col-2" style="padding-right:20px;">

                        <div class=" dropdown float-right  ">

                            <button class="btn  dropdown-toggle sort_button " type="button" id="dropdownMenubutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenubutton">

                                <button class="dropdown-item" type="submit" name="sort" value="rating_asc">By rating asc</button>
                                <button  class="dropdown-item" type="submit"  name="sort" value="rating_desc">By rating desc</button>
                                <button  class="dropdown-item" type="submit"  name="sort" value="date_asc">By date asc</button>
                                <button  class="dropdown-item" type="submit"  name="sort" value="date_desc">By date desc</button>
                                <button  class="dropdown-item" type="submit"  name="sort" value="shopName_asc">By name asc</button>
                                <button  class="dropdown-item" type="submit"   name="sort" value="shopName_desc">By name desc</button>
                             

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row h-100">
                    <div class="col-sm-12 col-lg-2 filter_div_wrapper">                    

                        <div  class="filter_div  d-lg-block    " id='filter_div'>

                            <h6 class="filters_caption" style="font-weight: 700;">Filters</h6>


                            <?php
                            foreach ($filters as $filter) {
                                echo '<div class="form-check d-sm-inline d-md-block checkbox_div">';

                                echo "<input class=' form-check-input' type='checkbox' name='categories[" . $filter->idC . "]' value='" . $filter->idC . "' id='" . $filter->idC . $filter->name . "'";
                                if (isset($_GET["categories"]) && isset($_GET['categories']["" . $filter->idC])) {

                                    echo ' checked ';
                                }

                                echo "   >";
                                echo '<label class="form-check-label" for="' . $filter->idC . $filter->name . '">' . $filter->name . '</label>';

                                echo '</div>';
                            }
                            ?>
                            <br>

                            <div class='filter_submit_wrapper' align='center'>
                                <button  class='btn btn-secondary submit_button'> Submit</button>   

                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-12 col-lg-10 ">
                        <div class=" row shop_container " align="center">


                            <?php
                            foreach ($shops as $shop) {

                                $data = ["shop" => $shop,
                                    "shopPageLink" => "" . base_url("" . $controller . "/" . "shopPage")
                                ];


                                echo view("templates/shopInShopList", $data);
                            }
                            ?>
                        </div>
                        </form>  
                    </div>
                </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!--HEHEHEHHEHE-->
        <script>
                        function toggleFilter() {
                            
                            $("#filter_div").toggleClass("d-none");
                        }
                      
        </script>
    </body>
</html>