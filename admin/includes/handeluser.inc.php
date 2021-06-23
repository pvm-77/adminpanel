<?php
session_start();
include('../config/dbconnection.php');

// check add user button click or not
if(isset($_POST['adduser'])){
    // fetched here form data 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    // insert data into users table
    $add_user_query="INSERT INTO `users` ( `name`, `phone`, `email`, `password`) VALUES ('$name', '$phone', '$email', '$password')";
    $add_user_query_run=mysqli_query($con,$add_user_query);
    if($add_user_query_run){
        
        $_SESSION['status']="user added successfully";
        header("Location: ../register.php");

    }
    else{
        
        $_SESSION['status']="user registration failed";
        header("Location: ../register.php");
    }


}

//check uddate user button click or not
if(isset($_POST['updateuser'])){
    // fetched here form data 
    $user_id=$_POST['user_id'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    // update data into users table
    $query="UPDATE users SET name='$name',email='$email',password='$password',phone='$phone' WHERE id='$user_id'";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        $_SESSION['status']="user updated  successfully";
        header("Location: ../register.php");
        

    }
    else{
        
        $_SESSION['status']="user updation failed";
        header("Location: ../register.php");
    }


}

//check delete button click
if(isset($_POST['DeleteUserbtn'])){
    // fetched here form data 
    $delete_user_id=$_POST['delete_id'];
    
    // delete data into users table
    $query="DELETE FROM `users` WHERE `users`.`id` = '$delete_user_id'";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        $_SESSION['status']="user deleted  successfully";
        header("Location: ../register.php");
        

    }
    else{
        
        $_SESSION['status']="user deleted failed";
        header("Location: ../register.php");
    }


}

?>