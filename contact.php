<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sander Buruma | Fullstack Jr Webdeveloper</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="contact.css">
  <link rel="icon" href="http://icons.iconarchive.com/icons/icons-land/vista-people/32/Office-Customer-Male-Light-icon.png"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
  <div id="wrapper">
    <div id="header">
      <div id="myname">
        <h1>Neem contact met mij op</h1> 
        <img id="portret" src="img/myAvatar.svg" alt="Mooie illustratie van Sander gemaakt met een avatar generator">
        <form action="contact.php" method="POST">
          <input id="contact-name" name="name" type="text" placeholder="John Doe">
          <input id="contact-email" name="email" type="email" placeholder="johndoe15@yahoo.com">
          <textarea id="contact-message" name="message" type="textarea" placeholder="Hallo! Wat een mooite website heb je daar! Kan je zo ook eentje voor mij maken? Ik wil graag een simpele website met mijn CV wat fotos en een verhaaltje over mij. Met vriendelijke groet, John
          
          ps. geld is geen kwestie"></textarea>
          <input id="contact-submit-btn" type="submit" name="submit" value="Verstuur!">
        </form>
        <img id="desktop" src="img/bgheaderbottom.png" alt="Afbeelding met laptop, kopje koffie, tablet en schermen">
      </div>
    </div>
  </div>
</body>
</html>
<?php
# form submission code
if (isset($_POST['name']))
{
  <?php
require('phpmailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "sanderburuma@gmail.com";
$mail->Password = "replacemeonceuploadedontheserver";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("Your from email", "from name");
$mail->AddReplyTo($_POST['email'], "PHPPot");
$mail->AddAddress("sanderburuma@gmail.com");
$mail->Subject = "Test email using PHP mailer";
$mail->WordWrap   = 80;
$content = $_POST['message'] . " <b>This is a test email using PHP mailer class.</b>"; $mail->MsgHTML($content);
$mail->IsHTML(true);
if(!$mail->Send()) 
echo "Problem sending email.";
else 
echo "email sent.";
?>
}