<?php
/***************************************************************************


  * File name   : common_functions.php

  * Begin       : 13 April 2020

  * Description : this include some common functions such as creating folder file and all

  * Author: Anupama A


***************************************************************************/
//CreateFileInsidePublicFolder('about');
    function RemoveFilesToPages($ModuleName,$pageName,$dataArray,$obj){
        /*
            * Objective:	used to create a folder and its files on the basis of module

            * $ModuleName:	Name of the module
			
			* $pageName:	Name of the page
            
			* $dataArray:	array(
								'page_name'=name of the page
								'component'= 
									array(
									'component_name'=name of component
									'component_type'=type of component
									'sub_component'=
										array(
										'sub_component'=sub component value
										)
									)
								)
			
			* $pageName:	Name of the page
            
            * funtion called time:	after creating a new module
        */
		$folderPath="../".$ModuleName."";
		$jsFile=RemovePageJsFileInsideModuleFolder($ModuleName,$pageName,$dataArray,$obj);
		RemoveTableForThisPage($ModuleName,$pageName,$dataArray,$obj);
		RemoveFileInsideModuleFolder($ModuleName,$pageName,$dataArray,$obj);
		RemoveActionFileInsideModuleFolder($ModuleName,$pageName,$dataArray,$obj);
		RemoveFileInsidePublicFolder($ModuleName,$pageName,$jsFile);
		RemovePagesUrlToHtaccessFile($ModuleName,$pageName);
    }
	  function RemovePageJsFileInsideModuleFolder($ModuleName,$pageName,$dataArray,$obj){
        /*
            * Objective:	used to create a js file inside Module Folder

            * $ModuleName:	Name of the module
			
			* $pageName:	Name of the page
            
			* $dataArray:	array(
								'page_name'=name of the page
								'component'= 
									array(
									'component_name'=name of component
									'component_type'=type of component
									'sub_component'=
										array(
										'sub_component'=sub component value
										)
									)
								)
			
			* $pageName:	Name of the page
            
            * funtion called time:	after creating a new module
        */
		
		
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$ModuleUrl=str_replace(" ","-",$ModuleName).".php";
		$PageName_with_out_gap=str_replace(" ","_",$pageName);
		$name=$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$TableID=$ModuleName_with_out_gap."_".$PageName_with_out_gap."_id";
		$TableNameToAdd="tbl_".$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$name.=".js";
		$fileName ="../".$ModuleName."/js/".$name."";
		unlink($fileName);
		return $fileName;
		
	  }
	  function RemoveActionFileInsideModuleFolder($ModuleName,$pageName,$dataArray,$obj){
        /*
            * Objective:	used to create a Action file inside Module Folder

            * $ModuleName:	Name of the module
			
			* $pageName:	Name of the page
            
			* $dataArray:	array(
								'page_name'=name of the page
								'component'= 
									array(
									'component_name'=name of component
									'component_type'=type of component
									'sub_component'=
										array(
										'sub_component'=sub component value
										)
									)
								)
			
			* $pageName:	Name of the page
            
            * funtion called time:	after creating a new module
        */
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$ModuleUrl=str_replace(" ","-",$ModuleName).".php";
		$PageName_with_out_gap=str_replace(" ","_",$pageName);
		$name=$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$TableID=$ModuleName_with_out_gap."_".$PageName_with_out_gap."_id";
		$TableNameToAdd="tbl_".$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$name.=".php";
		$fileName ="../".$ModuleName."/Action/Action".$name."";
		unlink($fileName);
		
					
		//CreateTable($arryWithFeildNameAndDataType);
		
	  }
	  function RemoveFileInsideModuleFolder($ModuleName,$pageName,$dataArray,$obj){
        /*
            * Objective:	used to create a file inside Module Folder

            * $ModuleName:	Name of the module
			
			* $pageName:	Name of the page
            
			* $dataArray:	array(
								'page_name'=name of the page
								'component'= 
									array(
									'component_name'=name of component
									'component_type'=type of component
									'sub_component'=
										array(
										'sub_component'=sub component value
										)
									)
								)
			
			* $pageName:	Name of the page
            
            * funtion called time:	after creating a new module
        */
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$ModuleUrl=str_replace(" ","-",$ModuleName).".php";
		$PageName_with_out_gap=str_replace(" ","_",$pageName);
		$name=$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$TableID=$ModuleName_with_out_gap."_".$PageName_with_out_gap."_id";
		$TableNameToAdd="tbl_".$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$name.=".php";
		$fileName ="../".$ModuleName."/".$name."";
	
		unlink($fileName);
		
					
		//CreateTable($arryWithFeildNameAndDataType);
		
	  }
	  function RemoveTableForThisPage($ModuleName,$pageName,$dataArray,$obj){
        /*
            * Objective:	used to create a folder and its files on the basis of module

            * $ModuleName:	Name of the module
			
			* $pageName:	Name of the page
            
			* $dataArray:	array(
								'page_name'=name of the page
								'component'= 
									array(
									'component_name'=name of component
									'component_type'=type of component
									'sub_component'=
										array(
										'sub_component'=sub component value
										)
									)
								)
			
			* $pageName:	Name of the page
            
            * funtion called time:	after creating a new module
        */
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$PageName_with_out_gap=str_replace(" ","_",$pageName);
		$TableName=$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		foreach($dataArray as $page_data_detaiils_single)
		{
		$sql="DROP TABLE tbl_".$TableName.";"
		$obj->execute($sql);
		foreach($page_data_detaiils_single['component'] as $component_single)
		{
				if(isset($component_single['sub_component']))
				{	
				$SubDataTableName=$TableName."_".str_replace(" ","_",$component_single['component_name']);
				$sql="DROP TABLE tbl_".$SubDataTableName.";"
				$obj->execute($sql);	
				}
		
		}		
		}
					
		//CreateTable($arryWithFeildNameAndDataType);
		
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
	
	function RemoveFileInsidePublicFolder($ModuleName,$pageName,$jsFile){
        /*
            * Objective:            used to create a folder in project not in public folder

            * $ModuleName:           Name of the module
	
			 * $pageName:           Name of the Page
            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$PageName_with_out_gap=str_replace(" ","_",$pageName);
		$fileName=$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$fileName.=".php";
		$fileNameWithPath='../public/'.$fileName;
		
		
		unlink($fileNameWithPath);
    }
	
	function RemovePagesUrlToHtaccessFile($ModuleName,$pageName){
        /*
            * Objective:            add page file in htaccess

            * $ModuleName:           Name of the module
	
			 * $pageName:           Name of the Page
            
            * funtion called time:        along with CreateFolderWithFiles function
        */
		$ModuleName_with_out_gap=str_replace(" ","_",$ModuleName);
		$PageName_with_out_gap=str_replace(" ","_",$pageName);
		$fileName=$ModuleName_with_out_gap."_".$PageName_with_out_gap;
		$fileName.=".php";
		$fileNameWithOutExtention=$ModuleName_with_out_gap."-".$PageName_with_out_gap;
		$AddNewLineData = "RewriteRule ^".$fileNameWithOutExtention."?$ ".$fileName."" . "";
		$GetFile="../public/.htaccess";
		$contents=str_replace($AddNewLineData,"",getFileData("../public/.htaccess"));
		file_put_contents($GetFile, $contents);
		
    }

	
?>