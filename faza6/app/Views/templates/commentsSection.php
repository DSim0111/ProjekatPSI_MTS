

  
           

 
<!--Read comments tab-->
                    <div >
                        <br>
                 
                    
                      <br>
                      <?php
     

                    if(!isset($comments)){

                        echo "There has been an error while retrieving comments";
                        return; 
                            
                    }
                    foreach ($comments as $comment) {
                            echo view("templates/comment", ["comment"=>$comment]); 
                    }
                    ?>
                        

 
                    
                    </div>

<br><br>
<br><br><br>
<br>

