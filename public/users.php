<?php 

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action ='select';



require_once ("../model/generalModel.php");
require_once ("../model/filesModel.php");
require_once ("../model/users/usersModel.php");

switch ($action)
{
	case 'insert':
		if($_POST)
		{
			// Antes de subir la foto debo comprobar que el nombre del fichero no está en el directorio 
			
			$dirFiles = dir2array();
			if(in_array($_FILES['photo']['name'],$dirFiles)){
				$repName = $_FILES['photo']['name']; 
				// Si está renombro el fichero
				$_FILES['photo']['name'] = substr($repName, 0, (strlen($repName) -4)). '1.jpg';
				
			}			 	
			$filename = uploadPicture($_FILES);			
			writeUserToFile($filename, $_POST);			
			//Saltar de pagina
			//header("Location: /users.php");
		}
		else
		{
			$user=array();
			include ("../views/users/insertForm.php");	
		}
	break;
	case 'update':
		if($_POST)
		{
						
			//Antes de subir la foto debo borrar la anterior y subir la nueva
			$oldFilename = getUserFilename($_GET['id']);		
			deletePicture($oldFilename);
			
			$filename = uploadPicture($_FILES);
			updateUserTofile($_GET['id'], $_POST, $filename);
			//Saltar de pagina
			header("Location: /users.php");
		}
		else
		{
			
			$user=readUserFromFile($_GET['id']);
			include ("../views/users/insertForm.php");			
		}
		
	break;
	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='Si')
			{
				$filename = getUserFilename($_POST['id']);
				updateUserTofile($_GET['id'], $_POST, $filename, true);
			}
			header("Location: /users.php");
		}
		else
		{
			echo "esto es delete";
			include ("../views/users/delete.php");
		}		
	break;
	case 'select':
			
		$users=readUsersFromFile();
		include("../views/users/select.php"); 
	break;
	default:
		echo "esto es default";
	break;
	
}






