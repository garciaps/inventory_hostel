<?php 
include_once('../data/admin_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); ?>
<?php include_once('../include/banner.php'); ?>

  <nav class="navbar navbar-navs" style="margin-top:10px;">
  	<div class="container-fluid">
      <ul class="nav navbar-nav navigation">
      <li class="active">
          <a href="employee.php"><span class="glyphicon glyphicon-user"></span> Manage Employee</a>
        </li>

  	    <li >
          <a href="item.php"><span class="glyphicon glyphicon-th-large"></span> Supplies
          </a>
        </li>
  	   
        <li>
          <a href="position.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
        </li>

        <li>
          <a href="office.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-list-alt"></span> Transactions <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="user_borrow.php">Active Borrowed</a></li>
          <li><a href="borrowedreturned.php">Borrowed & Returned</a></li>
          <li><a href="addeddeliveredconsumed.php">Added, Delivered, & Consumed</a></li>
          <li><a href="expired.php">Expired</a></li>
          <li><a href="deleted.php">Deleted</a></li>
          <!-- Add more dropdown items if needed -->
        </ul>
      </li>
   
         <li >
            <a href="logs.php"><span class="glyphicon glyphicon-list-alt"></span> Logs</a>
         </li>
  	    <li>
          <a href="report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
        </li>
        
  	  </ul>
  	  </ul>
  	  <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
            <a class="dropdown-toggle" id="admin-account" data-toggle="dropdown" href="#" style="color: black;">
            <span class="glyphicon glyphicon-user" style="margin-right:10px; color: black;"></span>
            <?php echo $_SESSION['user'] ;?>
            <span style="margin-left:10px; color: black;"class="glyphicon glyphicon-chevron-down"></span></a>
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

 			 <div class="panel panel-border">
        <div class="panel-heading" style="padding-bottom:30px;">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Employees
        <div style="display:flex; gap:20px; float:right;">
        <button id="add-employee-menu" href="#modal-add-employee" type="button" data-toggle="modal" class="btn btn-warning" >
                Add Employee
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
        </div></div>
                <div class="panel-body">
                  <!-- main content -->
                  <div id="all_employee"></div>
                  <!-- /main content -->
                  <br />
                </div>
          </div>
  
		    </div>
	  </div>


  </div>
  </div>
<!-- load all modals here -->
<?php require_once('load_modals.php'); ?>
<!-- /load all modals here -->
  

</div>


<?php require_once('../include/footer.php'); ?>
<style>
	body{
    font-size: 16px;
		overflow-y:scroll;
	}
</style>

</body>
</html>	

