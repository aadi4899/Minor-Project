<?php
// session_start();
include('database.php');
// include('function.php');
// include('constant.php');
include('navigationBar.php');
// if(!isset($_SESSION['IS_LOGIN'])){
//     redirect('frontendlogin.php');    
// }

// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<style>
    *{
        margin:0;
        padding:0
    }
    
header{
    width: 100%;
    height: 100vh;
    /* background: red; */
    background-image: url('');
    background-size: cover;
    background-repeat: no-repeat;
    animation: changeimg 20s infinite linear;
    }
@keyframes changeimg{
     0%{background-image:url(Assets/1.jpg);}
    20%{background-image:url(Assets/2.jpg);}
    40%{background-image:url(Assets/3.JPG);}
    60%{background-image:url(Assets/5.jpg);}
    80%{background-image:url(Assets/6.jepg);}
    100%{background-image:url(Assets/vegetables.jpg);}   
}
main{
    width: 100%;
    height: 85vh;
    display: flex; justify-content: center; align-items: center; text-align: center  ; color: white  
}
section h3{
    font-weight: 400; 
    font-size: 35px;
    letter-spacing: 2px;
    text-shadow: 1px 1px 2px black;   
}
section h1{
    margin: 30px 0 20px 0;
    
    font-size: 45px;
    font-weight: 600;
    text-transform: uppercase;
       text-shadow: 1px 1px 2px black;  
}
section a{
 padding: 12px 25px;
    border-radius: 4px;
    outline: none;
    text-transform: uppercase;
    font-weight: 800;
    text-decoration: none;
    letter-spacing: 1px  ;
    transition: all .5 ease;
}
section .bton{
    background: white;
    color: black;    
}
section .bton:hover{
    background: red;
    color: white;
}
section .bttw{
    background: red;
    color: white;  
}
section .bttw:hover{
   background: white;
    color: black; 

}
section .change:after{
    content: '';
    animation: changetext 20s infinite linear;
    color:  #00b894   
}
@keyframes changetext{
    0%{content:"Chole-Batura";}
    20%{content:"Poha-Jalebi";}
    40%{content:"jalebi-fafada";}
    60%{content:"Veg-Biryani";}
    80%{content:"Idli-Sambar";}
    100%{content:"Dosa";}
}

.firstSection{
    height: 45vh;
    text-align: center
}
.firstSection p{
    position: absolute;
    /* margin-top: 5%; */
    text-align: center;
    width: 80%;
    margin: 3% 8%;
    font-size: 30px;
}

.secondSection{
    height: auto;
    width: 100%;
    /* background-color: yellow; */
}
.imageSection{
    height: 40vh;
    width: 95%;
    /* background-color: red; */
    border-bottom-left-radius: 80px;
    margin: 0% 4%;
}

img{
    width: 20%;
    border-bottom-left-radius: 80px;
    outline: none;
}

.thirdSection{
    height: 86vh;
    text-align: center;
    width: 100%;
    /* text-align: center; */
    /* background-color: yellow; */
}

.thirdSection p{
    position: absolute;
    /* margin-top: 5%; */
    text-align: center;
    width: 80%;
    margin: 3% 8%;
    font-size: 30px;
}

.boxes{
    display: flex;
    flex-direction: row;
    margin-top: 16%;
}

.box{
    width: 20%;
    height: 30vh;
    background-color: rgb(241, 241, 241);
    margin: 0 6%;
    border-radius: 3px;
    box-shadow: 0px 10px 20px -10px rgb(0, 0, 0, 0.3);
}

.box img{
    width: 10%;
    margin-top: 20%;
}

.box h5{
    margin-top: 6%;
}

@media screen and (max-width: 770px){
    .firstSection{
        height: 39vh;
    }

    .line{
        width: 60px;
        height: 3px;
        left: 37%;
        margin-top: 5%;
    }

    .firstSection p{
        margin: 2% 8%;
        font-size: 16px;
    }

    .imageSection{
        height: 25vh;
    }

    .thirdSection{
        height: 112vh;
    }

    .thirdSection p{
        font-size: 13px;
        margin: 2% 6%;
    }
    .boxes{
        flex-direction: column;
        margin-top: 106px;
    }

    .box{
        width: 90%;
        height: 23vh;
        margin: 4% 6%;
    }

    .box img{
        margin-top: 37px;
    }

    
   
}

</style>
<body>
<header>
        <main>
            <section>    
            <h3>Welcome Foodies</h3>
            <h1>Do Try These Dishes :<span class="change"></span></h1>
            <!-- <a href="#" class="bton">Explore More</a> -->
            <a href="shop.php" class="bttw">Order Now</a>    
            </section>   
       </main>
</header>

<section>
        <div class="firstSection">
            <h1>About</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non magnam. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Non magnam.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non magnam.
            </p>
        </div>
    </section>

    <!-- <section class="secondSection">
        <div class="imageSection">
            <img src="Assets/1.jpg" alt="images"> 
        </div>
    </section> -->

    <section>
        <div class="thirdSection">
            <h1>Our Food Delivery Features</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non magnam. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Non magnam.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non magnam.
            </p>
            <div class="boxes">
                <div class="box box1">
                    <img src="" alt="img">
                    <h5>Lorem ipsum dolor sit amet consectetur.</h5>
                </div>
                <div class="box box3">
                    <img src="" alt="img">
                    <h5>Lorem ipsum dolor sit amet consectetur.</h5>
                </div>
                <div class="box box3">
                    <img src="" alt="img">
                    <h5>Lorem ipsum dolor sit amet consectetur.</h5>
                </div>
            </div>
        </div>
    </section>

</body>
</html>