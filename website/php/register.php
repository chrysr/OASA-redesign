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
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
        
        $connection=new mysqli($servername,$username,$password,$dbname);
        
        if($connection->connect_error)
        {
            die("Connection failed: ".$connection->connect_error);
        }
        print "ok";

        $sql="SELECT * FROM users WHERE users.card=".$_POST['card']." and users.password=".$_POST['password'];
        print $sql;
        if($result=$connection->query($sql)&&$result->num_rows>0)
        {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $connection->close();
        sleep(1);
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$_POST['card'];
        header('Location: ./login.php');
        //set env for signin/signup
        die();
    }
        

    echo "\nSET ".(empty($_POST['card'])?"nocard":$_POST['card'])." ".(empty($_POST['password'])?"nopass":$_POST['password']);

?>