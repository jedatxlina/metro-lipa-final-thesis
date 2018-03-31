<?php
/* User login process, checks if user exists and password is correct */

// Escape id to protect against SQL injections
$id = $conn->escape_string($_POST['id']);
$result = $conn->query("SELECT * FROM user_account WHERE AccountID='$id'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that Account ID doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if (password_verify($_POST['pass'], $user['Passwordd'])) {
        
        $_SESSION['id'] = $user['AccountID'];
        $_SESSION['accesstype'] = $user['AccessType'];
        $_SESSION['password'] = $user['Passwordd'];
        $_SESSION['email'] = $user['Email'];
        
        $_SESSION['logged_in'] = true;
        
        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

