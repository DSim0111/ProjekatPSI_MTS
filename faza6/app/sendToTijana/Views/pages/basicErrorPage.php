<html> 
    <head> 
        
        <title> Giftery |Error</title>
    </head>
    <body> 
        
        <div class="container myContainer"> 
            <br>
            <br>
            <br>
            <br> 
            <br>
            <br>
            <br>
            <br> 
            <div class="row">
                <div class="offset-sm-2 col-sm-8"> 
                
                <?php
                if(isset($error)){
                    
                    echo $error; 
                }else{
                    
                    echo "Sorry, there has been an error";
                }
                
                ?>
                </div>
                
            </div>
            
        
        </div>
    </body>
</html>
