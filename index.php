<?php
    print "hey\n";
    echo "hello?";
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

    $sql="SELECT * FROM users";
    $result=$connection->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $connection->close();



?>
