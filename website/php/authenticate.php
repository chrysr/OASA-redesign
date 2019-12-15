<?php
// Start the session
session_start();
?>
<?php
    $required = array('card', 'password');

    // Loop over field names, make sure each one exists and is not empty
    $error = false;
    foreach($required as $field) {
      if (empty($_POST[$field])) {
        $error = true;
      }
    }
    
    if ($error) {
      echo "All fields are required.";
    } else {
      echo "Proceed...";
      
      sleep(1);
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$_POST['card'];
      header('Location: ./login.php');
      //set env for signin/signup
      die();
    }
        

    echo "\nSET ".(empty($_POST['card'])?"nocard":$_POST['card'])." ".(empty($_POST['password'])?"nopass":$_POST['password']);

?>