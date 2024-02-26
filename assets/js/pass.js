
//changepass logic
$(document).on('submit', '#form-changepasswords', function(event) {

	/* Act on the event */
	var validate = '';
	var form_att = new Array(
							$('input[id=change-username]'),
							$('input[id=change-password]'),
							$('input[id=confirm-password]')
						);
	var data = new Array(form_att.length);
	for(var i = 0; i < data.length; i ++){
		if(form_att[i].val() == 0){
			form_att[i].parent().parent().addClass('has-error');
		}else{
			form_att[i].parent().parent().removeClass('has-error');
			validate += i;
			data[i] = form_att[i].val();
		}
	}//end for
	//check if pass match
	
	if(validate == '012'){
		if($('input[id=change-password]').val() == $('input[id=confirm-password]').val()){
			// console.log('equal');
			$.ajax({
					url: '../data/update_admin_data.php',
					type: 'post',
					dataType: 'json',
					data: {
						data: JSON.stringify(data)
					},
					success: function (data) {
						// console.log(data);
						if(data.valid == valid){
							//if success
							$('#modal-changepass').modal('hide');
							$('#modal-message-box').modal('show');
							$('#modal-message-box').find('.modal-body').text(data.msg);
						}else{
							alert('Opps: Somethings went wrong! check db!');
						}
					},
					error: function(){
						alert('Error: L612+');
					}
				});
		}else{
			// console.log('not equal');
			alert('Password Not Matched!');
		}
	}

})

