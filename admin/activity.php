<?php
include_once('../data/admin_session.php'); //check if naay session otherwise e return sa login
require_once "../class/Activity.php";
include_once('../include/header1.php'); ?>

<?php include_once('../include/banner1.php'); ?>

<nav class="navbar navbar-navs" style="margin-top:10px;">
    <div class="container-fluid d-flex justify-content-start">

        <ul class="nav navbar-nav navigation d-flex flex-row justify-content-start" style="font-size: 1.17em;">
            <li>
                <a href="employee.php"><span class="glyphicon glyphicon-user"></span> Manage Employee</a>
            </li>

            <li>
                <a href="item.php"><span class="glyphicon glyphicon-th-large"></span> Supplies
                </a>
            </li>

            <li>
                <a href="position.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
            </li>

            <li>
                <a href="office.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
            </li>

            <li>
                <a href="user_borrow.php"><span class="glyphicon glyphicon-list-alt"></span> Transactions</a>
            </li>
            <li class="active">
                <a href="activity.php"><span class="glyphicon glyphicon-list-alt"></span> Activity Log</a>
            </li>



            <li>
                <a href="report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
            </li>
            <li>
          <a href="logs.php"><span class="glyphicon glyphicon-list-alt"></span> Logs</a>
        </li>
            <li class="nav-item dropdown" style="position:absolute; right: 35px;">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="glyphicon glyphicon-user" style="margin-right:10px; color: black;"></span>
                    <?php echo $_SESSION['user']; ?>
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
            <div class="panel-heading  d-flex" style="padding-top:20px; padding-bottom:30px;">
                <div class="container " style="padding-top:10px; font-size: 16px;">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Activity Logs
                </div>
                <div class="container d-flex justify-content-end "style="padding-top:10px; font-size: 16px;">
                    <div>
                        <form  id="date-sorts-activity" class="container-fluid p-0 m-0" style="display:flex;
    justify-content: space-evenly;
    z-index: 3; align-items: center; gap:2px;">
                            <label for="From">From: </label>
                            <input type="date" name="From" id="From" class="form-control">
                            &nbsp;
                            <label for="To">To: </label>
                            <input type="date" name="To" id="To" class="form-control">
                            <button class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body">
              
                <!-- main content -->
                <div id="activity">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php
                       $data = $act->showLogs();
                        if(isset($_GET['From'])){
                            if($_GET['From'] && $_GET['To']){
                                $data = $act->sorted($_GET['From'],$_GET['To']);
                            }
                        }else{
                            $data = $act->showLogs();
                        }
                        
                        if($data){
                        foreach ($data as $r) {

                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $r['id']; ?>" aria-expanded="false" aria-controls="flush-collapse<?= $r['id']; ?>">
                                        <div class="container-fluid d-flex justify-content-around">
                                            <div class="container-fluid">
                                                <h6> <?= $r['date']; ?></h6>
                                            </div>
                                            <div class="container-fluid">
                                                <h6><strong> <?= $r['user']; ?></strong></h6>
                                            </div>
                                            <div class="container-fluid">
                                                <h6> <?php $oras = $r['time']; echo date('h:i:s a', strtotime($oras));?></h6>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapse<?= $r['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Item</th>

                                                <th>Quantity</th>
                                                <th>Category</th>

                                                <th>Status</th>
                                                <th>Condition</th>
                                            </tr>

                                            <?php
                                            date_default_timezone_set('Asia/Manila');

                                            $date = date("Y-m-d");
                                            $res = $act->showreport($r['user'], $r['date']);
                                            if ($res) {
                                                foreach ($res as $i) {
                                            
                                            ?>

                                                    <tr>
                                                        <td><?= $i['tagid']; ?></td>
                                                        <td><?= $i['item']; ?></td>

                                                        <td><?= $i['quantity']; ?></td>
                                                        <td><?= $i['category']; ?></td>

                                                        <td><?= $i['status']; ?></td>
                                                        <?php if($i['conditions']){?>
                                                        <td><?=$i['conditions']; ?></td>
                                                        <?php }else{ ?>
                                                        <td class="ps-3">-</td>

                                                        <?php } ?>
                                                    </tr>
                                            <?php }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>0 results</td></tr>";
                                            } ?>
                                        </table>



                                    </div>
                                </div>
                            </div>
                        <?php }}else{
                            // echo "Mayo Laman";
                            echo "<div class='container-fluid text-center display-6 pt-5 ' style='font-Style:italic';><span class='text-danger'>----- </span>No Logs For This Date<span class='text-danger'> -----</span></div>";
                        } ?>
                       
                    </div>
                </div>
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


<?php require_once('../include/footer1.php'); ?>
<style>
    body {
        overflow-y: scroll;
    }
</style>
<!-- <script>
$(document).on('submit', '#date-sorts-activity', function(event) {
	event.preventDefault();


    let fromDate = $("#FromActivity").val()
    let toDate = $("#ToActiity").val()

         
    if(fromDate && toDate){
      $.ajax({
                url: '../data/add_activity.php',
                type: 'post',
                data: {
                    // datas: JSON.stringify(data)
                
                    fromDates:fromDate,
                    toDates:toDate,
                 
                },
                success: function(event){
               
                    console.log(event);
					
                },
                error: (err)=>{
					console.log("Error",err);
              
				}
            });
    
    }else{
      $.ajax({
                url: '../data/add_activity.php',
                type: 'post',
                data: {
                    // datas: JSON.stringify(data)
                    // choice: choices,
                 
                },
                success: function(event){
                    // $('#show-report').html(event);
                },
                error: (err)=>{
					console.log("Error",err);
              
				}
            });
    
    }
   

}); -->
</script>
</body>

</html>