<!DOCTYPE html>
<html>
    <head>
        <title> Shop list | Giftery </title>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/css/style_common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/css/style_shopList.css">
        <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <script src = "<?php echo base_url(); ?>/js/jQuery.js"></script>
        <script src="<?php echo base_url(); ?>/js/shopCart.js"></script>
    </head>

    <body <?php
    if (isset($message)) {
        echo "onLoad=init();";
    }
    ?>> 
            <?php
            if (isset($header)) {

                echo view($header);
            }
            ?>    
        <div class="container-fluid myContainer">    

            <form name="filterForm"  method="GET" action="<?php
            if (isset($fav))
                echo base_url("" . $controller . "/listFavShops");
            else
                echo base_url("" . $controller . "/listShopsPaging");
            ?>"> 

                <div class="row"> 


                    <div  class="col-sm-2 col-2 d-lg-none noPadding" style="padding-left:20px;" >

                        <img onclick='toggleFilter()' src="<?php echo base_url('images/icons/filter.png'); ?>" class="show_filter">


                    </div> 

                    <div class="offset-lg-4  col-lg-6 col-sm-8  col-8 noPadding" align="center"> 
                        <?php if (isset($message)) echo "<br><span style='color:red'>$message</span></center><br>"; ?>
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
                        <style>
                            .reset_filter{
                                position:absolute;
                                top:5px;
                                right:15px;
                            }
                        </style>
                        <br>
                        <a class="reset_filter  d-lg-block" href="<?php echo base_url($controller . "/listShopsPaging") ?>">
                            <button type="button" class="btn btn-info ">Reset</button>
                        </a>

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
                            $i = 0;
                            for ($i = 0; $i < count($shops); $i++) {
                                $data = [
                                    "shop" => $shops[$i],
                                    "userRole" => $userRole,
                                    "i" => $i,
                                    "shopPageLink" => "" . base_url("" . $controller . "/" . "shopPage")
                                ];
                                if (!isset($shops))
                                    echo view("templates/shopInShopList", $data);
                                else
                                    echo view("templates/shopInShopPaging", $data);
                            }
                            ?>
                        </div>
                        </form>  
                    </div>
                </div>
                <style>
                    
                    .myList{
                     
                        display:inline-flex;
                       
                        width:auto!important; 
                    }
                    
                </style>
                <div class="row">
                    <div class="offset-lg-2 col-sm-12 col-lg-10" align="center">
                        <div class="d-lg-block" align="center">
                        <ul class="list-group list-group-horizontal myList">
                            <li class="list-group-item"><a id='firstPage' onclick="newPage(1);" class="pagelink" href="#">First page</a></li>
                            <li class="list-group-item"><a id='previous' onclick="newPage(1);" class="pagelink" href="#">Previous</a></li>
                            <li class="list-group-item"><a id='first' onclick='newPage(1);' class='pagelink' href='#'>1</a></li>
                            <?php if ($maxPage > 1) echo "<li class='list-group-item'><a id='middle' onclick='newPage(2);' class='pagelink' href='#'>2</a></li>"; ?>
                            <?php if ($maxPage > 2) echo "<li class='list-group-item'><a id='last' onclick='newPage(3);' class='pagelink' href='#'>3</a></li>"; ?>
                            <?php if ($maxPage > 3) echo "<li id='leftPages'>...</li>"; ?>
                            <li class="list-group-item"><a id='lastPage' onclick="newPage(<?php echo $maxPage;?>);" class="pagelink" href="#">Last page</a></li>
                            <li class="list-group-item"><a id='next' onclick="newPage(2);" class="pagelink" href="#">Next</a></li>
                        </ul>
                        <input id='max' type='hidden' value='<?php echo $maxPage; ?>'>
                        <input id='fav' type='hidden' value='<?php
                               if (isset($fav))
                                   echo 1;
                               else
                                   echo 0;
                               ?>'>
                        </div>
                    </div>
                </div>

        </div>

        <!--HEHEHEHHEHE-->
        <script>
            function toggleFilter() {

                $("#filter_div").toggleClass("d-none");
                $(".reset_filter").toggleClass("d-none");
            }

        </script>
    </body>
</html>