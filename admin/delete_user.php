<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

// echo "it works";

if(empty($_GET['id'])) {

    redirect("users.php");

}

$user = User::find_by_id($_GET['id']);

if($user) {

    // $user->delete(); // delete from db

    $user->delete_photo(); // delet from db and photo as well

	$session->message("The {$user->username} user has been deleted");

    redirect("users.php");

} else {

    redirect("users.php");

}

?>