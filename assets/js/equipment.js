$(document).on('submit', '#add-equipment-form', function(event) {
	// event.preventDefault();
	/* Act on the event */
	var validate = 0;
	var form_data = new Array(
								$('input[id=tagID-equipment]'),
								$('input[id=itemname-equipment]'),
								$('input[id=room-equipment]'),
								$('input[id=brand-equipment]'),
								$('input[id=quantity-equipment]'),
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
			url: '../data/add_equip.php',
			type: 'post',
			dataType: 'json',
			data: {
				data: JSON.stringify(data)
			},
			success: function(event){
				if(event.valid == valid){
					$('#modal-add-equipment').modal('hide');
					$('#add-tools-form').trigger('reset');
					$('#modal-message-box').modal('show');
					$('#modal-message-box').find('.modal-body').text(event.msg);
					action = event.action;
					
show_all_equipment();

				}
			}
		});//end ajax
	}//end validate
});//subm


//display all item
function show_all_equipment()
{
	$.ajax({
		url: '../data/show_all_equipment.php',
		type: 'post',
		async: false,
		success: function(event){
			$('#offices').html(event);
		},
		error: function(){
			alert('Error: show all item L100+');
		}
	});

	
}

function delete_equipment(id){
	$.ajax({
        url: '../data/remove_equipment.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
        success: function (data) {
            show_all_equipment();
        },
        error: function(){
            show_all_equipment();

            alert('Error: L294+ #remove_undo');
        }
    });
}
show_all_equipment();

function fill_update_modal_equipment(iID){
	$.ajax({
			url: '../data/equipment.php',
			type: 'post',
			dataType: 'json',
			data: { iID: iID},
			success: function (data) {
                
				$('#iIds1-equipment-update').val(data.id)//iID
				$('#tagID-equipment-update').val(data.tagid);
				$('#itemsname-equipment-update').val(data.itemname);
				$('#room-equipment-update').val(data.room);
				$('#brand-equipment-update').val(data.brand);
				$('#quantity-equipment-update').val(data.quantity);
			
               

				$('#modal-update-equipment').modal('show');
			},
			error: function (){
				alert('Error: fill_update_modal L172+');
			}
		});

}



function borrow_equipment(id){
	$('#modal-borrow-equipment').modal('show');

	$.ajax({
		url: '../data/borrow-equipment.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
		success:function(data){
			$("#borrow-equipment-quantity").attr({
                "max" : data.quantity,        // substitute your own
                "min" : 0          // values (or variables) here
             });
            $('#quantity-equipments').val(data.quantity);
			$('#borrow-equipment-item').val(data.itemname)	
			$('#borrow-tagid-equip').val(data.tagid),
			$('#borrow-room-equip').val(data.room)
		}
	})
}
//UPDATE ITEM
// e update ang data nga naa sa modal kung e click ang save nga button
$(document).on('submit', '#update-equipment-formx', function(event) {
	event.preventDefault();
	/* Act on the event */
	var validate = 0;
	var form_datas = new Array(
                    $('input[id=tagID-equipment-update]'),
                    $('input[id=itemsname-equipment-update]'),
                    $('input[id=room-equipment-update]'),
                    $('input[id=brand-equipment-update]'),
                    $('input[id=quantity-equipment-update]'),
                    $('#iIds1-equipment-update')
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
                url: '../data/update_equipment.php',
                type: 'post',
                dataType: 'json',
                data: {
                    data: JSON.stringify(data)
                },
                success: function(event){
                    if(event.valid == valid){
                        $('#modal-update-equipment').modal('hide');
					
                        // action = event.action;
                        show_all_equipment();
                    }
                },
                error: ()=>{
                    // alert("Error Updating Value");
                    $('#modal-update-equipment').modal('hide');
						
                        // action = event.action;
                        show_all_equipment();
                }
            });//end a
	}//end valdidate
});//end submit $update-item-form

$(document).on('submit', '#borrow-equipment-form', function(event) {
	
	/* Act on the event */
	var validate = '';
	var form_data = new Array(
        $('#borrow-equipment-item'),
        $('#borrow-equipment-name'),
        $('#borrow-equipment-date'),
        $('#borrow-equipment-contact'),
        $('#borrow-equipment-where'),
        $('#borrow-equipment-return'),
        $('#borrow-equipment-quantity'),
        $('#borrow-equipment-category'),
		$('#borrow-tagid-equip'),
        $('#borrow-room-equip'),
        $('#quantity-equipments'),
     
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
   
	if(validate > 0){
        console.log("My Data",data)

		$.ajax({
				url: '../data/borrowedItem.php',
				type: 'post',
				dataType: 'json',
				data: {
					datas : JSON.stringify(data)
				},
				success: function (datas) {
						$('#modal-borrow-tools').modal('hide');
						show_all_tools();
						$('#modal-message-box').find('.modal-body').text(datas.msg);
					
				},
				error: function(){
					$('#modal-borrow-tools').modal('hide');
						show_all_tools();
						$('#modal-message-box').find('.modal-body').text(datas.msg);
					
				}
			});
	}

});
/* end edit employee*/


$(document).on('change', '#report-choice', function(event) {
	event.preventDefault();
	/* Act on the event */
	
	var choice = $('#report-choice').val();
	let fromDate = $("#From").val()
    let toDate = $("#To").val()
	
	$.ajax({
			url: '../data/show_report.php',
			type: 'post',
			data: {
				choice: choice,
				fromDates:fromDate,
				toDates:toDate
			},
			success: function (data) {
				console.log(data)
				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: L825+');
			}
		});
});

function show_report(){
	$.ajax({
			url: '../data/show_report.php',
			type: 'post',
			data: {
				choice: 'all'
			},
			success: function (data) {
				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: L825+');
			}
		});
}//end function show_report
show_report();




$('input[type=radio][name=dates]').change(function() {
	var choice = $('#report-choice').val();
	
    if (this.value == 'Daily') {
		$.ajax({
			url: '../data/show_report.php',
			type: 'post',
			data: {
				dates: "Daily",
				cat: choice
			},
			success: function (data) {
				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: L825+');
			}
		});
    }
    else if (this.value == 'Weekly') {
        $.ajax({
			url: '../data/show_report.php',
			type: 'post',
			data: {
				dates: "Weekly",
				cat: choice
			},
			success: function (data) {
				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: L825+');
			}
		});
    }else if(this.value == 'Monthly'){
		$.ajax({
			url: '../data/show_report.php',
			type: 'post',
			data: {
				dates: "Monthly",
				cat: choice
			},
			success: function (data) {
				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: L825+');
			}
		});
	} 
});



