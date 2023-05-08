<?php
include 'includes/header-user.php';
$user_id_session = $_SESSION['user'];
$conn = mysqli_connect("localhost", "root", "", "ecommerce") or die($conn->err);
$imagepath = "";

function path()
{
    global $imagepath;
    $image = $_FILES['filename'] ?? null;
    $imagepath  = "";
	
    if ($image && $image['tmp_name']) {
        $imagepath = uniqid() . $image['name'];
		$file_des   = "./group-project4/uploads/".$imagepath; //file destination
        move_uploaded_file($image['tmp_name'], $file_des);
    }
}
if (isset($_POST['update'])) {
    $user_id       = $_POST['userId'];
    $user_name     = $_POST['user_name'];
    $user_email    = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    path();
    if (!$imagepath) {
        $sql = "SELECT * from users WHERE user_id = '{$_SESSION['user']}'";
        $result = mysqli_query($conn, $sql);
        $row   =  mysqli_fetch_assoc($result);
        $imagepath =  $row['user_img'];
    }
    $conn->query("UPDATE users SET user_name ='$user_name',
        user_email = '$user_email',
        user_password ='$user_password',
        user_img = '{$imagepath}'  WHERE user_id = '$user_id_session' ");
}


$query = "SELECT * FROM users  WHERE user_id = $user_id_session ";

$result = $conn->query($query);
$row = $result->fetch_assoc();


?>




<!-- Content page -->
<div class="sec-banner bg0 p-t-150 p-b-50">
	<div class="container  m-auto justify-content-center ">
		<div class="row w-25  m-auto justify-content-center p-b-50 rounded-circle">
			
				<img src="./group-project4/uploads/<?php echo @$row['user_img'] ?>" class="card-img-top img-prof" alt="...">
			
		</div>
		<div class="card mt-3 p-3 d-flex flex-column justify-content-center w-50 m-auto ">
			<h4 class=" mb-5">User Info</h4>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="userId" value="<?php echo @$row['user_id'] ?> ">
				<div class=" mb-3  ">
					<div class="input-group-text " id="inputGroup-sizing-default ">Username</div>
					<input type="text" value="<?php echo @$row['user_name'] ?> " name="user_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
				</div>
				<div class=" mb-3  ">
					<span class="input-group-text" id="inputGroup-sizing-default">User Email</span>
					<input type="text" value="<?php echo @$row['user_email'] ?> " name="user_email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
				</div>
				<div class=" mb-3">
					<span class="input-group-text d-block" id="inputGroup-sizing-default">Password </span>
					<input type="password" value="<?php echo @$row['user_password'] ?> " name="user_password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
				</div>
				<!-- <div>
					<input type="file" id="myFile" name="filename">
				</div> -->
				<div class="mb-3">
                        <label for="myFile" class="form-label head-photo">select photo</label>
                        <input class="form-control inp-file inp-marg" type="file" id="myFile" name="filename">
                        
                    </div> 
				<div class="form-actions form-group float-right w-25 ">
					<button type="submit" id="update_profile" class="btn btn-primary btn-sm w-100 p-2" name="update"> Save Changes</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
include 'includes/footer-user.php';
?>