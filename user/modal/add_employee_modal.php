<?php 
require_once('../class/Employee.php'); 

$employee = new Employee();  // Assuming your class instantiation was missing
$positions = $employee->employee_positions();
$offices = $employee->employee_offices();
$account_types = $employee->employee_account_types();

?>

<div class="modal fade" id="modal-add-employee">
    <div class="modal-dialog">
        <div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
            <div class="container-fluid" style="background: rgb(255, 239, 218);">
                <div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
                    <h4 class="modal-title">Add Employee</h4>
                </div>
                <div class="modal-body">
                    <!-- main form -->
                    
                    <form class="form-horizontal" role="form" id="add-employee-form">

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="fN">Account Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fN" autofocus pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed">
                        </div>
                    </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="mN">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="mN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="lN">Password:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="lN" 
                                    placeholder="Must have at least 6 characters" minlength="6" required>
                            <span class="show-password-icon" onclick="togglePasswordVisibility('lN')">&#128065;</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="confirmPassword">Confirm Password:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="confirmPassword" 
                                    placeholder="Repeat the password" minlength="6" required>
                            <span class="show-password-icon" onclick="togglePasswordVisibility('confirmPassword')">&#128065;</span>
                            </div>
                        </div>



<style>
.form-group {
 position: relative;
}

.show-password-icon {
    position: absolute;
    top: 50%;
    right: 18px; 
    transform: translateY(-50%);
    cursor: pointer;
}

</style>
<script>
    function togglePasswordVisibility(inputID) {
    var input = document.getElementById(inputID);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
    document.getElementById("add-employee-form").addEventListener("submit", function(event) {
        var password = document.getElementById("lN").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            event.preventDefault();
        }
    });
</script>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>

                        

<script>
    $(document).ready(function () {
        $("#pos").change(function () {
            var selectedPosition = $(this).val();
            var selectedOffice = $("#office").val();

            if (selectedPosition === "Kitchen Clerk") {
                $("#office").val("Kitchen");
            } else if (selectedPosition === "Office Administrator") {
                $("#office").val("Office");
            }

            // If the selected office matches the selected position, swap positions
            if (selectedOffice === "Kitchen" && selectedPosition !== "Kitchen Clerk") {
                $("#pos").val("Office Administrator");
            } else if (selectedOffice === "Office" && selectedPosition !== "Office Administrator") {
                $("#pos").val("Kitchen Clerk");
            }
        });

        // Optional: Reset the position when the office is changed
        $("#office").change(function () {
            var selectedOffice = $(this).val();
            if (selectedOffice === "Kitchen") {
                $("#pos").val("Kitchen Clerk");
            } else if (selectedOffice === "Office") {
                $("#pos").val("Office Administrator");
            }
        });
    });
</script>

<div class="form-group">
    <label class="control-label col-sm-3" for="pos">Position:</label>
    <div class="col-sm-9">
        <select name="pos" class="form-control" id="pos">
            <option value="Kitchen Clerk">Kitchen Clerk</option>
            <option value="Office Administrator">Office Administrator</option>
            <!-- Add more options as needed -->
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-3" for="office">Office:</label>
    <div class="col-sm-9">
        <select name="office" class="form-control" id="office">
            <option value="Kitchen">Kitchen</option>
            <option value="Office">Office</option>
            <!-- Add more options as needed -->
        </select>
    </div>
</div>


                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="container" style="display: flex; gap:30px;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                    <button type="submit" class="btn btn-success" value="addEmployee">Save</button>
                                </div>  
                            </div>
                        </div>
                    </form>
                    <!-- /main form -->
                </div>
            </div>
        </div>
    </div>
</div>