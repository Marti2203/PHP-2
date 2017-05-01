<?php
class Car{
	public $model;
	public $productionYear;
	public $trademark;
	public $engineSize;
	function __construct($model,$productionYear,$trademark,$engineSize){
	$this->model=$model;
	$this->productionYear=$productionYear;
	$this->trademark=$trademark;
	$this->engineSize=$engineSize;
	}
}
class User{
	public $firstName;
	public $familyName;
	public $age;
	public $sex;
	public $email;
	public $secondEmail;
	public $securityQ;
	public $cars;
	public $securityA;
	public $password;
	public $isAdmin;
	public $profilePicture;
       function __construct($firstName,$familyName,$age,$sex,$email,$secondEmail,$securityQ,$cars,$securityA,$password,$profilePicture,$isAdmin) {
	       $this->firstName=$firstName;
	       $this->familyName=$familyName;
	       $this->age=$age;
	       $this->sex=$sex;
	       $this->email=$email;
	       $this->secondEmail=$secondEmail;
	       $this->securityQ=$securityQ;
	       $this->cars=$cars;
	       $this->securityA=$securityA;
	       $this->password=$password;
	       $this->profilePicture=$profilePicture;
	       $this->isAdmin=$isAdmin;
   }
}
class Workman extends User{
	public $profession;
	public $paymentPerHour;
	public $approve;
	public $disapprove;
	public $neutral;
	function __construct($firstName,$familyName,$age,$sex,$email,$secondEmail,$securityQ,$cars,$securityA,$password,$profilePicture,$profession,$paymentPerHour) {
		parent::__construct($firstName,$familyName,$age,$sex,$email,$secondEmail,$securityQ,$cars,$securityA,$password,$profilePicture,false);
		$this->profession=$profession;
		$this->paymentPerHour=$paymentPerHour;
		$this->approve=0;
		$this->disapprove=0;
		$this->neutral=0;
   }
}
function uploadValid($info)
{
	$targetPosition=basename($info["name"]);
	$imageFileType = pathinfo($targetPosition,PATHINFO_EXTENSION);
	$uploadOk = true;

    	if(getimagesize($info["tmp_name"])===false)
		$uploadOk = false;
	/* if (file_exists($targetPosition)) {
	    	print 'Sorry, file already exists.';
	    	$uploadOk = false;
	} */
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    	print 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
	    	$uploadOk = false;
	}
	return $uploadOk;
}
function emailValid($email)
{
	return true; //TESTING
	print preg_match(".+@.+",$email);
	if(preg_match(".+@.+",$email)===1)
		return true;
	else return false;
}
function checkExistance($file)
{
		if(file_exists($file)){
		$handle=fopen($file,'r') or print "UNABLE TO OPEN FILE";
			while(!feof($handle)){
				$line=fgets($handle);
				if($line!=null)
				{
				$worker=unserialize($line);
				if(($worker->firstName===$_POST['firstName'] && $worker->familyName===$_POST['familyName']) 
					|| $worker->email===$_POST['email']) return true;
				}
				}
			
			fclose($handle);
			}
			return false;
	}

$names=array("MartinMirchev","KiroIvanov");
$workers='info/workers.txt';
$users='info/users.txt';
$pictures='pictures/';
$texts='texts/';
$comments='texts/comments';
$replies='texts/replies';
$data='data/';

?>
