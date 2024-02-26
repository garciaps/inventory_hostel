<script type="text/javascript" src="../assets/js/pass.js"></script>
<script type="text/javascript" src="../assets/js/main.js"></script>
   <script type="text/javascript" src="../assets/js/reports.js"></script>
   <script type="text/javascript" src="../assets/js/equipment.js"></script>

   <script type="text/javascript" src="../assets/js/main2.js"></script>
             
             
   <div id="modal-add-borrower" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content -->
                        <div class="container-fluid" style="background: rgb(255, 239, 218);">
                            <div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Borrower</h4>
                            </div>
                            <div class="modal-body">
                                <form action="borrow_function.php" method="post">
                                    <input type="hidden" name="operation" value="insert" /> 
                                <div class="form-group">
                                    <label for="inputName">Name:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="inputDepartment">Department:</label>
                                    <input type="text" class="form-control" name="department" placeholder="Enter department">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" >Save</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
