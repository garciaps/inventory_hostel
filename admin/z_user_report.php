<?php 
include_once('../data/admin_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); ?>
<?php include_once('../include/banner.php'); ?>
<?php include_once('../class/Login.php'); ?>


  <nav class="navbar navbar-navs" style="margin-top:10px;">
  	<div class="container-fluid">
   	 
    <ul class="nav navbar-nav navigation">

  	    <li >
          <a href="z_user_item.php"><span class="glyphicon glyphicon-object-align-vertical"></span> Supplies
          </a>
        </li>
  	    
  	   
        <li >
          <a href="z_user_position.php"><span class="glyphicon glyphicon-tasks"></span> Tools</a>
        </li>

        <li >
          <a href="z_user_office.php"><span class="glyphicon glyphicon-home"></span> Equipment</a>
        </li>
  	    <li class="active">
          <a href="z_user_report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
        </li>
  	  </ul>
  	 <ul class="nav navbar-nav navbar-right " >
         <li class="dropdown">
            <a class="dropdown-toggle" id="admin-account" data-toggle="dropdown" href="#" style="color: black;">
            <span class="glyphicon glyphicon-user" style="margin-right:10px; color: black;"></span> Employee<span style="margin-left:10px; color: black;"class="glyphicon glyphicon-chevron-down"></span></a>
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

 			 	<div class="panel-heading" style="padding-bottom:30px;">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        All Item Status Report
        <div style="display:flex; gap:20px; float:right;">
        <h4>
          <?php echo date('D,M d, Y');?>
        </h4>
        <button id="print-btn" type="button" class="btn btn-success" >
                PRINT
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                </button>
                <button id="dels-btn" type="button" class="btn btn-danger"  onclick="deleteAllReport()">
                DELETE
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
        </div></div>
  	  			<div class="panel-body">
              <!-- main content -->
              <div class="container-fluid" style="margin:0; padding:0; display: flex; width:50vw;">
              <b>Filter:</b>
                <select class="btn btn-default" id="report-choice">
                  <option value="all">All</option>
                  <option value="Supplies">Supplies</option>
                  <option value="Tools">Tools</option>
                  <option value="Equipment">Equipment</option>
                  <option value="Borrowed">Borrowed</option>
                </select>
                
               
                <div class="dateSorter" style=" display:flex;
                width: 20%;
    justify-content: space-evenly;
    position:absolute; right: 320px; z-index: 3;">
                 
                  <input type="radio" name="dates" class="rad" value="Daily" style=" accent-color: rgb(3, 130, 0);">
                  <input type="radio" name="dates" class="rad" value="Weekly" style=" accent-color: rgb(3, 130, 0);">
                  <input type="radio" name="dates" class="rad" value="Monthly" style=" accent-color: rgb(3, 130, 0);">
                
                </div>
               <div class="contanerlabels">
                <p>Daily</p>
                <p>Weekly</p>
                <p>Monthly</p>
               </div>
              </div>
              <div class="line" style="height: 5px; width: 10vw;
                 background-color: white; position: absolute; right:420px; margin-top:-25px;"></div>
                <div id="show-report"></div>

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
<style>
  .contanerlabels{
    position: absolute;
    right: 420px;
    margin-top: 20px;
	display:flex;
	gap:30px;
}
.contanerlabels> p{
  font-weight: bolder;
}
</style>
<script>
  
</script>
</body>
</html>	

