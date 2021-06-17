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
				
var product= $('select[name=product]').find(':selected').text();
var new_stock_count= formData.get("new_stock_count");
var available_stock= formData.get("available_stock");
var stock_date= formData.get("stock_date");
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
						table.row.add([AddIndexIncrement,product,available_stock,stock_date,edit,Tdelete]).draw();
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
		data:{'stock_entry_manage_stock_id':val},
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
function setStock(val)
{
	if(val>0)
	{
	$.ajax({
		type: "POST",
		url: '../stock entry/Action/Actionstock_entry_manage_stock.php',
		data:{'damage_balance':val},
		success: function(res){
			if(res>0){
						$('#total_damaged_items').val(res);	
							
						
						}
						else{
						$('#total_damaged_items').val(res);
						}
		}
		});
	}
}
function DamageIns(con,ams)
{
	if(con===0)
	{
	 var datavalue=$("#damaged_items").val();
	 var dataTotal=$("#total_damaged_items").val();
	 var ALlTotak=parseInt(datavalue)+parseInt(dataTotal);
	 $('#total_damaged_items').val(ALlTotak);
	}
	else
	{
	var datavalue=$("#damaged_items").val();
	 var dataTotal=ams;
	 var ALlTotak=parseInt(datavalue)+(parseInt(dataTotal)-parseInt(con));
	 $('#total_damaged_items').val(ALlTotak);
	}
}	