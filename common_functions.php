<?php
/***************************************************************************


  * File name   : common_functions.php

  * Begin       : 13 April 2020

  * Description : this include some common functions such as creating folder file and all

  * Author: Anupama A


***************************************************************************/
//CreateFileInsidePublicFolder('about');
    function CreateFolderWithFiles($ModuleName){
        /*
            * Objective:            used to create a folder and its files on the basis of module

            * $ModuleName:           Name of the module

            
            * funtion called time:        after creating a new module
        */
		$folderPath=CreateBaseFolder($ModuleName);
		CreateFolder($folderPath,'Action');
		CreateFolder($folderPath,'js');
		CreateFolder($folderPath,'Files');
		CopyIndexFileFromFolder($folderPath);
		CreateModulePageInsideFolder($folderPath,$ModuleName);
		CreateFileInsidePublicFolder($ModuleName);
		AddModuleUrlToHtaccessFile($ModuleName);
    }
	function CreateBaseFolder($ModuleName){
        /*
            * Objective:            used to create a folder in project not in public folder

            * $ModuleName:           Name of the module

            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$path="../";//going out from public folder
		if (!file_exists($path.'/'.$ModuleName)) {
		mkdir($path.'/'.$ModuleName, 0777, true);
		}
		return $path.'/'.$ModuleName;
    }
	function CreateFolder($path,$name){
        /*
            * Objective:            used to create a folder in project not in public folder

            * $ModuleName:           Name of the module

            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		
		if (!file_exists($path.'/'.$name)) {
		mkdir($path.'/'.$name, 0777, true);
		}
		CopyIndexFileFromFolder($path.'/'.$name);
		return $path.'/'.$name;
    }
	function CopyIndexFileFromFolder($folderPath){
        /*
            * Objective:            used to copy index.html from one folder to this new module

            * $folderPath:           path to the folder

           
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$IndexFilePath="../login/index.html";//going out from public folder
		if(copy($IndexFilePath, $folderPath.'/index.html'))
		{
			return 1;
		}
		else
		{
			return 0;
		}
    }
	function getFileData($path_with_file_name)
	{
		 /*
            * Objective:            used to get text data from another file

            * $path_with_file_name:           path to the folder
			
			 
            * funtion called time:        along with CreateModulePageInsideFolder function
        */
		$getFileData= file_get_contents($path_with_file_name);
		if($getFileData!='')
		{
		return $getFileData;
		}
		else
		{
			return 0;
		}
	}
	function CreateModulePageInsideFolder($folderPath,$ModuleName){
        /*
            * Objective:            used to create a file with module name.php

            * $folderPath:           path to the folder
			
			* $ModuleName:           Name of the module
			 
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$name=str_replace(" ","_",$ModuleName);
		$name.=".php";
		$fileName = $folderPath.'/'.$name;
		
		if(!is_file($fileName)){
			$contents = getFileData('../templates/content.php');
			$contents =str_replace('**itemName**',$ModuleName,$contents);
			file_put_contents($fileName, $contents);     // Save our content to the file.
		}

    }
	function CreateFileInsidePublicFolder($ModuleName){
        /*
            * Objective:            used to create a folder in project not in public folder

            * $ModuleName:           Name of the module

            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$ModuleName_with_out_gap.=".php";
		$fileName='../public/'.str_replace(" ","_",$ModuleName);
		$fileName.=".php";
		
		
		if(!is_file($fileName)){
			$contents = getFileData('../templates/publicFileModel.php');
			$contents =str_replace('**fileName**',$fileName,$contents);
			$contents =str_replace('**dateCreated**',date('d F Y'),$contents);
			$contents =str_replace('**path_to_be_added**',$ModuleName.'/'.$ModuleName_with_out_gap,$contents);
			file_put_contents($fileName, $contents);     // Save our content to the file.
		}
    }
	function AddModuleUrlToHtaccessFile($ModuleName){
        /*
            * Objective:            rename file in ht access

            * $ModuleName:           Name of the module

            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$fileName=str_replace(" ","_",$ModuleName);
		$fileName.=".php";
		$fileName_to_be_added=str_replace('_','-',str_replace('.php','',$fileName));
		$AddNewLineData = "\nRewriteRule ^".$fileName_to_be_added."?$ ".$fileName."" . "\n";
		$GetFile="../public/.htaccess";
		file_put_contents($GetFile, $AddNewLineData, FILE_APPEND | LOCK_EX);
		$contents = file_get_contents($GetFile);
		$contents = str_replace("\n\n", "\n", $contents);
		file_put_contents($GetFile, $contents);
		
    }
	function RemoveModuleUrlToHtaccessFile($ModuleName){
        /*
            * Objective:            rename file in ht access

            * $ModuleName:           Name of the module

            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$fileName=str_replace(" ","_",$ModuleName);
		$fileName.=".php";
		$fileName_to_be_added=str_replace('_','-',str_replace('.php','',$fileName));
		$RemoveNewLineData = "RewriteRule ^".$fileName_to_be_added."?$ ".$fileName."" . "\n";
		$GetFile="../public/.htaccess";
		$contents = file_get_contents($GetFile);
		$contents = str_replace($RemoveNewLineData,'', $contents);
		file_put_contents($GetFile, $contents);
				
    }
	function DeleteFolderWithFiles($ModuleName){
        /*
            * Objective:            used to delete a folder and its files on the basis of module

            * $ModuleName:           Name of the module

            
            * funtion called time:        after creating a new module
        */
		$fileName=str_replace(" ","_",$ModuleName);
		$fileName.=".php";
		unlink('../public/'.$fileName.'');
		removeDirectory('../'.$ModuleName.'');
		RemoveModuleUrlToHtaccessFile($ModuleName);
		
    }
	function removeDirectory($path) {
	  /*
            * Objective:            used to delete a folder and its files on the basis of module

            * $path:           Path to directory

            
            * funtion called time:        after creating a new module
        */	
		$files = glob($path . '/*');
		foreach ($files as $file) {
			is_dir($file) ? removeDirectory($file) : unlink($file);
		}
		rmdir($path);
		return;
}
	
?>