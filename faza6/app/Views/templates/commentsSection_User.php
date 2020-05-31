   <?php $addCommentActiveCond= isset($commentField);?>
             <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link <?php if(!$addCommentActiveCond) echo 'active';?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Comments</a>
                      <a class="nav-item nav-link <?php if($addCommentActiveCond) echo 'active';?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Add comment</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Rate shop</a>
                    </div>
                  </nav>
  

<!--TABS CONTENT-->
   <div class="tab-content" id="nav-tabContent">
<!--Read comments tab-->
                    <div class="tab-pane fade <?php if(!$addCommentActiveCond) echo 'show active';?> " id="nav-home" name="comment_content_div" role="tabpanel" aria-labelledby="nav-home-tab">
                        <br>
                 
                    
                      <br>
                      <?php
     

                    if(!isset($comments)){

                        echo "There has been an error while retrieving comments";
                        return; 
                            
                    }$i=0; 
                    foreach ($comments as $comment) {$i++;
                            echo view("templates/comment", ["comment"=>$comment, "i"=>$i]); 
                    }
                    ?>
                        

 
                    
                    </div>

<!--Add comment tab-->

                    <div class="tab-pane fade <?php if($addCommentActiveCond) echo ' show active';?>  " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <br>

                        <div class="add_comment_content">
                               
                              
                                <form method="POST" action="<?php echo base_url("User/addCommentSubmit?shopId=".$shop->id); ?>">

                                    Enter comment here: 
                                    <br>
                                    <input type="hidden" name="shopId" value="<?php echo $shop->id;?>" >
                                    <input type="text" maxlength='200' name="commentField" class="add_comment_area lighter_blue" cols="120" rows="5">
                                   <?php if(isset($commentField))echo "<p class='errorMessage'>".$commentField."</p>"; ?><br><br>
                                  
                                    <button type="submit" class="btn btn-primary margin-auto"  >Submit</button>
                                </form>
                       

                      </div>



                    </div>

<!--Rate tab-->

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <br>

                        <div class="add_comment_content">
                   
                        <form name='ratingSubmit' method="POST" action="<?php echo base_url('User/ratingSubmit')?>"> 
                             <?php   if(isset($errorRating)){ echo "<p class='errorMessage'>".$errorRating."</p>"; echo "Rate" ;}
                                     else if( isset($rating)){ echo "<p class='successMessage'> You rated this shop with ".$rating->rating."</p>"; echo "Change";}else{echo "Rate";}?>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rating1" value="1" name="rating">
                                    <label class="custom-control-label" for="rating1">1</label>
                                </div>
                    
            
                                <!-- Default unchecked -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rating2" value="2" name="rating">
                                    <label class="custom-control-label" for="rating2">2</label>
                                </div>
                                <!-- Default unchecked -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rating3"  value="3" name="rating">
                                    <label class="custom-control-label" for="rating3">3</label>
                                 </div>

                                    <!-- Default unchecked -->
                                    <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rating4"value="4" name="rating">
                                    <label class="custom-control-label" for="rating4">4</label>
                                     </div>
                                   <!-- Default checked -->
                                   <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rating5" value="5" name="rating" checked>
                                    <label class="custom-control-label" for="rating5">5</label>
                                     </div> <input type="hidden" name="shopId" value="<?php echo $shop->id?>">
                            <button class="btn btn-primary margin-auto" type="submit" >Submit</button>
                        </form>
                    </div>


                    </div>
                  </div>
<br><br>
<br><br><br>
<br>

