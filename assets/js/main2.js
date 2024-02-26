$(document).on('submit', '#borrow-item-form', function(event) {
	
	/* Act on the event */
	var validate = '';
	var form_data = new Array(
        $('#borrow-item'),
        $('#borrow-name'),
        $('#borrow-date'),
        $('#borrow-contact'),
        $('#borrow-where'),
        $('#borrow-return'),
        $('#borrow-quantity'),
        $('#borrow-category'),
        $('#borrow-tagid-item'),
        $('#borrow-room-item'),
        $('#hidden-quantity'),

		
     
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
        // console.log(data)
		$.ajax({
				url: '../data/borrowedItem.php',
				type: 'post',
				dataType: 'json',
				data: {
					datas : JSON.stringify(data)
				},
				success: function (datas) {
						$('#modal-borrow-item').modal('hide');
						show_all_item();
						$('#modal-message-box').find('.modal-body').text(datas.msg);
					
				},
				error: function(){
					$('#modal-borrow-item').modal('hide');
						show_all_item();
						$('#modal-message-box').find('.modal-body').text(datas.msg);
					
				}
			});
	}

});
/* end edit employee*/



$(document).on('submit', '#add-tools-form', function(event) {
	// event.preventDefault();
	/* Act on the event */
	var validate = 0;
	var form_data = new Array(
								$('input[id=tagID-tools]'),
								$('input[id=toolname]'),
								$('input[id=room-tools]'),
								$('input[id=quantity-tools]'),
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
			url: '../data/add_tools.php',
			type: 'post',
			dataType: 'json',
			data: {
				data: JSON.stringify(data)
			},
			success: function(event){
				
				if(event.valid == valid){
					$('#modal-tools-item').modal('hide');
					$('#add-tools-form').trigger('reset');
					$('#modal-message-box').modal('show');
					$('#modal-message-box').find('.modal-body').text(event.msg);
					action = event.action;
					
show_all_tools();

				}
			}
		});//end ajax
	}//end validate
});//subm


//display all item
function show_all_tools()
{
	$.ajax({
		url: '../data/show_all_tools.php',
		type: 'post',
		async: false,
		success: function(event){
			$('#allTools').html(event);
		},
		error: function(){
			alert('Error: show all item L100+');
		}
	});

	
}

function delete_tools(id){
	$.ajax({
        url: '../data/remove_item_tools.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
        success: function (data) {
            show_all_tools();
        },
        error: function(){
            show_all_tools();

            alert('Error: L294+ #remove_undo');
        }
    });
}


show_all_tools();


function fill_update_modals(iID){
				$('#modal-upt-positionx').modal('show');

	$.ajax({
			url: '../data/tools_profile.php',
			type: 'post',
			dataType: 'json',
			data: { iID: iID},
			success: function (data) {
                
				$('#upt-pos-id').val(data.id)//iID
				$('#tagID-tools-update').val(data.tagid);
				$('#toolname-update').val(data.toolname);
				$('#room-tools-update').val(data.room);
				$('#quantity-tools-update').val(data.quantity);
			
	

			},
			error: function (){
				alert('Error: fill_update_modal L172+');
			}
		});

}




//UPDATE ITEM
// e update ang data nga naa sa modal kung e click ang save nga button
$(document).on('submit', '#upt-position-form', function(event) {
	event.preventDefault();
	/* Act on the event */
	var validate = 0;
	var form_datas = new Array(
                    $('input[id=tagID-tools-update]'),
                    $('input[id=toolname-update]'),
                    $('input[id=room-tools-update]'),
                    $('input[id=quantity-tools-update]'),
                    $('#upt-pos-id')
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
                url: '../data/update_tools.php',
                type: 'post',
                dataType: 'json',
                data: {
                    data: JSON.stringify(data)
                },
                success: function(event){
                    if(event.valid == valid){
                      
                        $('#modal-upt-positionx').modal('hide');
						
                        // action = event.action;
                        show_all_tools();
                    }
                },
                error: ()=>{
                    // alert("Error Updating Value");
                    $('#modal-upt-positionx').modal('hide');
						
                        // action = event.action;
                        show_all_tools();
                }
            });//end a
	}//end valdidate
});//end submit $update-item-form


function borrow_tools(id){
	$('#modal-borrow-tools').modal('show');
	$.ajax({
		url: '../data/borrow-tool.php',
        type: 'post',
        dataType: 'json',
        data: {
        
            eid 			: id
        },
		success:function(data){
			$("#borrow-tool-quantity").attr({
                "max" : data.quantity,        // substitute your own
                "min" : 0          // values (or variables) here
             });
			$('#borrow-tool-item').val(data.toolname)	
			$('#borrow-tagid-tool').val(data.tagid),
			$('#borrow-room-tool').val(data.room)
			$('#toolquantity').val(data.quantity)
		}
	})
}
$(document).on('submit', '#borrow-tool-form', function(event) {
	// alert("SAMPLE");
	/* Act on the event */
	var validate = '';
	var form_data = new Array(
        $('#borrow-tool-item'),
        $('#borrow-tool-name'),
        $('#borrow-tool-date'),
        $('#borrow-tool-contact'),
        $('#borrow-tool-where'),
        $('#borrow-tool-return'),
        $('#borrow-tool-quantity'),
        $('#borrow-tool-category'),
        $('#borrow-tagid-tool'),
        $('#borrow-room-tool'),
        $('#toolquantity'),
     
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
        // console.log(data)
		$.ajax({
				url: '../data/borrowedItem.php',
				type: 'post',
				dataType: 'json',
				data: {
					datas : JSON.stringify(data)
				},
				success: function (datas) {
					console.log(datas);
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

