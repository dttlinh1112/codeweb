<?php  
	$phone = $_POST['phone'];
	$text = "Khách hàng yêu cầu gọi điện tư vấn";

	if (!empty($phone)) {
		// Tiến hành gửi email cho khách
		include_once '../PHPMailer/class.phpmailer.php';
		include_once '../PHPMailer/class.smtp.php';

		$data = '<p><b>Số điện thoại: '.$phone.'</b></p>';
		$data .= '<p>Nội dung: '.$text.'</p>';

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                      // Enable verbose debug output
		    $mail->CharSet = "UTF-8";
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP 

		    $mail->Username   = 'hangover9999999@gmail.com';                     // SMTP username
		    $mail->Password   = 'Phohaiyen1999';  // SMTP password
		    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; 
		    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom('palm@gmail.com', 'PALM | Vua Lẩu Nướng');
		    $mail->addAddress('hangover9999999@gmail.com', 'PALM | Vua Lẩu Nướng');     // Add a recipient

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Khách hàng Yêu Cầu';
		    $mail->Body    = $data;

		    $mail->send();
		} catch (Exception $e) {
		    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		echo "<script>alert('Yêu cầu của bạn đã đươc ghi nhận, chúng tôi sẽ gọi lai ngay cho bạn!');";
		echo "location.href = 'index.php';</script>";
	}else{
		echo "Vui lòng điền số điện thoại!";
	}

	

?>