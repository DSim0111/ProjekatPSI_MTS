<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});
  </script>

<nav class="navbar navbar-expand-lg navbar-dark myNav">
<a class="navbar-brand" href="#">
    <img src="<?php
    echo base_url("images/icons/logo.jpg");
    
    ?>" width="30" height="30" class="d-inline-block align-top" alt="">
   Giftery
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Guest/listShops')?>">Home</a>
      </li>
      
 
    
    </ul>
      <style >
         
      </style> 
    <a   href="<?php echo base_url('Guest/login')?>">
      <button class='btn btn-info '>
          Login
          
      </button>
      &nbsp;
    </a>
      
    <a href="<?php echo base_url('Guest/whoAreYou')?>">
      <button class='btn btn-info '>
        Register
          
      </button>
    </a>
  </div>
</nav>