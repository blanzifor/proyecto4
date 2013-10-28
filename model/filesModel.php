<?php



/**
 * Upload a file to users directory
 * @param array $array_files
 * @return string filename
 */
function uploadPicture ($array_files)
{
	
	$configFile="../configs/config.ini";
	$config=readConfig($configFile);
	
	$dir = $_SERVER['DOCUMENT_ROOT'].$config['upload_dir'];
	move_uploaded_file($array_files['photo']['tmp_name'],
	$dir."/".$array_files['photo']['name']);
		
	
	return $array_files['photo']['name'];
}

/**
 * Delete a picture from uploads directory
 * @param string $filename
 * 
 */
function deletePicture ($filename)
{
	$configFile="../configs/config.ini";
	$config=readConfig($configFile);
	
	$dir = $_SERVER['DOCUMENT_ROOT'].$config['upload_dir'] ."/";
	unlink ($dir . $filename);
}

/**
 * Put in array the /uploads directory
 * @return array $files
 */

function dir2array()
{ 
    $configFile="../configs/config.ini";
	$config=readConfig($configFile);
	$dir = $_SERVER['DOCUMENT_ROOT'].$config['upload_dir'] ."/";

	$files = array();
	if (is_dir($dir)) {
    	if ($dh = opendir($dir)) {
        	while (($file = readdir($dh)) !== false) {
            	
        		$files[] = $file;
        	}
        closedir($dh);
    	}
	}  
    return $files;   
} 