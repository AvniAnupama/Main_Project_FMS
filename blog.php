<?php
/***************************************************************************
* File name   : ../public/blog.php
* Begin       : 14 January 2021
* Author: Anupama A
***************************************************************************/
require_once"../config/db_connect.php";
$obj=new db_connect;
include"../config/null_variables.php";
$include_style_to_head="<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css'><link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css'>";//datatable style to null variable
$include_script_to_footer='<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script><script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script><script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>';
include_once"../templates/head.php";
include_once"../templates/preloader.php";
include_once"../templates/topbar.php";
include_once"../templates/sidebar.php";
include_once"../blog/blog.php";//content
include_once"../templates/footer.php";
?>