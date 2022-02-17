<?php
include('navigationBar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    .category{
        width: 100%;
        height: auto;
        background: red;
        text-align: center;
    }

    .category h1{
        margin-bottom: 20px;
    }

    .list{
        display: grid;
     grid-template-columns: repeat(4, auto);
    }

    .list a{
        margin-bottom: 20px;
    }

 
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
    grid-template-columns: repeat(3, auto);
}


.boxesss{
    width: 400px;
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

.bttn_1{
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

.bttn_2{
    font-size: 15px;
    font-weight: 600;
    padding: 6px 16px;
    /* width: 16%; */
    /* margin-top: 10px; */
    /* padding: 5px 5px; */
    background-color: transparent;
    outline: none;
    cursor: pointer;
    border: none;
    border-radius: 43px;
    /* box-shadow: 0px 10px 20px -10px rgb(214, 0, 0);  */
    /* color: white;   */
    position: absolute;
    right: 10px;
    top: 10px;
}
.bttn_3{
    padding: 6px 16px;
    /* width: 16%; */
    /* margin-top: 10px; */
    /* padding: 5px 5px; */
    background-color: transparent;
    outline: none;
    cursor: pointer;
    border: none;
    border-radius: 43px;
    /* box-shadow: 0px 10px 20px -10px rgb(214, 0, 0);  */
    /* color: white;   */
    position: absolute;
    left: 10px;
    bottom: 10px;
}
.bttn_1:hover{
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
    .list{
        display: grid;
     grid-template-columns: repeat(2, auto);
    }
}
</style>
<body>
<?php
$category_sql ="select * from food_category where status = 1 order by order_no desc";
    $category_res= mysqli_query($conn, $category_sql);
    ?>
    <div class="category">
        <h1>Shop by category</h1>
        <div class="list">
        <?php
    
            while($category_row=mysqli_fetch_assoc($category_res)){
               
                
                echo "<a href='shop.php?category_id=".$category_row['id']."'>".$category_row['foodCategory']."</a>";
            }?>  

</div>
    </div>
    
    <section>
        <div class="secondSection">
            <div class="top">
                <!-- <input type="search" placeholder="Search"> -->
                <h4>Food Items</h4>
            </div>
            
                <?php 
                $foodDish_sql = "select * from food_dish where status = 1";
                if(isset($_GET['category_id']) && $_GET['category_id']>0 ){
                    $category_id=get_safe_value($_GET['category_id']);
                    $foodDish_sql.= " and category_id='$category_id' ";
                }
                $foodDish_sql.=  " order by foodDish desc";
                $foodDish_res=mysqli_query($conn, $foodDish_sql);
                ?>
            <div class="bottom">
                <div class="boxess">
                <?php
                  while($foodDish_row=mysqli_fetch_assoc($foodDish_res)){
                ?>
                    <div class="boxesss box_1">
                        <div class="img">
                            <img src="<?php echo SITE_DISH_IMAGE.$foodDish_row['images']?>" alt="Image">               
                        </div>
                    
                    <div class="button">
                        <a href="#"><button class="bttn_1">Add to cart</button></a>
                        <?php $dish_price_res=mysqli_query($conn, "select * from fooddish_detail where status='1' and foodDish_id='".$foodDish_row['id']."' order by price asc")?>
                        
                       <button class="bttn_2"><?php echo $foodDish_row['foodDish']?><br><?php echo $foodDish_row['price']?>
                       </button></a>
                    
                </div>
                  
                </div>
                <?php } ?>

            </div>
        </div>
    </section>

</body>
</html>


