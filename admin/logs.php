<?php 
include_once('../data/admin_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); ?>
<?php include_once('../include/banner.php'); ?>

  
  <nav class="navbar navbar-navs " style="margin-top:10px;">
  	<div class="container-fluid">
   	 
  	  <ul class="nav navbar-nav navigation">
    <li>
        <a href="employee.php"><span class="glyphicon glyphicon-user"></span> Manage Employee</a>
    </li>
    <li>
        <a href="item.php"><span class="glyphicon glyphicon-th-large"></span> Supplies</a>
    </li>
    <li>
        <a href="position.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
    </li>
    <li>
        <a href="office.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
    </li>
    <li >
            <a href="user_borrow.php"><span class="glyphicon glyphicon-list-alt"></span> Transactions</a>
         </li>
         <li >
            <a href="logs.php"><span class="glyphicon glyphicon-list-alt"></span> Logs</a>
         </li>
  
    <li>
        <a href="report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
    </li>
</ul>
  	   <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
            <a class="dropdown-toggle" id="admin-account" data-toggle="dropdown" href="#" style="color: black;">
            <span class="glyphicon glyphicon-user" style="margin-right:10px; color: black;"></span>
            <?php echo $_SESSION['user'] ;?>
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


  <div class="panel panel-border" >
  <div class="panel-heading" style="padding-bottom:30px;">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Logs

        
    </div>
    <div style="position: absolute; margin-top: -45px; margin-left: 34%;">
        <form id="date-sorts-logs" class="container-fluid p-0 m-0" style="display:flex;
        justify-content: space-evenly;
        z-index: 3; align-items: center; gap:2px;">
                                <label for="From">From: </label>
                                <input type="date" name="From" id="From1" class="form-control">
                                &nbsp;
                                <label for="To">To: </label>
                                <input type="date" name="To" id="To1" class="form-control">
                                <button class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
                            </form>
    </div>
  	  			<div class="panel-body">
              <!-- main content -->
                <div id="alllogs"></div>
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
        //display all item
function show_all_logs()
{
	$.ajax({
		url: '../data/show_logs.php',
	
		async: false,
		success: function(event){
			$('#alllogs').html(event);
		},
		error: function(){
			alert('Error: show all item L100+');
		}
	});

	
}
show_all_logs();
$(document).on('submit', '#date-sorts-logs', function(event) {
	event.preventDefault();
	// /* Act on the event */
    let fromDate = $("#From1").val()
    let toDate = $("#To1").val()
	
   
        $.ajax({
                url: '../data/show_logs.php',
                type:'post',
                data: {
                    // datas: JSON.stringify(data)
                    toDates:toDate,
                    fromDates:fromDate,
                  
                },
                success: function(event){
               
                    $('#alllogs').html(event);
					
                },
                error: (err)=>{
					console.log("Error",err);
              
				}
            });
	

});


    </script>
</body>
</html>	

