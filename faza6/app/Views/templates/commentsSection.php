

  
           

 
<!--Read comments tab-->
                    <div >
                        <br>
                 
                    
                      <br>
                      <?php
     

                    if(!isset($comments)){

                        echo "There has been an error while retrieving comments";
                        return; 
                            
                    }
                     $i=0; 
                    foreach ($comments as $comment) {$i++;
                            echo view("templates/comment", ["comment"=>$comment, "i"=>$i]); 
                    }
                    ?>
                        

 
                    
                    </div>

<br><br>
<br><br><br>
<br>

