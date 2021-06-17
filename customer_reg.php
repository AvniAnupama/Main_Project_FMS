<?php
/***************************************************************************
* File name   : manage_employee_add_new_employee.php
* Begin       : 15 April 2021
* Author: Anupama A
***************************************************************************/
require_once"../config/db_connect.php";
$obj=new db_connect;
include"../config/null_variables.php";
$include_style_to_head="<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css'><link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css'>";//datatable style to null variable
$include_script_to_footer='<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script><script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script><script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script><script src="../customer/js/customer_customer_registration.js"></script>';
include_once"../templates/head_all.php";
include_once"../templates/preloader.php";
?>
   <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <center><img src="images/login.png" style="max-width:70%;max-height:70px" ></img>
								</center>
                              <br><br><br>
<?php
//include_once"../templates/topbar.php";
//include_once"../templates/sidebar.php";
include_once"../customer/customer_customer_reg.php";//content
?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include_once"../templates/footer.php";
?>