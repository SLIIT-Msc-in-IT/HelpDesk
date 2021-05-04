<?php
include('dbconfig.php');
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {

//////////////////////////////////////////////////// Job No creatian//////////////

//select view the last job no

$sql_tbl_lastjob= "SELECT last_job_no FROM `tbl_last_job`";
$job_rst=mysqli_query($conn,$sql_tbl_lastjob);
$row1= $job_rst->fetch_assoc();

$getinfo="SELECT email,disp_name FROM tbl_users WHERE usr_type = 'H'";
$query = mysqli_query($conn,$getinfo);

$row3 = mysqli_fetch_array($query);

$emailh = $row3['email'];
$disp_name = $row3['disp_name'];



$date=date("Ym");
$FOLIO=1+$row1['last_job_no'];
if($FOLIO<> "")
		{
				while(strlen($FOLIO)<4)
			{
					$FOLIO="0".$FOLIO;
				}
				$job_no=  $date.$FOLIO;
			}
			
		
	
			
			
////////////////////////////////////////////////////////////////////////////////	



	if($_POST['equipments_types'] == ''  )
				{
					$user_equipments_types='';
				}
				else 
				{
					$user_equipments_types= $_POST['equipments_types'];
				}		
			
	if($_POST['fault'] == ''  )
				{
					$user_fault='';
				}
				else 
				{
					$user_fault= $_POST['fault'];
				}		
			
	if($_POST['discription'] == ''  )
				{
					$user_discription='';
				}
				else 
				{
					$user_discription= $_POST['discription'];
				}			
			
//log karapu kena			
$login_user=$_SESSION['userName'];
//error eka una kena
$report_at_user=$_SESSION['report_at'] 	;	
date_default_timezone_set("Asia/colombo");
$date_enter= date("Y-m-d H:i:s");			
				
					
$sql_insert="INSERT INTO tbl_jobs(job_no,report_at,log_by,date_enter,loc_code,dept_code,item,fault_reqt,other_reqt,job_status) VALUES ('$job_no','$report_at_user','$login_user','$date_enter',(select loc_code FROM tbl_users where user_code=$report_at_user),(select dept_code FROM tbl_users where user_code=$report_at_user),'$user_equipments_types','$user_fault','$user_discription','1')";		


///////////

			
	  if (mysqli_query($conn,$sql_insert) === TRUE) {
             	mysqli_query($conn,$sql_insert) ;
			
			/// update last job no +1		
			$sql_update="UPDATE tbl_last_job SET last_job_no=last_job_no+1";
			mysqli_query($conn,$sql_update);
				
				// Email Config

$email=$_SESSION['email'];


//Include required PHPMailer files

//Define name spaces

//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "fixitsolutionpvtltd@gmail.com";
//Set gmail password
	$mail->Password = "fixitsolutionpvtltd@1";
//Email subject
	$mail->Subject = "Support request No $job_no";
//Set sender email
	$mail->setFrom('fixitsolutionpvtltd@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<p>Dear Sir/Madam</p></br><p>You have a request for assistance <br><p>Job No: $job_no </p> </br>.Please log into the web portal and check the status.<br> Regard <br> $disp_name</p>";
//Add recipient
	$mail->addAddress($emailh);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent Mailer Error: "{$mail->ErrorInfo};
	}
//Closing smtp connection
	$mail->smtpClose();


			           
			$_SESSION['message_sucdepo'] = $job_no;    
		header("location:create_New_Job.php");    
     
} else {
 
    
} 

    }
         
    else{
        header("location:index.php");
    }


 ?> 
  




