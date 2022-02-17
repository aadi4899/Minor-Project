<?php
include('navigationBar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resturant</title>
</head>
<style>
.secondSection{
    width: 100%;
    height: auto;
    /* background-color: red; */
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

.top{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 10%;
    /* background-color: royalblue; */
}
/* 
.top input{
    padding: 5px 16px;
    border-bottom: 1px solid #000;
    margin-left: 20px;
} */

.top h4{
    margin: 5px 0;
    font-size: 40px
}

.bottom{
    width: 100%;
    height: 90%;
}

.boxess{
    width: 100%;
    height: auto;
    /* background-color: saddlebrown; */
    display: grid;
    grid-template-columns: repeat(2, auto);
}


.boxesss{
    width: 480px;
    height: 33vh;
    /* background-color: red; */
    margin: 10px auto;
    position: relative;
    box-shadow: 0px 10px 20px -10px rgb(0, 0, 0, 0.3);
}

.boxesss img{
    width: 100%;
    height: 33vh;
    border-radius: 6px;
}

.bottom .button{
    width: 100%;
    height: 6vh;
    /* background-color: sandybrown; */
}

.bottom button{
    padding: 6px 16px;
    /* width: 16%; */
    /* margin-top: 10px; */
    /* padding: 5px 5px; */
    background-color: red;
    outline: none;
    cursor: pointer;
    border: none;
    border-radius: 43px;
    box-shadow: 0px 10px 20px -10px rgb(214, 0, 0); 
    color: white;  
    position: absolute;
    right: 10px;
    bottom: 10px;
}

button:hover{
    padding: 6px 20px;
}

@media screen and (max-width: 770px){
    .top{
        flex-direction: column-reverse;
        justify-content: start;
    }
    .boxess{
        grid-template-columns: repeat(1, auto);
    }

    .boxesss{
        width: 90%;
    }
}
</style>
<body>
    <section>
    <?php
    $category_sql ="select * from food_category where status = 1 order by order_no desc";
    $category_res= mysqli_query($conn, $category_sql);
    ?>
        <div class="secondSection">
            <div class="top">
                <!-- <input type="search" placeholder="Search"> -->
                <h4>Resturants</h4>
            </div>
            <div class="bottom">
                <div class="boxess">
                <?php
    
                        while($category_row=mysqli_fetch_assoc($category_res)){
                        echo "<a class='boxesss' href='shop.php?category_id=".$category_row['id']."'>".$category_row['foodCategory']."</a>";
                }?> 
                   

                    <!-- <div class="boxesss box_2">
                        <div class="img">
                            <img src="Assets/1.jpg" alt="Image">               
                        </div>
                    
                    <div class="button">
                        <a href="shop.php"><button class="bttn_1">Select Dish</button></a>
                    </div>
                </div> -->
<!-- 
                    <div class="boxesss box_3">
                        <div class="img">
                            <img src="Assets/3.JPG" alt="Image">               
                        </div>
                    
                    <div class="button">
                        <a href="shop.php"><button class="bttn_1">Select Dish</button></a>
                    </div>
                </div> -->

                    <!-- <div class="boxesss box_4">
                        <div class="img">
                            <img src="Assets/5.jpg" alt="Image">               
                        </div>
                    
                    <div class="button">
                        <a href="shop.php"><button class="bttn_1">Select Dish</button></a>
                    </div>
                </div> -->
<!-- 
                    <div class="boxesss box_5">
                        <div class="img">
                            <img src="Assets/6.jpeg" alt="Image">               
                        </div>
                    
                    <div class="button">
                        <a href="shop.php"><button class="bttn_1">Select Dish</button></a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

</body>
</html>