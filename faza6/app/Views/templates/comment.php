  
<?php

if(!isset($comment)){
    
   return; 
}

?>
 
<div class="comment_wrapper comment_wrapper_bright"> 
                            <h6 class="comment_person d-inline"><?php echo $comment->username?></h6>
                            <b class="comment_date"> <?php echo $comment->submitDate?></b>
                            <br>
                            <p class="comment_text text-justify"> 
                                <?php echo $comment->commentField?>
                            </p>
</div>
<br> 