<?php ?>






<!DOCTYPE html> 
<html>
    <head> 
        <title> 
            Add product | Giftery 
        </title>
         <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("css/addProduct.css") ?>">
    </head>
    <body>
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>  
         <br>
        <br>
        <br>
        <form class="container myContainer "  method="POST"   enctype="multipart/form-data" action="<?= site_url("Shop/newProductSubmit") ?>">
            
            
            <div class="row">
                <div class="col-sm-12">
                    <h3>Add new product</h3>
                    <hr class="hrWhite">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    &nbsp;
                </div>
            </div>
            <div class="row rowHeight">
                <div class="col-sm-4 ">
    
                    
                    
                     <div class="upload-image-div" id="upload_image_div" align="center"> 
                                <!--Image container-->
                                <p id="upload_image_caption" class="centered-caption">
                                    Upload image
                                </p>
                                   <img id="upload_img">
                                   
                                
                          </div>
                        <br>
                         <input type="file" id="uploadedImage" name="image"> 

                </div>
                
                
                
                <div class="col-sm-4">

                    Product name 
                    <span style='color:red'>*</span>
                    <br>
                    <input type="text" placeholder="Enter name" name="product_name" value="<?php if(isset($_POST['product_name']))echo $_POST['product_name'];?>">
                     <?php if(isset($product_name)) echo "<br><span style='color:red'>$product_name</span></center>";?>
                    <br>
                    <br>
                    Product code
                    <span style='color:red'>*</span>
                    <br>
                    <input type="text" placeholder="Enter code" name="product_code" value="<?php if(isset($_POST['product_code']))echo $_POST['product_code'];?>">
                       <?php if(isset($product_code)) echo "<br><span style='color:red'>$product_code</span></center>";?>
                     <?php if(isset($non_unique)) echo "<br><span style='color:red'>That code is already taken</span></center>";?>
                    <br>
                    <br>
                    Price
                    <span style='color:red'>*</span>
                    <br>
                    <input type="text" placeholder="Enter price" name="product_price" value="<?php if(isset($_POST['product_price']))echo $_POST['product_price'];?>">
                       <?php if(isset($product_price)) echo "<br><span style='color:red'>$product_price</span></center>";?>
                  


                </div>
            </div>
                <div class="row text-left" align="center">
                    
                    <p class="float-left  col-sm-12 ">Product description</p>
                    
                </div>
                <div class="row text-left col-sm-9" align="center">
                    <br>
                    
                    <textarea placeholder="Enter description" name="product_desc" value=""><?php if(isset($_POST['product_desc']))echo $_POST['product_desc'];?></textarea>
                    
                   <?php if(isset($product_desc)) echo "<p style='color:red'>$product_desc </p></center>";?>
                </div>
               

            

            <div class="row">
                <div class="col-sm-12">

                    &nbsp;

                </div>
            </div>
            <div class="row" align="right">
                <div class="col-sm-12">
                    <br>
                    <button class="btn SaveBtn">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <br>
        <br>
        <br>
    </body>
    <script> 
            
        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
		  //id gde hoces da ti se vidi slika kad uploud radis
          reader.onload = function(e) {
             $('#upload_img').attr('src', e.target.result).addClass("w-100");

              $("#upload_image_caption").addClass("d-none");
          };

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
   
    $("#uploadedImage").change(function() {
        // get the file name, possibly with path (depends on browser)
      
         
        var filename = $("#uploadedImage").val();

        // Use a regular expression to trim everything before final dot
        var extension = filename.replace(/^.*\./, '');
        switch(extension){
            case 'jpg': case 'png': case'gif': case'jpeg': case 'tiff': break; 
            default: 
            $('#upload_img').attr('src', '').addClass("w-100");

            $("#upload_image_caption").empty().text("Only images allowed.").removeClass("d-none");
            $("#uploadedImage").wrap('<form>').closest('form').get(0).reset();
                $("#uploadedImage").unwrap();
         
            return; 
        }

      readURL(this);
    });
    
     </script>  
</html> 