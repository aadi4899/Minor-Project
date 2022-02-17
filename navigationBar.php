<?php
session_start();
include('database.php');
include('function.php');
include('constant.php');

// include('navigationBar.php');
// session_start();
if(!isset($_SESSION['IS_USERLOGIN'])){
    redirect('userlogin.php');    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
    }
    .upperSection{
        height: 8vh;
        width: 100%;
        background: black;
        text-align: right;    
    }
    
    .upperSection a{
        color: white;
        margin: 20px 20px;
    }
nav{
    height: 15vh;
    width:100%;
    background: rgb(255, 79, 79);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
}

.logo{
    /* background-color: rosybrown; */
    width: 10%;
    height: auto;
    text-align: center;
    font-size: 13px;
    padding-left: 20px;
}

.button1{
    /* position: absolute; */
    bottom: 6%;
    position: fixed;
    left: 4%;
    padding: 10px 35px;
    background-color: red;
    outline: none;
    cursor: pointer;
    border: none;
    border-radius: 20px;
    box-shadow: 0px 10px 20px -10px rgb(214, 0, 0); 
    color: white;
    z-index: 10;
}

.button2{
    /* position: absolute;s */
    bottom: 6%;
    position: fixed;
    right: 5%;
    padding: 15px 10px;
    background-color: red;
    outline: none;
    cursor: pointer;
    border: none;
    border-radius: 100%;
    box-shadow: 0px 10px 20px -10px rgb(214, 0, 0); 
    color: white;    
    z-index: 10;
}

.menus{
    display: flex;
    justify-content: space-around;
    width: 80%;
    /* background-color: skyblue; */
    font-size: 18px;
}



.upper{
    width: 2.5%;
    /* background-color: rgb(0, 0, 0); */
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
    border-radius: 100%;
    padding: 5px;
    margin-right: 5px;
    display: none;
}

#nav_toggle{
    padding-left: 6px;
    color: white;
}



a{
    text-decoration: none;
    color: black;
    font-weight: 600;
    
}

.sidebarMenu{
    display: none;
}


@media screen and (max-width:700px){
#nav_toggle{
        padding-left: 0;
    }
.menu{
    margin: 41% 0;
}
    
    .upper{
        display: block;
        width: 6.5%;
    }

    .menus{
        display: none;
    }

    .name{
        font-size: 2rem;
    }

    h1{
        font-size: 20px;
    }
}
</style>
<body>
   
<nav>
        <div class="logo">
            <h2>FOOD DELIVERY </h2>
        </div>

        <div class="menus">
            <a href="resturant.php">Home</a>
            <a href="about.php">About</a>
            <a href="#">Food</a>
            <?php
            if(isset($_SESSION['IS_LOGIN'])){
                // echo ($_SESSION['USER_NAME']);
            }
            else{
                ?>
                <a href="userlogin.php">Login In / <span>Register</span></a>
                <?php
            }
            ?>
            <a href="contact.php">Contact Us</a>
            <!-- <a href="#">Support</a>
         <a href="#">Media</a> -->
            <a href="tiffin.php">Your Meal</a>
            <!-- <a href="#">Cart</a>  -->
        </div>

        <div class="upper">
            <div id="nav_toggle" onclick="openFunction()">&#9776;</div>
        </div>
    </nav>
    <div class="upperSection">
        <a href="profile.php"><?php echo $_SESSION['USER_NAME']?></a>
        <a href="food_history.php">Order History</a>
        <a href="userlogout.php">Logout</a>
    </div>
    <div id="menuBar" class="sidebarMenu">
        <div class="menu">
        <a href="resturant.php">Home</a>
            <a href="about.php">About</a>
            <a href="#">Food</a>
            <?php
            if(isset($_SESSION['IS_LOGIN'])){
                // echo ($_SESSION['USER_NAME']);
            }
            else{
                ?>
                <a href="userlogin.php">Login In/ <span>Register</span></a>
                <?php
            }
            ?>
            <a href="contact.php">Contact Us</a>
            <!-- <a href="#">Support</a>
         <a href="#">Media</a> -->
            <a href="tiffin.php">Your Meal</a>
            <!-- <a href="#">Cart</a>  -->
        </div>
        <div class="closeBttn" id="closeBtn" onclick="closeFunction()">&times;</div>

    </div>
    <script>
           // navigation bar
   function openFunction() {

document.getElementById("menuBar").style.width = "100%";
}
function closeFunction() {
document.getElementById("menuBar").style.width = "0%";

}
// navigation bar
    </script>
</body>
</html>