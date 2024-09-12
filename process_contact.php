
<?php
    session_start();
    include('config.php');
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $subject = $_POST["subject"];
   $qry=mysqli_query($con,"insert into tbl_lienhe values(NULL,'$name','$email',$mobile,'$subject')");
    $_SESSION['success']="Gửi Thành công";

    //phpmailer
    require("./PHPMailer-master/src/PHPMailer.php");
	require("./PHPMailer-master/src/SMTP.php");
	require("./PHPMailer-master/src/Exception.php");
	$email = $_POST["email"] ;
	$name = $_POST["name"] ;
	$phone = $_POST["mobile"] ;
	$message = $_POST["subject"] ;
	
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl';  
	$mail->Host = "smtp.gmail.com";
	
	
	$mail->Port = 465; //SMTP port
	$mail->Username = "cuongceofa@gmail.com"; // SMTP username
	$mail->Password = "amyztcrsaftoalni"; // SMTP password
	$mail->From = $email;
	
	$mail->addAddress("cuongceofa@gmail.com","Cuong Le");
	$mail->isHTML(true);
	$mail->Subject = "You have an email from a website visitor!";
	$mail->Body ="
	Tên: $name<br>
	Email: $email<br>
	Số điện thoại: $phone<br><br><br>
	Góp ý: $message";
	$mail->AltBody = $message;

	if(!$mail->Send())
	{
	echo "Message could not be sent. <p>";
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
	}

    header("location:contact.php");

?>