
<?php
// include('database.php');
// include('function.php');
// include('constant.php');
include('navigationBar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<style>
    .thirdSection{
    height: 86vh;
    text-align: center;
    width: 100%;
    /* text-align: center; */
    /* background-color: yellow; */
}
h1{
    margin-top: 20px;
    font-size: 40px
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
<section>
        <div class="thirdSection">
            <h1>Contact Us By</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non magnam. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Non magnam.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non magnam.
            </p>
            <div class="boxes">
                <div class="box box1">
                    <img src="" alt="img">
                    <h5>Our Helpline</h5>
                </div>
                <div class="box box3">
                    <img src="" alt="img">
                    <h5>Address</h5>
                </div>
                <div class="box box3">
                    <img src="" alt="img">
                    <h5>Write us</h5>
                </div>
            </div>
        </div>
    </section>

    <form id="form" method="post" action="contact_submit.php">
        <div class="list">
            <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="list">
            <input type="text" name="mobile_no" placeholder="Your Number" required>
        </div>
        <div class="list">
            <input type="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="list">
            <input type="textarea" name="message" placeholder="Your message" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>