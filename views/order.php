<section id="order">

	<img style="width: 100%;" src="https://hotpotstory.vn/wp-content/uploads/2019/07/banner_trong_2.jpg" alt="">

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-12 col-sm-12" style="margin-top: 30px;">

				<h5><strong>THÔNG TIN ĐẶT BÀN ONLINE</strong></h5>
				<h6><i>(Vui lòng đặt bàn trước giờ dùng bữa ít nhất 1 tiếng, thời gian đặt bàn trong ngày hôm nay cho tới 10 ngày tiếp theo)</i></h6>

				<form method="POST" name="frm_order" action="" style="margin: 20px 0px;">
					<label>Thời gian đặt bàn</label>
					<div class="form-row">

						<div class="form-group col-md-4 col-sm-4 col-lg-4">
							<input type="text" readonly="" required="" class="form-control" id="date_order" placeholder="Ngày đặt bàn" name="date_order">
						</div>

						<div class="form-group col-md-4 col-sm-4 col-lg-4">
							<select name="hour" id="hour" class="form-control ">
								<option value="10">10 Giờ</option>
								<option value="11">11 Giờ</option>
								<option value="12">12 Giờ</option>							
								<option value="17">17 Giờ</option>
								<option value="18">18 Giờ</option>
								<option value="19">19 Giờ</option>
								<option value="20">20 Giờ</option>
							</select>
						</div>

						<div class="form-group col-md-4 col-sm-4 col-lg-4">
							<select name="minute" id="minute" class="form-control ">
								<option value="00">00</option>
								<option value="15">15</option>
								<option value="30">30</option>
								<option value="45">45</option>
							</select>
						</div>

					</div>

					<div class="form-group">
						<label for="">Số người đặt</label>
						<select name="order_per" id="order_per" class="form-control ">
							<option value="1">1 người</option>
							<option value="2">2 người</option>
							<option value="3">3 người</option>							
							<option value="4">4 người</option>
							<option value="5">5 người</option>
							<option value="6">6 người</option>
							<option value="7">7 người</option>
							<option value="8">8 người</option>
							<option value="9">9 người</option>
							<option value="11">11 người</option>
							<option value="12">12 người</option>
							<option value="13">13 người</option>
							<option value="14">14 người</option>
							<option value="15">15 người</option>
							<option value="16">16 người</option>
							<option value="17">17 người</option>
							<option value="18">18 người</option>
							<option value="19">19 người</option>
							<option value="20">20 người</option>
						</select>
					</div>

					<div class="form-group">
						<input type="text" required="" class="form-control" name="name" id="inputName" placeholder="Họ tên...">
					</div>
					<div class="form-group">
						<input type="number" required="" class="form-control" name="phone" id="inputPhone" placeholder="Số điện thoại">
					</div>
					<div class="form-group">
						<input type="email" required="" class="form-control" name="email" id="email" placeholder="Email">
					</div>

					<div class="text-center">                          	
                      	<button type="submit" name="submit" class="btn btn-default btn-submit pull-center"style="background-color:#D71A21;color:#fff;font-weight:bold;">
                      		ĐẶT BÀN NGAY
                      	</button>
                    </div>
				</form>
			</div>
		</div>
	</div>

</section>

<?php  
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		$date_order = $_POST['date_order'];
		$date_orders = str_replace('/', '-', $date_order);
		$date = date("Y-m-d", strtotime($date_orders));

		$hour = $_POST['hour'].'h';
		$minute = $_POST['minute'];
		$times = $hour.$minute;
		$order_per = $_POST['order_per'];

		$sql = "INSERT INTO tbl_order(name, phone, email, date_order, times_order, person_oder) VALUES('$name', '$phone', '$email', '$date', '$times', $order_per);";
		$query = mysqli_query($conn, $sql);
		if ($query) {

		// Tiến hành gửi email cho khách
		include_once 'PHPMailer/class.phpmailer.php';
		include_once 'PHPMailer/class.smtp.php';

		$data = '<html lang=""><head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Mail đặt Bàn</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			</head>
			<body>

				<div class="container">
					
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<p>
								Cảm ơn QK đã bàn tại PALM - Vua Lẩu Nướng!
							</p>
							<p>
								Rất hân hạnh được đón tiếp và phục vụ quý khách. Xin cảm ơn!
								<br><i>Mọi thắc mắc xin liên hệ: <a href="tel:18008899">1800 8899</a></i>
							</p>
							<p> Thông tin đặt bàn của QK như sau:</p>
							<table class="table table-bordered table-hover" border="1">
								<thead>
									<tr>
										<th>Họ tên</th>
										<th>Số điện thoại</th>
										<th>Số lượng người</th>
										<th>Ngày đặt</th>
										<th>Thời gian</th>
									</tr>
								</thead>
								<tbody><tr>';
								$data .= '<td>'.$name.'</td>';
								$data .= '<td>'.$phone.'</td>';
								$data .= '<td>'.$order_per.'</td>';
								$data .= '<td>'.$date.'</td>';
								$data .= '<td>'.$times.'</td>';
								$data .= '
									</tr>
								</tbody>	
							</table>
						</div>
					</div>
				</div>
				

				<script src="//code.jquery.com/jquery.js"></script>
				<!-- Bootstrap JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			</body>
		</html>';

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
		    $mail->addAddress($email, $name);     // Add a recipient

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Thông báo đặt bàn tại PALM';
		    $mail->Body    = $data;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
			echo "<script>alert('Yêu cầu đặt bàn của bạn đã được chúng tôi ghi nhận. Xin cảm ơn!!');";
			echo "location.href = 'index.php';</script>";
		}
	}
?>