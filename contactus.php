<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>
<?php
$status="";
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

     $header ="from:{$email}\r\nContent-Type: text\html;";


   $send_mail_result= mail($to,$email_subject, $email_body,  $header);

   if(  $send_mail_result){

    $status= '<p class="success"> Message sent successfully</p>';
   }
   else{
    $status= '<p class="error"> Message was not sent</p>';
   }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
   <style>
    p.success{
        background:green;
        color:white;
        padding:15px;
        text-align:center;

    }
    p.error{
        background:red;
        color:white;
        padding:15px;
        text-align:center;
        
    }
   </style>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
   <link rel="stylesheet" href="./contactus.css">
   <link rel="stylesheet" href="./assets/css/main.css" />
   <link rel="stylesheet" href="./assets/css/bootstrap.css" />
</head>
<body>
 <!-- upper-nav -->
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container" style=" background-color:white;">
            <a class="navbar-brand fw-bold" href="#">CraftConnecter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php"><b>Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./products.php"><b>Products</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php"><b>About</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php"><b>Contact</b></a>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){                            
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                        }
                        else{
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                    ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./cart.php"><svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 5H7L10 22H26" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 16.6667H25.59C25.7056 16.6667 25.8177 16.6267 25.9072 16.5535C25.9966 16.4802 26.0579 16.3782 26.0806 16.2648L27.8806 7.26479C27.8951 7.19222 27.8934 7.11733 27.8755 7.04552C27.8575 6.97371 27.8239 6.90678 27.7769 6.84956C27.73 6.79234 27.6709 6.74625 27.604 6.71462C27.5371 6.68299 27.464 6.66661 27.39 6.66666H8" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <sup>
                                <?php
                                cart_item();
                                ?>
                            </sup>
                            <span class="d-none">
                                Total Price is: 
                                <?php
                                total_cart_price();
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="d-flex align-items-center gap-1" href="#">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo "<span>
                                    Welcome guest
                                </span>";
                            }else{
                                    echo "<span>
                                    Welcome ".$_SESSION['username']. "</span>";
                                }
                                ?>
                        </a>
                    </li>
                    <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>
                            Login
                        </a>
                    </li>";
                }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>
                            Logout
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End NavBar -->

    <div class="container"  style="background-color:#f8cea6 ;">
        <h1 style="text-align:center;">Contact Us</h1>
        <?php echo $status; ?>
        <br>
        <div class="contact-wrapper">
            <div class="contact-form">
        <form action="contactus.php" method="post">
        
            <div class="form-group">
            <label for="fullname" style="font-size:20px;margine-bottom:20px;color:#33333;">Full Name:</label>
            <input type="text" name="fullname" id="fullname" required>
            </div>
                
           
             <div class="form-group">
            <label for="email"  style="font-size:20px;margine-bottom:20px;color:#33333;">Email:</label>
              <input type="email" name="email" id="email" required>
             </div>

            <div class="forn-group">
            <label for="subject"  style="font-size:20px;margine-bottom:20px;color:#33333;">Subject:</label>
            <input type="subject" name="subject" id="subject" required>
            </div>
          
            <div class="form-group">
            <label for="message"  style="font-size:20px;margine-bottom:20px;color:#33333;">Message:</label>
            <textarea name="message" cols="30" rows="10" id="message" required></textarea>
            </div>
            
           
            <p>
                <button type="submit" name="submit" style="  padding: 12px 28px;
    background-color: #4caf50;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px; cursor:pointer; "> Send Message</button>
            </p>


        </form>

    </div>
    <div class="contact-info">
        <h3>Contact Information</h3>
        <p><i class="fas fa-phone"></i>0740525597</p>
        <p><i class="fas fa-envelope"></i>info@gmail.com</p>
        <p><i class="fas fa-location"></i>kandy,Srilanka</p>
    </div>
    
</body>
</html>