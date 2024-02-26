<div class="modal fade" id="modal-views-borrow">
    <div class="modal-dialog" style="width: 70vw;">
        <div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
                <div class="container-fluid" style="background: rgb(255, 239, 218);">
                    <div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
                    <h4 class="modal-title">View Borrowed</h4>
                </div>
                <div class="modal-body">
                    <!-- main form -->
                        <div class="form-group" style="display: flex; flex-direction:column; gap:15px;">
                        <div style="text-align: center;">
                        <div class="badge" style="background-color: yellowgreen; font-size:1.15em">BORROWED</div>    
                        </div>
                        <br>
                            <div style="display: flex; gap:5px;">
                                <label class="control-label col-sm-3" for="tagID">Tag ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tagborrowID" readonly>
                                </div>
                            </div>
                            <div style="display: flex; gap:5px;">
                                <label class="control-label col-sm-3" for="tagborrowname">Item Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tagborrowname" readonly>
                                </div>
                            </div>
                            <div style="display: flex; gap:5px;">
                                <label class="control-label col-sm-3" for="tagname">Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tagname" readonly>
                                </div>
                            </div>
                            <div style="display: flex; gap:5px;">
                                <label class="control-label col-sm-3" for="tagwhere">Where:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tagwhere" readonly>
                                </div>
                            </div>
                            <div style="display: flex; gap:5px;">
                              <div style="width: 100%;">
                                <label class="control-label col-sm-3" for="tagcontact">Contact No:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tagcontact" readonly>
                                    </div>
                              </div>
                              <div style="width: 100%;">
                                <label class="control-label col-sm-3" for="tagroom">Room:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tagroom" readonly>
                                    </div>
                              </div>
                            </div>

                            <div style="display: flex; gap:5px;">
                              <div style="width: 100%;">
                                <label class="control-label col-sm-3" for="tagcategory">Category:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tagcategory" readonly>
                                    </div>
                              </div>
                              <div style="width: 100%;">
                                <label class="control-label col-sm-3" for="tagquantity">Quantity:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tagquantity" readonly>
                                    </div>
                              </div>
                            </div>
                            <div style="display: flex; gap:5px;">
                              <div style="width: 100%;">
                                <label class="control-label col-sm-3" for="tagcategory">Borrowed Date:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tagBdate" readonly>
                                    </div>
                              </div>
                              <div style="width: 100%;">
                                <label class="control-label col-sm-3" for="tagquantity">Return Date:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tagRdate" readonly>
                                    </div>
                              </div>
                            </div>
                        </div>

                        

                        <div class="form-group" style="padding-bottom: 20px;"> 
                            <div class="col-sm-offset-11 col-sm-10" style="display: flex; gap:50px; ">
                                <button type="button" class="btn btn-secondary" style="background-color: yellowgreen; " data-dismiss="modal" aria-hidden="true">Dismiss</button>
                            </div>
                        </div>
                    
                </div>
        </div>
	</div>
</div>