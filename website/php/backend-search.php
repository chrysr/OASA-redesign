<?php
// Connecting to the database
$servername="127.0.0.1";
$username="root";
$password="";
$dbname="sdi1500205";

$connection=new mysqli($servername,$username,$password,$dbname);
 
// Check connection
if($connection->connect_error)
    die("Connection failed: ".$connection->connect_error);
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $param  = $_REQUEST["term"];
    $sql="select * FROM timetables WHERE station LIKE '%$param%' AND address LIKE '%$param%' GROUP BY line_name";

    
    if($stmt = mysqli_prepare($connection, $sql)){
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["line_name"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($connection);
?>