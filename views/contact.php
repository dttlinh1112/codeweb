<section id="contact" class="contact" style="margin-top: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4" data-aos="fade-right">
        <div class="section-title">
          <h2>Liên hệ</h2>
          <p>Khách hàng có thể liên hệ với chúng tôi qua địa chỉ, số điện thoại hoặc email để được hỗ trợ. Xin cảm ơn!</p>
        </div>
      </div>

      <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8027191201227!2d105.86535211420279!3d21.04057828599194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abda7f53feb5%3A0xe1f4f1f4b60acc08!2zNDEgTmd1eeG7hW4gVsSDbiBD4burLCBOZ-G7jWMgTMOibSwgTG9uZyBCacOqbiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1591630964357!5m2!1svi!2s" frameborder="0" allowfullscreen></iframe>
        <div class="info mt-4">
          <i class="icofont-google-map"></i>
          <h4>Địa chỉ:</h4>
          <p>41 Nguyễn Văn Cừ - Long Biên - Hà Nội</p>
        </div>
        <div class="row">
          <div class="col-lg-6 mt-4">
            <div class="info">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>hotro@palm.com</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="info w-100 mt-4">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>1800 8899</p>
            </div>
          </div>
        </div>

        <form action="" method="post" class="mt-4">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" required="" id="name" placeholder="Họ tên..." />
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" required="" name="email" id="email" placeholder="Email..." />
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" required="" name="subject" id="subject" placeholder="Tiêu đề..." />
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" required="" rows="5" placeholder="Nội dung..."></textarea>
          </div>
          <div class="text-center"><button type="submit" class="btn" style="background-color: #009970; color: #fff;" name="submit_contact">Gửi liên hệ</button></div>
        </form>
      </div>
    </div>

  </div>
</section>

<?php  
  if (isset($_POST['submit_contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    // Tiến hành gửi email cho khách
    include_once 'PHPMailer/class.phpmailer.php';
    include_once 'PHPMailer/class.smtp.php';

    $data = "Họ tên: ".$name."<br>";
    $data .= "Email: ".$email."<br>";
    $data .= "Tiêu đề: ".$subject."<br>";
    $data .= "Nội dung: ".$message."<br>";

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;  
        $email_send = 'hangover9999999@gmail.com';    // Enable SMTP 

        $mail->Username   = 'hangover9999999@gmail.com';                     // SMTP username
        $mail->Password   = 'Phohaiyen1999';  // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; 
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('palm@gmail.com', 'PALM | Vua Lẩu Nướng');
        $mail->addAddress($email_send, $name);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Thông tin liên hệ';
        $mail->Body    = $data;

        $mail->send();
        echo 'Message has been sent';
    }catch(Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo "<script>alert('Yêu cầu của QK đã được chúng tôi ghi nhận. Xin cảm ơn!!');";
    echo "location.href = 'index.php';</script>";
    }
?>