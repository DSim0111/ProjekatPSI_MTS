  
<?php

if(!isset($comment)){
    
    return; 
}
?>
<div class="comment_wrapper 
     <?php
     
     if($i%2==0){
         
         echo 'lighter_blue';
     }else{
         
         echo 'light_blue';
     }
     ?>
     
     "> 
                            <h6 class="comment_person d-inline"><?php echo $comment->username?></h6>
                            <b class="comment_date"> <?php echo $comment->submitDate?></b>
                            <br>
                            <p class="comment_text text-justify"> 
                                <?php echo $comment->commentField?>
                            </p>
</div>
<br> 