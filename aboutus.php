<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <style>
        *{
            margin:0px;
            padding:0px;
            box-sizing:border-box;
            font-family:'Roboto', sans-serif;
        }
        body{
            background-color:#f2f2f2;
        }
        .heading{
            width: 90%;
            display: flex;
            justify-content: center;
            align-items:center;
            flex-direction:column;
            text-align:center;
            margin:20px auto;
        }
        .heading h1{
                font-size:50px;
                color:#000;
                margin-bottom:25px;
                position: relative;
        }
        .heading h1::after{
            content:"";
            position: absolute;
            width: 100%;
            height:4px;
            display: block;
            margin: 0 auto;
            background-color:#DB4444;
        }
        .heading p{
            font-size:18px;
            color:#666;
            margin-bottom:35px;
        }
        .container{
            width: 90%;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }
        .about-image{
            flex:1;
            margin-right:40px;
            overflow:hidden;
        }
        .about-image img{
            max-width:100%;
            height:100vh;
            display: block;
            transition:0.5s ease
        }
        .about-image:hover img{
            transform:scale(1.2);
        }
        .about-content{
            flex:1;
        }
        .about-content h2{
            font-size:23px;
            margin-bottom:15px;
            color:#DB4444;
        }
        .about-content p{
            font-size:18px;
            line-height:1.5;
            color:black;
        }
        .about-content .read-more{
            display:inline-block;
            padding:10px 20px;
            color:#DB4444;
            font-size:19px;
            text-decoration:none;
            border-radius:25px;
            margin-top:15px;
            transition:0.3s ease;
        }
        .about-content .read-more:hover{
            background-color:#3e8e41;

        }
        @media screen and (max-width:768px;) {
           .heading{
            padding:0px 20px;
           }
           .heading p{
            font-size:17px;
            margin-bottom:0px;
           }
           .container{
            padding:0px;
           }
           .about{
            padding:20px;
            flex-direction:column;
           }
           .about-image{
            margin-right:0px;
            margin-bottom:20px;
           }
           .about-content p{
            padding:0px;
            font-size:16px;
            grid-template-columns: 1fr;
           }
           .about-content .read-more{
            font-size:16px;
           }
        }

        ul{
    list-style: none;
 }
 .footer{
    background-color:#24262b;
    padding:70px 0;
 }

.footer-col h4{
    font-size:18px;
    color:#ffff;
    text-transform:capitalize;
    margin-bottom:35px;
    font-weight:500;
}
.footer-col ul li:not(:last-child){
    margin-bottom:10px;
}
.footer-col ul li a{
    font-size:16px;
    text-transform:capitalize;
    color:#ffff;
    text-decoration:none;
    font-weight:300;
    color:#bbbb;
    display:block;
    transition:all 0.3s ease;
}
.footer-col ul li a:hover{
    color: #DB4444;

}
.footer-col .social-links{
    display:inline-block;
    height:40px;
    width:40px;
    margin-right:0 10px 10px 0;
   border-radius:50;
    line-height:40px;
}
    </style>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <!-- upper-nav -->
     <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale - OFF 50%! <a>Shop Now</a></span>
    </div>
    <!-- upper-nav -->
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">CraftConnecter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./aboutus.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contactus.php">Contact</a>
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

    <div class="heading">
        <h1>About Us</h1>
        <p>Craft Connecter is a platform that connects artisans and craft lovers,
             celebrating the beauty of handmade creations. Discover unique crafts, connect with creators,
              and share your passion for creativity with us!</p>
    </div>
    <div class="container">
        <section class="about">
                <div class="row">
                    
                  <div class="col-md-6">
                     <div class="about-image">
                        <img src="./images/abu2.jpg" alt="">
                        </div>
                 </div>           
            
            
                 <div class="col-md-6">
                      <div class="about-content">
                           <h2><center>Your Fav</center></h2>
                             <p>Welcome to Craft Connecter, your go-to platform for discovering and connecting with talented 
                                 artisans from around the world. Our mission is to celebrate the beauty of handmade crafts by bringing
                                 together creators and enthusiasts in a vibrant community. 
                                 Whether you're looking for unique, handcrafted items or want to showcase your own creations,
                                 Craft Connecter is here to inspire and support your journey. Join us in promoting craftsmanship,
                                  creativity, and the stories behind every piece of art. </p>
                                 <a href="" class="read-more">Read More</a>
                        </div>
                 </div>

                </div>
                
            </div>
        </section>
    </div>


    <footer class="footer">
        
        <div class="container" style="max-width:1170px;margin:auto;">
            <div class="rwo" style="display:flex;flex-wrap:wrap;">
                <div class="footer-col" style=" width: 25%;padding: 0 15px;">
                    <h4 >Company</h4>
                    <ul>
                        <li><a href="./aboutus.php">About us</a></li>
                        <li><a href="./products.php">Products</a></li>
                        <li><a href="./users_area\user_login.php">Login</a></li>
                        <li><a href="./users_area/user_registration.php">Register</a></li>
                    </ul>
                </div>
                <div class="footer-col" style=" width: 25%;padding: 0 15px;">
                    <h4>Get help</h4>
                    <ul>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Shop</a></li>
                        <li><a href="">order</a></li>
                        <li><a href="">Payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col" style=" width: 25%;padding: 0 15px;">
                    <h4>Online shop</h4>
                    <ul>
                        <li><a href="products.php">Bags</a></li>
                        <li><a href="products.php">Jewellary</a></li>
                        <li><a href="products.php">Wooden</a></li>
                        <li><a href="products.php">Paper Crafts</a></li>
                    </ul>
                </div>
                <div class="footer-col" style=" width: 25%;padding: 0 15px;">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href=""><i class="bx bxl-facebook"></a>
                        <a href=""><i class="bx bxl-instagram-alt"></a>
                        <a href=""><i class="bx bxl-twitter"></a>
                        <a href=""><i class="bx bxl-linkedin"></a>

                </div>
                </div>
               
            </div>
        </div>
        <div class="copyright">
        <p style="color:#ffff; text-align:center;">Copyright @ 2024 by CraftConnecter- Html Css Js</p>
      </div>

    </footer>
</body>
</html>