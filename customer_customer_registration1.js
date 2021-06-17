window.isSubmitted = false;
var table;
var EditIndex=-1;
var EditValue;
$(document).ready(function() {
	
    table=$('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
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
var aadhar_number= formData.get("aadhar_number");
var company_license= formData.get("company_license");
var photo= "to view file please refresh page";
                $.ajax({
                    url: FormAction,
                    type: 'POST',
                    data: formData,
					cache: false,
                    success: function (res) {
                        if(res >0){
							window.isSubmitted = false;
							 swal(
                            'Done!',
                            'Status: Successfully updated!',
                            'success'
                        );
						$("#formSubmit").html("Submit");
						$("#formSubmit").prop('disabled', false);
						
						
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
			FormAction=FormAction+'.php';
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
		data:{'customer_customer_registration_id':val},
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
	