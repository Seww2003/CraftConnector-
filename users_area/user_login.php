<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Login Page</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>

    <div class="register">
        <div class="container py-3">
            <h2 class="text-center mb-4">User Login</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post" class="d-flex flex-column gap-4">
                        <!-- username field  -->
                        <div class="form-outline">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" placeholder="Enter your username" autocomplete="off"  name="user_username" id="user_username" class="form-control">
                        </div>
                        <!-- password field  -->
                        <div class="form-outline">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" placeholder="Enter your password" autocomplete="off" name="user_password" id="user_password" class="form-control">
                        </div>
                        <div><a href="" class="text-decoration-underline">Forget your password?</a></div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-primary mb-2" name="user_login">
                            <p>
                                Don't have an account? <a href="user_registration.php" class="text-primary text-decoration-underline"><strong>Register</strong></a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets//js/bootstrap.bundle.js"></script>
</body>

</html>
<?php



// Initialize an array to store error messages
$errors = [];

// Check if the form is submitted
if (isset($_POST['user_login'])) {
    // Retrieve form data
    $user_username = trim($_POST['user_username']); // Trim whitespace
    $user_password = trim($_POST['user_password']); // Trim whitespace

    // Validate form inputs
    if (empty($user_username)) {
        $errors[] = "Username is required."; // Add error message if username is empty
    }
    if (empty($user_password)) {
        $errors[] = "Password is required."; // Add error message if password is empty
    }

    // If there are no errors, proceed with the login process
    if (empty($errors)) {
        // Prepare and execute the SQL statement to select the user based on the username
        $stmt = $con->prepare("SELECT * FROM `user_table` WHERE username = ?");
        $stmt->bind_param("s", $user_username); // Bind parameters to prevent SQL injection
        $stmt->execute(); // Execute the statement
        $select_result = $stmt->get_result(); // Get the result set

        // Check if the user exists
        if ($select_result && $select_result->num_rows > 0) {
            $row_data = $select_result->fetch_assoc(); // Fetch user data
            $hashed_password = $row_data['user_password']; // Get hashed password from the database

            // Verify the password using password_verify
            if (password_verify($user_password, $hashed_password)) {
                $_SESSION['username'] = $user_username; // Set session username

                // Retrieve the user's IP address
                $user_ip = getIPAddress();

                // Check if the user has items in their cart
                $cart_stmt = $con->prepare("SELECT * FROM `card_details` WHERE ip_address = ?");
                $cart_stmt->bind_param("s", $user_ip);
                $cart_stmt->execute();
                $select_cart_result = $cart_stmt->get_result();
                $row_cart_count = $select_cart_result->num_rows;

                // Redirect based on the presence of items in the cart
                if ($row_cart_count == 0) {
                    echo "<script>alert('Login Successfully');</script>";
                    echo "<script>window.open('profile.php', '_self');</script>"; // Redirect to profile
                } else {
                    echo "<script>alert('Login Successfully');</script>";
                    echo "<script>window.open('payment.php', '_self');</script>"; // Redirect to payment
                }
            } else {
                echo "<script>alert('Invalid Credentials');</script>"; // Password does not match
            }
        } else {
            echo "<script>alert('Invalid Credentials');</script>"; // Username does not exist
        }

        // Close the prepared statements
        $stmt->close();
        $cart_stmt->close();
    } else {
        // Display all collected errors as alerts
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
?>
