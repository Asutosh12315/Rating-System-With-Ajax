<?php 

require_once("DB.php");

if(isset($_POST['id'])){


$id=$_POST['id'];
$user_id=$_POST['user_id'];

$test="SELECT user_id FROM rate WHERE user_id='$user_id'";

$result= $conn->query($test);

$row=$result->fetch_assoc();

if ($row ["user_id"]) {
    
    $query="UPDATE rate set id='$id' WHERE user_id='$user_id'";

    mysqli_query($conn,$query);


} else {
  
    $sql="INSERT INTO rate(id,user_id) VALUES ('$id','$user_id')";

    mysqli_query($conn,$sql);

}



}




?>