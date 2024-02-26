<?php 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); ?>
<?php include_once('../include/banner.php'); ?>

  <nav class="navbar navbar-navs " style="margin-top:10px;">
  	<div class="container-fluid">
   	 
  	  <ul class="nav navbar-nav navigation">
  	    <li class="active">
          <a href="z_user_item.php"><span class="glyphicon glyphicon-object-align-vertical"></span> Supplies
          </a>
        </li>
  	    
  	   
        <li>
          <a href="z_user_position.php"><span class="glyphicon glyphicon-tasks"></span> Tools</a>
        </li>

        <li>
          <a href="z_user_office.php"><span class="glyphicon glyphicon-home"></span> Equipment</a>
        </li>
  	    <li>
          <a href="z_user_report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
        </li>
  	  </ul>
  	   <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
           <a class="dropdown-toggle" id="admin-account" data-toggle="dropdown" href="#" style="color: black;">
            <span class="glyphicon glyphicon-user" style="margin-right:10px; color: black;"></span> 
            <span><?php echo $_SESSION['user'] ;?> </span>
            <span style="margin-left:10px; color: black;"class="glyphicon glyphicon-chevron-down"></span></a>
          </a>
            <ul class="dropdown-menu"> 
            <li><a onclick="$('#modal-changepasss').modal('show')" data-toggle="modal">Change Password</a></li>
              <li><a href="../data/admin_logout.php">Logout</a></li>
            </ul>
          </li>
      </ul>
 	 </div>
	</nav>
  <div class="container-fluid navbar-navs" style="margin-top: 10px; padding:15px; height: 110vh;">
  <div class="container">
	<div id="right_content" >
		<div class="panel-group">
 			 <div class="panel panel-border">

 			 	<div class="panel-heading">
        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
        Supplies</div>
  	  			<div class="panel-body">
              <!-- main content -->
                <div id="allItem"></div>
              <!-- /main content -->
              <br />
  	  			</div>
 			 </div>
  
		</div>
	</div>

<!-- navigation menu -->
<?php require_once('z_user_side-menu.php'); ?>
<!-- navigation menu -->
  </div>
  </div>
<!-- load all modals here -->
<?php require_once('load_modals.php'); ?>
<!-- /load all modals here -->
  

</div>


<?php require_once('../include/footer.php'); ?>

</body>
</html>	

