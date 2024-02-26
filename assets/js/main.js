var valid = true;
var action = '';


$(document).on('submit', '#add-item-form', function(event) {
	// event.preventDefault();
	/* Act on the event */

	var validate = 0;
	var form_data = new Array(
								$('input[id=tagID]'),
								$('input[id=supplyname]'),
								$('input[id=room]'),
								$('input[id=Expiry]'),
								$('#Unit'),
								$('input[id=brand]'),
								$('input[id=quantity]'),
								$('input[id=unitValue]')
								
							);


	var data = new Array(form_data.length);

	for(var i = 0; i < form_data.length; i++){
		if(form_data[i].val().length == 0){
			form_data[i].parent().parent().addClass('has-error');
		}else{
			form_data[i].parent().parent().removeClass('has-error');
			data[i] = form_data[i].val();
			validate += i;
		}
	}

	if(validate != ''){
		$.ajax({
			url: '../data/addItem.php',
			type: 'post',
			dataType: 'json',
			data: {
				data: JSON.stringify(data)
			},
			success: function(event){
				console.log(event);
				// if(event.valid == valid){
					$('#modal-add-item').modal('hide');
					$('#add-item-form').trigger('reset');
					$('#modal-message-box').modal('show');
					$('#modal-message-box').find('.modal-body').text(event.msg);
					action = event.action;
					show_all_item();
				// }
			}
		});//end ajax
	}//end validate
});//subm


//display all item
function show_all_item()
{
	$.ajax({
		url: '../data/show_all_item.php',
		type: 'post',
		async: false,
		success: function(event){
			$('#allItem').html(event);
		},
		error: function(){
			alert('Error: show all item L100+');
		}
	});

	
}

show_all_item();


function fill_update_modal(iID){
	
	$('#modal-update-item').modal('show');
	$.ajax({
			url: '../data/item_profile.php',
			type: 'post',
			dataType: 'json',
			data: { iID: iID},
			success: function (data) {
                
				$('#iIds1-update').val(data.id)//iID
				$('#tagID-update').val(data.tagid);
				$('#supplyname-update').val(data.supplyname);
				$('#room-update').val(data.room);
				$('#room-updates-tools').val(data.room).change();
				$('#brand-update').val(data.brand);
				
			
               

			},
			error: function (){
				alert('Error: fill_update_modal L172+');
			}
		});

}




//UPDATE ITEM
// e update ang data nga naa sa modal kung e click ang save nga button
$(document).on('submit', '#update-item-formx', function(event) {
	event.preventDefault();
	/* Act on the event */
	var validate = 0;
	var form_datas = new Array(
                    $('input[id=tagID-update]'),
                    $('input[id=supplyname-update]'),
                    $('input[id=room-update]'),
                    $('input[id=brand-update]'),
                    $('input[id=quantity-update]'),
                    $('#iIds1-update')
							);
                            var data = new Array(form_datas.length);
                            for(var i = 0; i < form_datas.length; i++){
                                if(form_datas[i].val() == 0){
                                    form_datas[i].parent().parent().addClass('has-error');
                                }else{
                                    form_datas[i].parent().parent().removeClass('has-error');
                                    data[i] = form_datas[i].val();
                                    validate += i;
                                }
                            }
                        


	if(validate!=0){
       
            $.ajax({
                url: '../data/update_item.php',
                type: 'post',
                dataType: 'json',
                data: {
                    data: JSON.stringify(data)
                },
                success: function(event){
                    if(event.valid == valid){
                        $('#modal-update-item').modal('hide');
					
                        // action = event.action;
                        show_all_item();
                    }
                },
                error: ()=>{
                    // alert("Error Updating Value");
                    $('#modal-update-item').modal('hide');
						
                        // action = event.action;
                        show_all_item();
                }
            });//end a
	}//end valdidate
});//end submit $update-item-form


/*kung e lick ang table nga row sa item table*/
function item_profile(iID)
{
	$('#modal-item-profile').modal('show');
	$.ajax({
		url: '../data/item_profile.php',
		dataType: 'json',
		type: 'post',
		data: {
			iID: iID
		},
		success: function(event){
           
            $('#modal-message-box').find('.modal-body').text("Delete Succesfully");
            $('#modal-message-box').modal('show');
            action = event.action;
            show_all_item();
		},
		error: function(){
			alert('Error: item_profile');
		}
	});
}//end function item_pr

