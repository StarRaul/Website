<?php
session_start();
require_once "connection.php";
$msg="";
if(isset($_POST['upload']))
{
    if(isset($_FILES['imagine']))
    {
        if(isset($_POST['scor']))
        {
            
        }
        else
        {
            header("Location: alanwake.php");
        }
        $target="./images/". md5(uniqid(time())).basename($_FILES['imagine']['name']);
        $text=$_POST['text'];
        $sql="INSERT INTO placements(imagine, scor, nume) VALUES('$target', '$text', '".$_SESSION['currentuser']."')";
            mysqli_query($con, $sql);
        if(move_uploaded_file($_FILES['imagine']['tmp_name'], $target))
        {
            header("Location: alanwake.php");
        }
        else
        {
            header("Location: alanwake.php");
            echo $msg;
        }
    }
    else
    {
        header("Location: alanwake.php");
    }
}