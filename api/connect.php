<?php 

$connect = mysqli_connect("localhost","root","","voting") or die("Not connected !");

if($connect){
    echo "Connected !";
}else{
    echo "Not connected";
}

?>