//EMPLOYEEE
$(document).on('submit', '#add-employee-form', function(event) {
	// event.preventDefault();
	/* Act on the event */
	var validate = '';
	var form_data = [
    $('#fN'),
    $('#mN'),
    $('#lN'),
    $('#email'),
    $('#office'), // Update this line
    $('#pos')      // Update this line
];
	var data = [];

for (var i = 0; i < form_data.length; i++) {
    if (form_data[i].val().length == 0) {
        form_data[i].parent().parent().addClass('has-error');
    } else {
        form_data[i].parent().parent().removeClass('has-error');
        data.push(form_data[i].val());
        validate += i;
    }
}

	if(validate != ''){
		$.ajax({
				url: '../data/add_employee.php',
				type: 'post',
				dataType: 'json',
				data: { data: JSON.stringify(data) },
				success: function (response) {
					if(response.valid == valid){
						$('#modal-add-employee').modal('hide');
						$('#modal-message-box').find('.modal-body').text(response.msg);
						$('#modal-message-box').modal('show');
						$('#add-employee-form').trigger('reset');
						 // window.location="../admin/employee.php";
						show_all_employee();

					}
				},
				error: function (){
					alert('Account already exists');
				}
			});
	}
	

});


/*
*show all employee function
*and display on the table
*/
function show_all_employee()
{
	$.ajax({
			url: '../data/show_all_employee.php',
			type: 'post',
			async: false,
			success: function (data) {
				$('#all_employee').html(data);
			},
			error: function (){
				alert('Error: L266+ show_all_employee');
			}
		});
}//end show_all_employee
show_all_employee();

function edit_employee_fill(eid){
	
	$('#modal-update-employee-form').modal('show');

	// get employee data using ajax and fill the modal 
	$.ajax({
			url: '../data/employee_profile.php',
			type: 'post',
			dataType: 'json',
			data: {
				eid : eid
			},
			success: function (data) {
				if(data){
					
					$('#fN-viewed').val(data.accountname);
					$('#mN-viewed').val(data.emp_un);
					$('#lN-viewed').val(data.emp_pass);
					$('#email-viewed').val(data.email);
					$('#offices-viewed').val(data.office);
					$('#pos-viewed').val(data.position);
					$('#update-eided').val(eid);
                    $('#modal-update-employee-form').find('.modal-title').text('Update Employee');
                
				}
			},
			error: function(){
				alert('Error: L434+ update employee');
			}
		});
}


/*edit employee*/

$(document).on('submit', '#update-employee-form', function(event) {
	event.preventDefault();
	/* Act on the event */
	var validate = '';
	var form_data = new Array(
        $('#fN-viewed'),
        $('#mN-viewed'),
        $('#lN-viewed'),
        $('#email-viewed'),
        $('#offices-viewed'),
        $('#pos-viewed'),

        $('#update-eided'),
								);

	var data = new Array(form_data.length);
	for(var i = 0; i < form_data.length; i++){
		if(form_data[i].val() == 0){
			form_data[i].parent().parent().addClass('has-error');
		}else{
			form_data[i].parent().parent().removeClass('has-error');
			data[i] = form_data[i].val();
			validate += i;
		}
	}


	if(validate == "0123456"){
		$.ajax({
				url: '../data/update_employee.php',
				type: 'post',
				dataType: 'json',
				data: {
					data : JSON.stringify(data)
				},
				success: function (data) {
					if(data.valid == valid){
						$('#modal-update-employee-form').modal('hide');
						show_all_employee();
						$('#"modal-message-box').find('.modal-body').text(data.msg);
					}
				},
				error: function(){
					alert('Error: L485+ update_employee');
				}
			});
	}

});
/* end fill_update_modal employee*/


//employee remove or undo 
var remove_undo_choice;
var eid;//employee id
function employee_remove_undo( id){
   
    $.ajax({
        url: '../data/employee_remove_undo.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
        success: function (data) {
            // console.log(data);
            show_all_employee();
        },
        error: function(){
            alert('Error: L294+ #remove_undo');
        }
    });
}


function delete_items(id){
	$.ajax({
        url: '../data/remove_item.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
        success: function (data) {
            show_all_item();
        },
        error: function(){
            show_all_item();

            alert('Error: L294+ #remove_undo');
        }    });
}

function borrow_items(id){
	$('#modal-borrow-item').modal('show');
	$.ajax({
		url: '../data/borrow-item.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
		success:function(data){
			$('#hidden-quantity').val(data.quantity),
			$('#borrow-item').val(data.supplyname),
			$('#borrow-tagid-item').val(data.tagid),
			$('#borrow-room-item').val(data.room)

		}
	})
}

function return_items(id){
	$('#modal-return-item').modal('show');
	$.ajax({
		url: '../data/borrow-item.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
		success:function(data){
			$('#hidden-quantity').val(data.quantity),
			$('#borrow-item').val(data.supplyname),
			$('#borrow-tagid-item').val(data.tagid),
			$('#borrow-room-item').val(data.room)

		}
	})
}