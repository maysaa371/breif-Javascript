<?php
include 'includes/header-user.php';

// $fullName_error = '';
if (isset($_POST['submit'])) {
  $signup_date = date("Y/m/d");
  $check = true;
  $fullName       = $_POST['fullName'];
  $email          = $_POST['email'];
  $pass           = $_POST['pass'];
  $ConfirmPass    = $_POST['ConfirmPass'];

  if (empty($fullName)) {
    $fullName_error = 'please enter User Name';
    $check = false;
  }
  if (empty($email)) {
    $email_error = 'please enter your email ';
    $check = false;
  } else if (!(preg_match("/^[A-z0-9._-]+@(hotmail|gmail|yahoo).com$/", $email))) {
    $email_error = 'Email is not valid';
    $check = false;
  } else {
    $sql = "SELECT * FROM users WHERE user_email='" . $email . "' limit 1 ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $email_error = "The email you entered already exists";
      $check = false;
    }
  }
  if ($_FILES['fileToUpload']['size'] === 0) {
    $img_error = 'please select image';
    $check = false;
  }
  if (empty($pass)) {
    $pass_error = 'please enter your password';
    $check = false;
  } else if (!preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $pass)) {
    $pass_error = 'password is not valid';
    $check = false;
  }
  if (empty($ConfirmPass)) {
    $ConfirmPass_error = 'please enter your password';
    $check = false;
  } else if ($ConfirmPass != $pass) {
    $ConfirmPass_error = 'password is not match';
    $check = false;
  }

  if ($check == true) {

    $file       = $_FILES['fileToUpload'];
    // print_r($file);
    $image = $file["name"];
    $new_image  = uniqid("IMG-", true) . '.png';
    $file_des = "./uploads/" . $new_image;
    move_uploaded_file($file['tmp_name'], $file_des);

    $signup_date = date("Y/m/d");

    $query = "INSERT INTO users(user_img,user_name,user_email,user_password,user_date) VALUES ('$new_image','{$_POST["fullName"]}','{$_POST["email"]}','{$_POST["pass"]}','$signup_date')";
    $exams_query = mysqli_query($conn, $query);

    //////////////////////
    $sql_user = "SELECT * FROM users WHERE user_email='" . $email . "' AND user_password='" . $pass . "' limit 1 ";

    $result_user = mysqli_query($conn, $sql_user);


    if (!isset($_SESSION['user'])) {
      $row2 = $result_user->fetch_assoc();
      $_SESSION['user'] = $row2['user_id'];
    }

    header("Location:index.php");
  }

  $check = false;
  if ($check = true) {
    echo "  ";
  }
  $check = true;
}
?>

<div class="container ">
  <div class="main-w3layouts wrapper ">

    <div class="main-agileinfo">
      <div class="agileits-top">
        <form action="" method="post" enctype="multipart/form-data">
          <h4 align="center" class="mb-5">Sign up</h4>
          <div> <label for="fullName" class="form-label head-photo">User Name</label>
            <input class="text inp-marg" type="text" name="fullName" placeholder="Username" id="fullName">
            <small id="fullNameMessageError" class="form-text"><?php echo (isset($fullName_error)) ? $fullName_error : ""; ?></small>
          </div>

          <div><label for="email" class="form-label head-photo">Email</label>
            <input class="text email inp-marg" type="email" name="email" placeholder="Email" id="email">
            <small id="emailMessageError" class="form-text"><?php echo (isset($email_error)) ? $email_error : "";  ?></small>
          </div>

          <div> <label for="pass" class="form-label head-photo">Password</label>
            <input class="text inp-marg" type="password" name="pass" placeholder="Password" id="pass">
            <small id="passMessageError" class="form-text"><?php echo (isset($pass_error)) ? $pass_error : ""; ?></small>
          </div>

          <div><label for="ConfirmPass" class="form-label head-photo">Confirm Password</label>
            <input class="text w3lpass inp-marg" type="password" name="ConfirmPass" placeholder="Confirm Password" id="ConfirmPass">
            <small id="ConfirmPassMessageError" class="form-text"><?php echo (isset($ConfirmPass_error)) ? $ConfirmPass_error : ""; ?></small>
          </div>

          <div class="mb-3">
            <label for="formFile" class="form-label head-photo">select photo</label>
            <input class="form-control inp-file inp-marg" type="file" id="fileToUpload" name="fileToUpload">
            <small id="imgMessageError" class="form-text"><?php echo (isset($img_error)) ? $img_error : ""; ?></small>
          </div>
          <div class="wthree-text">
            <label class="anim">
              <input type="checkbox" class="checkbox text-dark d-inline">
              <span class="text-dark fw-bold">I Agree To The Terms & Conditions</span>
            </label>
            <div class="clear"> </div>
          </div>
          <input type="submit" value="SIGN UP" name="submit" id="submit">
        </form>
        <p>Already Have an account ? <a href="login2.php"> Login Now!</a></p>
      </div>
    </div>
  </div>
  <!-- //main -->
</div>


















<script src="register/js/signUp.js"></script>




<?php
include 'includes/footer-user.php';
?>