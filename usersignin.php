<?php
include('database.php');
$showAlert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $passwords=$_POST["passwords"];
    $cpassword=$_POST["cpassword"];
    // $exists==false;
    if($passwords== $cpassword){
        $sql="INSERT INTO `user`( `name`, `mobile`, `passwords`, `email`, `added_on`) VALUES ('$name','$mobile','$passwords','$email', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <title>Sign Up</title>
</head>
<style>
    *{
    margin:0;
    padding:0;
}

body{
    background-color: #f3cc62;
}

.container{
    background-color: white;
    width: 90%;
    height: 80vh;
    display: flex;
    margin: 60px auto;
    border-radius: 10px;
    /* border: 1px solid black; */
    box-shadow: 0px 10px 20px -10px grey; 
}

.left{
    width: 39%;
    height: 100%;
    margin: 0 auto;
    /* background-color: yellow; */
}

.top{
    /* height: 10%; */
    width: 100%;
    /* background-color: royalblue; */
}

.top a{
    text-decoration: none;
    color: black;
    font-size: 18px;
    /* background-color: blanchedalmond; */
}

.middle{
    height: 90%;
    width: 100%;
    /* background-color: tomato; */
    text-align: center;
    position: relative;
}

.middle h2{
    text-align: center;
    font-size: 35px;
    height: 10%;
    /* background-color: brown; */
    padding-top: 4px;
    font-weight: 300;
    
}

form{
    /* background-color: burlywood; */
    width: 70%;
    height: 70% ;
    margin: 0 auto;
    padding-top: 40px;
}

form div{
    display: flex;
    flex-direction: column;
}

label{
    text-align: left;
    margin-top: 10px;
}

input{
    width: 90%;
    height: 26px;
    margin-top: 1px;
    border: none ;
    outline: none;
    border-bottom: 1px solid grey;
}

.bttn{
    background-color: #ddb343;
    border: none;
    width: 50%;
    /* padding: 20px 20px; */
    height: 40px;
    margin: 20px auto;
    cursor: pointer;
    border-radius: 5px;
    font-weight: bolder;
    color: black;
    box-shadow: 0px 10px 20px -10px rgb(196, 196, 196); 
}

.bttn:hover{
    box-shadow: 0px 10px 20px -10px #ffe292; 
    color: white;
}

.bottom{
    width: 100%;
    height: 10%;
    /* background-color: blueviolet; */
    text-align: center;
}

a{
    text-decoration: none;
}

.right{
    width: 60%;
    height: 100%;
    /* background-color: red; */
}

img{
    width: 100%;
    height: 100%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

@media screen and (max-width:770px){
    .right{
        display: none;
    }

    .left{
        width: 100%;
    }
}
</style>
<body>
    <?php
    if($showAlert){
        echo ("Registerd Succesfully,  Go to login");

    }
    ?>
    <div class="container">
        <div class="left">
             <div class="top">
                 <!-- <a href="#">Return</a> -->
             </div>
             <div class="middle">
                 <h2>SIGN UP</h2>
                 <form method="post" id="registerForm" >
                     <div>
                         <div>
                             <label>Name <span style="color: red;">*</span></label>
                             <input type="text" name="name" required>
                         </div>
                         <div>
                             <label>Phone no. <span style="color: red;">*</span></label>
                             <input type="text" name="mobile" required>
                         </div>
                         <div>
                             <label>Email <span style="color: red;">*</span></label>
                             <input type="email" name="email" required>
                         </div>
                        <div id="email_error" style="text-align: left"></div>
                     </div>
                     <div>
                         <label>Password <span style="color: red;">*</span></label>
                         <input type="password" name="passwords" required>
                     </div>
                     <div>
                         <label>Confirm Password <span style="color: red;">*</span></label>
                         <input type="password" name="cpassword" required>
                     </div>
                     <div>
                         <!-- <label>Password <span style="color: red;">*</span></label> -->
                         <input type="hidden" name="type" value="register">
                     </div>
                     <div>
                         <input class="bttn" type="submit" id="register" onclick="message()" name="register" value="Register">
                     </div>
                 </form>
             </div>
             <div class="bottom">
                 <a href="userlogin.php">Already have an account <span style="color: red;">Log In</span></a>
             </div>
        </div>
        <div class="right">
         <img src="vegetables copy.JPG" alt="img">
        </div>

        <script src="js files/registerForm.js">

        </script>
</body>
</html>