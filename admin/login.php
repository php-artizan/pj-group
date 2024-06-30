<?php

require "config/global.php";

$error = false;


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    // dd($_POST);

    $query = $db->query("SELECT * FROM users WHERE email = '$username' AND pass = '$password' ");

    if(mysqli_num_rows($query) != 0){

        $user = mysqli_fetch_assoc($query);
        // dd($user);

        $_SESSION['admin_id'] = $user['id'];




    } else {
        $error = "invalid credentials";
    }

    


    // if ($user) {

    //     $_SESSION['user_id'] = 1;
    //     redirect("index");
    // } else {
    //     $error = "Invalid Credentials";
    // }
    // dd($users);



}


?>

<?php 
if($error){
    echo "<div class='alert alert-danger'>$error</div>";
}

?>
<form action="" method="POST">

    <input type="text" name="username">
    <input type="password" name="password">

    <input type="submit" name="login">

</form>