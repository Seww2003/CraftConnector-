<?php
include_once('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>
<?php
 if(isset($_POST['submit'])){
    $fullname= $_POST['fullname'];
    $email =$_POST['email'];
    $subject =$_POST['subject'];
    $message =$_POST['message'];

     $to= 'sewwandisenavirathna887@gmail.com';
     $email_subject='Message from web site';
     $email_body="Message from contact us page:<br>";
     $email_body="<B>from:</B>($fullname) <br>";
     $email_body="<B>Subject:</B>($subject) <br>";
     $email_body="<B>Message:</B><br>" .nl2br(strip_tags($message));
    mail(to,subject, message)
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <div class="container">
        <form action="contactus.php" method="post">
            <p>
                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" id="fullname" required>
            </p>

            <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            </p>

            <p>
            <label for="subject">Email:</label>
            <input type="subject" name="subject" id="subject" required>
            </p>
            <p>
            <label for="message">Message:</label>
            <textarea name="message" cols="30" rows="10" id="message" required></textarea>
            </p>
            <p>
                <button type="submit" name="submit"> Send Message</button>
            </p>

        </form>
    </div>
    
</body>
</html>