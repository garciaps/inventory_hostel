<?php 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); 
include_once('../include/banner.php'); 
?>
 <nav class="navbar navbar-navs " style="margin-top:10px;">
    <div class="container-fluid">
     
      <ul class="nav navbar-nav navigation">
 

        <li class="active">
          <a href="user_supplies.php"><span class="glyphicon glyphicon-th-large"></span> Supplies
          </a>
        </li>
        <li>
          <a href="user_tools.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
        </li>

        <li>
          <a href="user_equipment.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
        </li>

        <li >
            <a href="user_borrow.php"><span class="glyphicon glyphicon-list-alt"></span> Transactions</a>
         </li>
        
        <li>
          <a href="user_report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
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
  <script>  </script>
  <style>#alrts{
    display: none;
  }</style>
  <div class="alert alert-success" id="alrts" style="width: 280px;float: right;"><strong> <?php echo $_SESSION['error'];?> </strong> </div>

  <div class="container">


  <div class="panel panel-border">
    
        <div class="panel-heading" style="padding-bottom:30px;">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Supplies
        <div style="display:flex; gap:20px; float:right;">
        <button id="addItem" href="#modal-add-item" data-toggle="modal" type="button" class="btn btn-warning" >
                Add Supplies
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
        </div></div>
  	  			<div class="panel-body">
              <!-- main content -->
                <div id="allItem"></div>
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
		overflow-y:scroll;
	}
</style>
<script>
  $('#alrts').hide();
  var xhr = new XMLHttpRequest();
  let i = true;
  xhr.open("GET",'../data/output.php',true);
  xhr.onreadystatechange = function(){
    if(xhr.readyState === 4 && xhr.status ===200){
      var sessionData = xhr.responseText;
      
      if(sessionData==="The Supply is Already in the Database!"){
        $('#alrts').hide();
        alert(sessionData);
      }else if(sessionData==="Item Added Successfully!"){
        // if(i==true){
          $('#alrts').fadeIn(1000);
          $('#alrts').fadeOut(1000);
        //  i==false;
      } 
      // i=true;
      
    }
  }
  xhr.send();
</script>
</body>
</html>	

