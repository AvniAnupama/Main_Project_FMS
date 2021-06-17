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
				
var favicon_logo= "to view file please refresh page";
var logo= "to view file please refresh page";
var meta_details= formData.get("meta_details");
var meta_keywords= formData.get("meta_keywords");
var page_title= formData.get("page_title");
var phone= formData.get("phone");
var whatsapp= formData.get("whatsapp");
var email= formData.get("email");
var address= formData.get("address");
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
                            'Status: Successfully Completed your process',
                            'success'
                        );
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
						var AddIndexIncrement=InIndexIncrement+1;
						var edit='<a href="#" onclick="UserEdit('+index+','+InIndexIncrement+');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit color-danger"></i></a>';
						var Tdelete='<a href="#" onclick="UserDelete('+index+','+InIndexIncrement+');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-close color-danger"></i></a>';
						table.row.add([AddIndexIncrement,favicon_logo,logo,meta_details,meta_keywords,page_title,phone,whatsapp,email,address,edit,Tdelete]).draw();
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
		data:{'basic_details_config_details_id':val},
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
	