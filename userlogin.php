<?php
session_start();
include('database.php');
include('function.php');
$mssg="";

include('database.php');
// $showError=false;
$login=false;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $passwords=$_POST['passwords'];
        $sql="Select * from user where email='".$email."' AND passwords='".$passwords."'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            $login=true;
            $row = mysqli_fetch_assoc($result);
        $_SESSION['IS_USERLOGIN'] = 'yes';
        $_SESSION['USER_NAME'] = $row['name'];
        redirect('mainPage.php');
        }
        else{
            // echo ("Wrong credentials");
            // $showError = true;
            $mssg="Please enter correct details";
        }
        
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
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
    height: 10%;
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
    height: 80%;
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
    padding-top: 30px;
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
    margin-top: 6px;
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
    margin: 40px auto;
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

@media screen and (max-width: 770px){
    .right{
        display: none
    }
    
    .left{
        width: 100%;
    }
}
</style>
<body>
    
    <!-- // if($login){
    //     // echo ("login Succesfully");
    //     redirect('mainPage.php');
        
    // } -->


   <div class="container">
       <div class="left">
           <div class="top">
               <!-- <a href="#">Return</a> -->
            </div>
            <div class="middle">
                <h2>LOG IN</h2>
                <form method="post" id="loginForm">
                    <div>
                        <label>Email <span style="color: red;">*</span></label>
                        <input type="Email" name="email" required>
                    </div>
                    <div>
                        <label>Password <span style="color: red;">*</span></label>
                        <input type="password" name="passwords" required>
                        <!-- <a href="#" style="text-align: left"><h5>Forget Password</h5></a> -->
                    </div>
                    <div>
                        <input class="bttn" type="submit" value="Let's Go" name="submit">
                    </div>
                    <div><span style="color: red;"><?php echo $mssg?></span></div>
                </form>
            </div>
            <div class="bottom">
                <a href="usersignin.php">Don't have an account <span style="color: red;">Sign In</span></a>
            </div>
       </div>
       <div class="right">
        <img src="vegetables copy.JPG" alt="img">
       </div>
   </div>  
   
   
</body>
</html>