<form class="col-md-4 row bg-primary-b p-0" method="POST" id="history-ticket-form">
  <fieldset class="form-group p-2 col-md-6 gx-100">
    <label class="text-tetiare-a fs-5  col-form-label" for="language">Language</label>
    <select class="form-control" id="language" name="language">
      <option value="english">English</option>
      <option value="dutch">Dutch</option>
      <option value="chinese">Chinese</option>
    </select>
  </fieldset>

  <fieldset class="form-group p-2 col-md-6 gx-100">
    <label class="text-tetiare-a fs-5 col-form-label" for="date">Date</label>
    <input class="form-control" type="date" id="date" name="date">
  </fieldset>

  <fieldset class="form-group p-2 col-md-6">
    <label class="text-tetiare-a fs-5 col-form-label" for="time">Time</label>
    <select class="form-control" class="col-md-4" id="time" name="time">
      <option value="10:00-13:30">10:00-13:30</option>
      <option value="13:00-15:30">13:00-15:30</option>
      <option value="16:00-18:30">16:00-18:30</option>
    </select>
  </fieldset> 

  <fieldset class="form-group row p-2 col-md-12">
    <div class="col-md-3">
      <label class="text-tetiare-a fs-5 col-form-label" for="single_tickets">Single Ticket</label>
    </div>
    <div class="col-md-2 offset-md-1">
      <label class="text-tetiare-a fs-5 col-form-label text-right" for="single_tickets">€ 17,50</label>
    </div>
    <div class="col-md-4 offset-md-2">
      <input class="form-control" type="number" id="single_tickets" name="single_tickets" min="0">
    </div>
    
  </fieldset>

  <fieldset class="form-group row p-2 col-md-12">
    <div class="col-md-3">
      <label class="text-tetiare-a fs-5 col-form-label" for="family_tickets">Family Ticket</label>
    </div>
    <div class="col-md-2 offset-md-1">
      <label class="text-tetiare-a fs-5 col-form-label text-right" for="single_tickets">€ 17,50</label>
    </div>
    <div class="col-md-4 offset-md-2">
      <input class="form-control" type="number" id="family_tickets" name="family_tickets" min="0">
    </div>
  </fieldset>

  <input type="cancel" value="cancel" class="btn btn-secondary col-md-4">
  <input type="submit" name="submit" value="Submit" class="btn btn-primary col-md-8">
</form>
<?php
require_once "../vendor/autoload.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])) {
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->isSMTP();                                             
      $mail->Host       = 'smtp-relay.sendinblue.com';                        
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'janjaapvanlaar@gmail.com';                   
      $mail->Password   = 'V5JKvcpqUnz0GX6W';                     
      $mail->SMTPSecure = 'tls';                                  
      $mail->Port       = 587;                                    

      //Recipients
      $mail->setFrom('Haarlem@festival.nl', 'Haarlem festival');
      $mail->addAddress('janjaap.vanlaar2001@gmail.com', 'Recipient Name');     
      $mail->addReplyTo('Haarlem@organisation.festival.nl', 'Haarlem festival organisation');

      // Content
      $mail->isHTML(true);                                  
      $mail->Subject = 'Testing PHPMailer';
      $mail->Body    = 'Hello, this is a test email sent from PHPMailer.';

      $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}