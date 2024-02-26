<?php 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); ?>
<?php include_once('../include/banner.php'); ?>

  <nav class="navbar navbar-navs" style="margin-top:10px;">
  	<div class="container-fluid">
   	 
    <ul class="nav navbar-nav navigation">


        <li >
          <a href="user_supplies.php"><span class="glyphicon glyphicon-th-large"></span> Supplies
          </a>
        </li>
        <li >
          <a href="user_tools.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
        </li>

        <li>
          <a href="user_equipment.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
        </li>

        <li >
            <a href="user_borrow.php"><span class="glyphicon glyphicon-list-alt"></span> Transactions</a>
         </li>
        
        <li  class="active">
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
  <div class="container">

 			 <div class="panel panel-border">

 			 	<div class="panel-heading" style="padding-bottom:30px;">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        All Item Status Report
        <div style="display:flex; gap:20px; float:right;">
        <h4>
          <?php echo date('D, M d, Y');?>
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
              <b>Filter:</b> &nbsp &nbsp
                <select class="btn btn-default" id="report-choice">
                  <option value="all">All</option>
                  <option value="Supplies">Supplies</option>
                  <option value="Tools">Tools</option>
                  <option value="Equipment">Equipment</option>
                  <option value="Borrowed">Borrowed</option>
                  <option value="Expired">Expired</option>
                </select>
                
               
               <input type="hidden" id="output-val" value="all">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                 <div style=" display:flex;

position: right: 130px; z-index: 3; align-items: center;">
    <form id="date-sorts" class="container-fluid p-0 m-0" style="display:flex;

justify-content: space-evenly;
z-index: 3; align-items: center; gap:2px;">
                <label for="From">From: </label>
                <input type="date" name="From" id="From" class="form-control">
                &nbsp;
                <label for="To">To: </label>
                <input type="date" name="To" id="To" class="form-control">
                <button class="btn btn-warning" ><span class="glyphicon glyphicon-search"></span></button>
                </form>
                <button class="btn btn-success" id="refresh-btn" onclick="show_report()"><span class="glyphicon glyphicon-refresh"></span></button>
              </div>
              </div>
            
              <!-- <div class="line" style="height: 5px; width: 10vw;
                 background-color: white; position: absolute; right:420px; margin-top:-25px;"></div> -->
                <div id="show-report"></div>

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
    font-size: 16px;
}
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
  
$(document).on('change', '#report-choice', function(event) {
	event.preventDefault();
  

  var choice = $('#report-choice').val();
	let fromDate = $("#From").val()
    let toDate = $("#To").val()
    var choices =  $("#output-val").val(choice);
    
    if(fromDate && toDate){
        $.ajax({  
        url: '../data/show_report.php',
        type: 'post',
        data: {
          choice: choices,
          fromDates:fromDate,
          toDates:toDate,
          status:false

        },
        success: function (data) {

          $('#show-report').html(data);
        },
        error: function(){
          alert('Error: L825+');
        }
      });
    }else{
      $.ajax({  
			url: '../data/show_report.php',
			type: 'post',
			data: {
				choice: choices,
			},
			success: function (data) {

				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: L825+');
			}
		});
    }
  
 

})




$(document).on('submit', '#date-sorts', function(event) {
	event.preventDefault();


    let fromDate = $("#From").val()
    let toDate = $("#To").val()
    var choices =  $('#report-choice').val();
    console.log("Date Sorts ", fromDate,"TO DATE",toDate,choices)
         
    if(fromDate && toDate){
      $.ajax({
                url: '../data/show_report.php',
                type: 'post',
                data: {
                    // datas: JSON.stringify(data)
                    choice: choices,
                    fromDates:fromDate,
                    toDates:toDate,
                    status:true
                },
                success: function(event){
               
                    $('#show-report').html(event);
					
                },
                error: (err)=>{
					console.log("Error",err);
              
				}
            });
    
    }else{
      $.ajax({
                url: '../data/show_report.php',
                type: 'post',
                data: {
                    // datas: JSON.stringify(data)
                    choice: choices,
                 
                },
                success: function(event){
               
                    $('#show-report').html(event);
					
                },
                error: (err)=>{
					console.log("Error",err);
              
				}
            });
    
    }
   

});


$('#print-btn').click(function(event) {
	/* Act on the event */
	var choice = $('#report-choice').val();
	let fromDate = $("#From").val()
  let toDate = $("#To").val()
  if(fromDate && fromDate ){
	    window.open('../data/print.php?choice='+choice+'&from='+fromDate+'&to='+toDate,'name','width=600,height=400');
  }else{
    	window.open('../data/print.php?choice='+choice+'&from=NULL&to=NULL','name','width=600,height=400');

  }
  
});
</script>
</body>
</html>	

