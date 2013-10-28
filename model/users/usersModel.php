<?php

/**
 * Write users to file
 * @param string $filename
 * @param array $array_data
 * @return null
 */
function writeUserToFile($filename, $array_data)
{
	$configFile="../configs/config.ini";
	$config=readConfig($configFile);	
	//Recorrer el array
	foreach($array_data as $key => $value)
	{
		//Si es un array dividir por pipes
		if (is_array($value))
			$value = implode('|',$value);
			
		//Escibir en un array temporal
		$out[]=$value;
	}
	//A�adir foto
	$out[]=$filename;
	//Convertir el array temporal en un string
	$data = implode(',', $out);
		
	//Escribir en el fichero usuarios.txt
	$filename= $_SERVER['DOCUMENT_ROOT'].$config['users_data'];
	file_put_contents($filename, $data."\n", FILE_APPEND);
	
	return;
}

/**
 * Update a user to a file. 
 * Is delete TRUE, delete user from file
 * 
 * @param int $line
 * @param array $array_user
 * @param string $filename
 * @param boolean $delete
 * @return null
 */
function updateUserTofile($line, $array_user, $filename, $delete=null)
{
	
	$configFile="../configs/config.ini";
	$config=readConfig($configFile);
	$users=readUsersFromFile();
	$array_user[]=$filename;	
	
	
	if($delete)
	{
		$dir = $_SERVER['DOCUMENT_ROOT'].$config['upload_dir'];
		unlink($dir."/".$filename);
		unset($users[$line]);
	}
	else
		$users[$line]=$array_user;
	
	//Recorrer el array
	foreach($users as $key => $user)
	{
		//Si es un array dividir por pipes
		$outuser=array();
		foreach($user as $value)
		{
			if (is_array($value))
				$outuser[] = implode('|',$value);
			else
				$outuser[] = $value;			
		}
		$outuser=implode(',',$outuser);
		//Escibir en un array temporal
		$outusers[]=$outuser;
	}
	$users=implode("\n", $outusers);
	
	//Escribir en el fichero usuarios.txt
	$filename= $_SERVER['DOCUMENT_ROOT'].$config['users_data'];
	file_put_contents($filename, $users);
}


/**
 * Read users from file
 * @return array users
 */
function readUsersFromFile()
{
	$configFile="../configs/config.ini";
	$config=readConfig($configFile);	
	$users=array();
	$user=array();
	//Leer los datos del archivo de texto en un string
	$filename= $_SERVER['DOCUMENT_ROOT'].$config['users_data'];
	$data=file_get_contents($filename);
	//Separar el string por lineas en un array (filas)
	$filas = explode("\n", $data);
	//Recorrar el array (filas)
	foreach($filas as $key => $value)
	{
		//Dividir el string de fila en un array (columnas)
		$user = explode(',', $value);
		$userout=array();
		foreach($user as $numcolumna => $columna)			
		{
			if(strpos($columna,"|")!==false)
				$userout[]=explode('|',$columna);
			else if($numcolumna==8 || $numcolumna==10)
				$userout[]=array($columna);
			else 
				$userout[]=$columna;
		}
		$users[]=$userout;		
	}
	return $users;
}

/**
 * Read user from file
 * @param int $line
 * @return array user
 */
function readUserFromFile($line)
{
	$users=readUsersFromFile();
	return $users[$line];
}


/**
 * Get the user picture filename
 * @param int $line
 * @return string filename
 */
function getUserFilename($line)
{
	$user=readUserFromFile($line);
	$filename=$user[sizeof($user)-1];
	return $filename;
}






