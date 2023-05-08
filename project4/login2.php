<?php
include 'includes/header-user.php';

if (isset($_POST['submit'])) {
    // $check = true;

    $email          = $_POST['email'];
    $pass           = $_POST['pass'];

    // if empty
    if (empty($pass)) {
        $pass_error = 'please enter your password';
        // $check = false;
    }
    if (empty($email)) {
        $email_error = 'please enter your Email ';
        //    $check = false;
    }


    if (!empty($email) && !empty($pass)) {
        //  if admin
        $sql_admin = "SELECT * FROM admins WHERE admin_email='" . $email . "' AND admin_password='" . $pass . "' limit 1 ";

        $result_admin = mysqli_query($conn, $sql_admin);

        if (mysqli_num_rows($result_admin) == 1) {

            if (!isset($_SESSION['admin'])) {
                $row1 = $result_admin->fetch_assoc();
                $_SESSION['admin'] = $row1['admin_id'];
            }

            header("Location: group-project4/includes/admin_dashboard.php");

          
        } else {
            //  if user
            $sql_user = "SELECT * FROM users WHERE user_email='" . $email . "' AND user_password='" . $pass . "' limit 1 ";

            $result_user = mysqli_query($conn, $sql_user);

            if (mysqli_num_rows($result_user) == 1) {

                if (!isset($_SESSION['user'])) {
                    $row2 = $result_user->fetch_assoc();
                    $_SESSION['user'] = $row2['user_id'];
                    header("location: index.php");
                }

                
           
            } else $email_error = "The email you entered isn’t connected to an account";
        }
    }
}

?>


<!-- main -->
<div class="container">
    <div class="main-w3layouts wrapper bg-none">
        
        <div class="main-agileinfo">
            <div class="agileits-top">

                <form  method="POST">

                <h4 align="center" class="mb-5" >Login</h4>
                    <div><label for="email" class="form-label head-photo">Email</label>
                        <input class="text email inp-marg" type="email" name="email" placeholder="Email" id="email">
                        <small id="emailMessageError" class="form-text"><?php echo (isset($email_error)) ? $email_error : "";
                                                                        ?></small>
                    </div>

                    <div> <label for="pass" class="form-label head-photo">Password</label>
                        <input class="text inp-marg" type="password" name="pass" placeholder="Password" id="pass">
                        <small id="passMessageError" class="form-text"><?php echo (isset($pass_error)) ? $pass_error : "";
                                                                        ?></small>
                    </div>

                    <input type="submit" value="LOGIN" name="submit" id="submit">
                </form>
                <p>Don't have an Account? <a href="signup2.php"> Sign Up!</a></p>
            </div>
        </div>

    </div>
</div>
<!-- //main -->

<script src="register/js/signUp.js"></script>




<?php
include 'includes/footer-user.php';
?>