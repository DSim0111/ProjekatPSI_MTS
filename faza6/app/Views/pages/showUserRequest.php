<?php ?>

<!DOCTYPE html> 
<html>
    <head> 
        <title> 
            Shop requests | Giftery 
        </title>
          <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("css/showUserRequest.css")?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body> 
         <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>  
        <div class=" myContainer container ">
             <div class="row"> 
                 <div class="col-sm-12 requestsContainer"> 
                     
               <h1> User requests</h1>
               <center>
                   <a href='<?= base_url("Shop/showUnhandledDeliveryRequests")?>'>
               <button class='btn btn-danger functions'>Unhandeled requests</button>
                   </a>
                    <a href='<?= base_url("Shop/showHandledDeliveryRequests")?>'>
               <button class='btn btn-danger functions'>Handeled requests</button>
                    </a>
               </center>
                  <hr class="whiteHr">
                  <br>
                  <br>
                  <?php foreach ($requests as $request){ ?>
                  <h3>Request ID:<?php echo $request->idDelReq; ?></h3>
                  <div class='row'> 
                      <div class='col-sm-12 requestEnvelope' align='center'>
                         <h4 class='float-left'><i>Info about user</i></h4> 
                         <?php if($unhandled==true){?>
                          <a href='<?= base_url("Shop/changeStateToCancelled/{$request->idDelReq}")?>'>
			<button class='btn btn-danger inline float-right declineBtn'>Decline</button>
                          </a>
                        <a href='<?= base_url("Shop/changeStateToDelivered/{$request->idDelReq}")?>'>
                         <button class='btn btn-info inline float-right  acceptBtn' >Marked as delivered</button>
                         
                        </a>
                         <?php }?>
                         <br>
                         <br>
                         <br>

                          
                          <table class='table table-striped table-light text-center myTable '> 
                              <thead class='thead'> 
                                  <th> 
                                      Username
                                  </th>
                                  <th> 
                                      Name 
                                  </th>
                                  <th> 
                                      Surname
                                  </th>
                                  <th>
                                      Address
                                  </th> 
                                  <th> 
                                      Payment method
                                  </th>
                                  <th> 
                                      Date submitted
                                  </th>
                                  <th> 
                                      Time
                                  </th>
                              </thead>
                              <tbody class='align-middle'> 
                                  <td>
                                <?php echo  $request->username ;?>
                                  </td>
                                  <td> 
                                    <?php echo $request->name; ?>
                                  </td>
                                  <td> 
                                       <?php echo $request->surname; ?>
                                  </td>
                                  <td>
                                       <?php echo $request->address; ?>
                                  </td> 
                                  <td> 
                                       <?php echo $request->payment; ?>
                                  </td>
                                  <td> 
                                     <?php echo $request->submitDate; ?>
                                  </td>
                                  <td>
                                      <?php echo $request->submitTime; ?>
                                  </td> 

                              </tbody>
                          </table>

                          <br> 
                          <h4 class='float-left'><i>Products ordered</i></h4>
                          <!--Requested-->
                          <table class='table table-striped table-light text-center myTable'>
                              <thead class='thead'> 
                                  <th>
                                      Product code
                                  </th>
                                  <th> 
                                      Image
                                  </th>
                                  <th>
                                    Product name
                                </th>
                                  <th>
                                      Quantity
                                  </th>
                                  

                              </thead>
                         <tbody>
                             <?php foreach($requestedProducts[$request->idDelReq] as $product){?>
                             <tr>
                              <td> 
                               <?php echo  $product->code ;?>
                              </td>
                              <td>
                                <img src='<?= base_url('uploads/'.$product->image)?>' class='productImage'> 
                              </td>
                              <td> 
                                  <?php echo  $product->name ;?>
                              </td>
                              <td> 
                                   <?php echo  $product->quantity ;?>
                              </td>
                            </tr>
                           
                            <?php }?>
                            </tbody>
                              
                         </table>
                         <h4> 
                             Info about delivery
                         </h4>
                         <table class='table table-striped table-light text-center myTable'>
                            <thead class='thead'> 
                                <th>
                                    Name 
                                </th>
                                <th> 
                                    Surname
                                </th>
                                <th>
                                  Address for delivery
                              </th>
                                <th >
                                    Date of delivery
                                </th>                                
                                <th>
                                    Time of delivery 
                                </th> 
                                <th> 
                                    Note 
                                </th>

                            </thead>
                       <tbody>
                         <tr> 
                             <td><?php echo $request->receiverName; ?></td>
                             <td><?php echo $request->receiverSurname;?></td>
                             <td> 
                                 <?php echo $request->address;?>
                             </td>
                             <td>
                                 <?php echo $request->deliverDate;?>
                             </td>
                             <td> 
                                <?php echo $request->deliverTime;?>
                             </td>
                             <td class='text-justify'> 
                                  <?php echo $request->notes;?>
                             </td>
                         </tr>
                         
                         
                          </tbody>
                            
                       </table>
                           <h4> 
                            AddOns for this request
                         </h4>
                           <table class='table table-striped table-light text-center myTable'>
                            <thead class='thead'> 
                                <th> 
                                    AddOn image
                                </th>
                                <th>
                                  AddOn name
                              </th>
                               

                            </thead>
                       <tbody>
                           <?php foreach($requestedAddOns[$request->idDelReq] as $addOn){?>
                         <tr> 
                             <td>  <img src='<?= base_url('uploads/'.$addOn->image)?>' class='productImage'> </td>
                             <td> 
                                 <?php echo $addOn->name;?>
                             </td>
                            
                         </tr>
                           <?php }?>
                         
                          </tbody>
                            
                       </table>

                          

                      </div>


                      
                  </div>
                  <?php }?>
                  

                        

            </div>


                    
            </div>
         </div>
        
    </body>
</html> 
