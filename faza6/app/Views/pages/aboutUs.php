
<html>
    <head> 
        <title>
             About us| Giftery 
        </title>
        <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    <body>
        
        <?php
        
        if(isset($header)){
            
            echo view($header);
            
        }
        
        ?>
        <style>
            
            .team-member{
                
                background-color:#f0efeb;
                width:80%; 
                position: relative; 
                margin:auto;
                
                border-radius:5px; 
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                padding:10px;
                padding-top:15px;
            }
            .middle{
                
                position:relative; 
                margin:auto;
            }
            .avatar{
                
                   width:90%;  
                     padding:5px;
                  
                  border:1px solid black;
                   border-radius:50%;
                margin-bottom:10px;
            }
            
        </style>
        <div class="container"> 
            <div class="row"> 
                <div class="col-sm-12" > 
                    <center><img src="<?php  echo base_url("images/icons/logo.jpg");?>"></center>
                    <p class='text-justify'>
                     We are a team of independent developers, happy to work with each other. 
                     Our goal is to improve quality of people's lives by using our knowledge and creativity. 
                      We believe details are important. We offer our customers a way to make lives of their loved ones happier. 
                      Our customers are rather earned than bought by quality of service, diverse products for everyone's taste and ability to customize presents to their own measures. 
                        We focus on building safe and simple communication between shops and customers by engaging technical staff 
                        in monitoring consistency and quality of our shops' work.
                    </p>
                    <h3><i>Our team</i></h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-12" >
                            
                            <div class="team-member" align="center"> 
                                 <img  class="avatar" src="<?php echo base_url('images/milanAvatar.png')?>"> 
                           
                                 <center> <h4>Milan Lazić</h4></center>
                                  <p>Developer</p>
                            </div>
                        </div>
                          <div class="col-md-4 col-sm-12">
                            
                            <div class="team-member" align="center"> 
                                <img class="avatar" src="<?php echo base_url('images/tijanaAvatar.png')?>"> 
                                
                                <center> <h4>Tijana Ranković</h4></center>
                                <p>Team leader and our main designer</p>
                            </div>
                        </div>
                          <div class="col-md-4 col-sm-12" >
                            
                            <div class="team-member" align="center"> 
                                <img class="avatar" src="<?php echo base_url('images/simonaAvatar.png')?>"> 
                               
                                <center><h4>Simona Denić</h4></center>
                                  <p>Developer</p>
                            </div>
                        </div>
                    
                    
                    </div>
                
                
                </div>
            
            </div>
            
        
        </div>
        
        
    </body>
    
    
</html>