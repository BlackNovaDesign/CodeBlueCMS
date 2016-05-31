<?
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }

/* function:  generates thumbnail */
function make_thumb($src,$dest,$desired_width) {

$gd_function_suffix = array(      
  'image/pjpeg' => 'JPEG',     
  'image/jpeg' => 'JPEG',     
  'image/gif' => 'GIF',     
  'image/bmp' => 'WBMP',     
  'image/x-png' => 'PNG'     
);

// Get the Name Suffix on basis of the mime type     
$function_suffix = strtolower(get_file_extension($file)); 


	/* read the source image */
	$source_image = 'ImageCreateFrom' . $function_suffix.($src);



	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image,$dest);
}

/* function:  returns files from dir */
function get_files($images_dir,$exts = array('png', 'jpg' , 'gif')) {
	$files = array();
	if($handle = opendir($images_dir)) {
		while(false !== ($file = readdir($handle))) {
			$extension = strtolower(get_file_extension($file));
			if($extension && in_array($extension,$exts)) {
				$files[] = $file;
			}
		}
		closedir($handle);
	}
	return $files;
}

/* function:  returns a file's extension */
function get_file_extension($file_name) {
	return substr(strrchr($file_name,'.'),1);
}

/** settings **/
$images_dir = '../images/';
$thumbs_dir = '../images/.thumbs/';
$thumbs_width = 100;
$images_per_row = 10;

?>