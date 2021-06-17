window.isSubmitted = false;
var table;
var EditIndex=-1;
var EditValue;
$(document).ready(function() {
	
    table=$('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            
        ]
    } );

$("form#form").submit(function(e) {
                e.preventDefault();  
				var FormAction=$('#form').attr('action');
				FormAction=FormAction+'.php';
                var formData = new FormData(this);
				
var name= formData.get("name");
var email= formData.get("email");
var phone= formData.get("phone");
var address= formData.get("address");
var photo= "to view file please refresh page";
var date_of_birth= formData.get("date_of_birth");
var blood_group= $('select[name=blood_group]').find(':selected').text();
var department= $('select[name=department]').find(':selected').text();
var position= $('select[name=position]').find(':selected').text();
var emergency_contact_person= formData.get("emergency_contact_person");
var emergency_contact_number= formData.get("emergency_contact_number");
 $.ajax({
                    url: FormAction,
                    type: 'POST',
                    data: formData,
					cache: false,
                    success: function (res) {
                        if(res >0){
							
							if(res==='2')
							{
								window.isSubmitted = false;
							 swal(
                            'Done!',
                            'Status: Successfully Updated',
                            'success'
                        );
							}
							else
							{
							window.isSubmitted = false;
							 swal(
                            'Done!',
                            'Status: Successfully Registered,Please Approve the user to send username and password!',
                            'success'
                        );
							}
						$("#formSubmit").html("Submit");
						$("#formSubmit").prop('disabled', false);
						if(EditIndex>-1)
						{
						var index=parseInt(EditValue);
						var InIndexIncrement=parseInt(EditIndex);
						EditIndex=-1;
						table.row(InIndexIncrement).remove().draw();
						$('#UserFormUpdate').load(document.URL + ' #UserFormUpdate');
						}
						else
						{
						var index=parseInt(res);
						var InIndexIncrement=parseInt(IndexIncrement);
						IndexIncrement=IndexIncrement+1;
						$("#form")[0].reset();
						}
						
						
						}
						else{
							
							window.isSubmitted = false;
							$("#formSubmit").html("Failed! Try again");
							swal(
                            'Failed!',
                            'Status Please try again',
                            'error'
                        );
							$("#formSubmit").prop('disabled', false);

						}
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                window.isSubmitted = true;
					$("#formSubmit").html("<i class='fa fa-spinner fa-spin'/>&nbsp;&nbsp;Waiting for Network...");
					$("#formSubmit").prop('disabled', true);
					
            });
} );
function UserEdit(val,index) {
	swal({
		  title: "Are you sure?",
		  text: "Do You Want to Edit this?",
		  icon: "info",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?edit_id="+val;
		  window.history.pushState({ path: newurl }, '', newurl);
		  $('#UserFormUpdate').load(document.URL + ' #UserFormUpdate');
		  newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
		  window.history.pushState({ path: newurl }, '', newurl);
		  EditIndex=index;
		  EditValue=val;
		  }
		   else {
			swal("Your imaginary file is not Edited!");
		  }
		});
		
		}

function UserDelete(val,index) {
			var FormAction=$('#form').attr('action');
			FormAction='../manage employee/Action/Actionmanage_employee_add_new_employee.php';
			swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this imaginary file!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		$.ajax({
		type: "POST",
		url: FormAction,
		data:{'manage_employee_add_new_employee_id':val},
		success: function(res){
			if(res == "1"){
							
							 swal(
                            'Done!',
                            'Status: Successfully Completed your process',
                            'success'
                        )
						table.row(index).remove().draw();
						}
						else{
							window.isSubmitted = false;
							swal(
                            'Failed!',
                            'Status Please try again',
                            'error'
                        );
						}
		}
		});
		  } else {
			swal("Your imaginary file is safe!");
		  }
		});
	
}	
function approve(val,index)
{
	swal({
  text: 'Provide a password for user',
  content: "input",
  button: {
    text: "Activate User!",
    closeModal: false,
  },
})
.then(name => {
	$.ajax({
		type: "POST",
		url: "../user/Action/Actionuser_management.php",
		data:{'update_user':val,'password':name},
		
			success: function(res){
			if(res >0){
							
							 swal(
                            'Done!',
                            'Status: Successfully Completed your process',
                            'success'
                        )
						table.row(index).remove().draw();
						}
						else{
							window.isSubmitted = false;
							swal(
                            'Failed!',
                            'Status Please try again',
                            'error'
                        );
						}
		}
	});
})

}