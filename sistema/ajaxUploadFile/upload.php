<?php
$up=new FileUploader();
$path=$_GET['ax-file-path'];
$ext=$_GET['ax-allow-ext'];
//$miId=$_GET['miId'];

$res=$up->uploadfile($path,$ext);

$cont=0;
/*==================================================================
 * Upload class for handling upload files
 *=================================================================*/
class AsyncUpload
{
    function save($remotePath,$allowext,$add) 
	{    
	$miId=$_GET['miId'];
	    //$file_name=$_GET['ax-file-name'];
		$file_name=$miId;
		$puteria="miputeria.pdf";
  
	    $file_info=pathinfo($file_name);	    

	    if(strpos($allowext, $file_info['extension'])!==false || $allowext=='all')
	    {
	    	$flag =($_GET['start']==0) ? 0:FILE_APPEND;
	    	$file_part=file_get_contents('php://input');//REMEMBER php::/input can be read only one in the same script execution, so better mem it in a var
	    	while(@file_put_contents($remotePath.$add.$file_name, $file_part,$flag)===FALSE)//strange bug
	    	{
	    		usleep(50);
	    	}
	        return true;
	    }
	    return $file_info['extension'].' extension not allowed to upload!';
    } 
}

class SyncUpload 
{  
    function save($remotePath,$allowext,$add)
	{
		$msg=true;
    	foreach ($_FILES['ax-files']['error'] as $key => $error) 
    	{
    		$tmp_name = $_FILES['ax-files']['tmp_name'][$key];
    		$name = $_FILES['ax-files']['name'][$key];
    		
    		$file_info=pathinfo($name);
            if ($error == UPLOAD_ERR_OK) 
            {
            	if(strpos($allowext, $file_info['extension'])!==false || $allowext=='all')
            	{
                	move_uploaded_file($tmp_name, $remotePath.$add.$name);
            	}
            	else
            	{
            		$msg=$file_info['extension'].' extension not allowed!';
            	}
            }
            else 
            {
                $msg='Error uploading!';
            }
        }
        echo $msg;
        return $msg;
    }
}

class FileUploader 
{
	private $file=false;
    function __construct($remotePath='',$allowext='')
	{
		if(isset($_FILES['ax-files'])) 
		{
            $this->file = new SyncUpload();
        }
        elseif(isset($_GET['ax-file-name'])) 
		{
            $this->file = new AsyncUpload();
        } 
		else 
		{
            $this->file = false; 
        }  
    }

    function uploadfile($remotePath='',$allowext='pdf',$add='')
	{
		$remotePath.=(substr($remotePath, -1)!='/')?'/':'';
		if(!file_exists($remotePath)) mkdir($remotePath,0777,true);
		
        $msg=$this->file->save($remotePath,$allowext,$add);
        return $msg;
    }    
}