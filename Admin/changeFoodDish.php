<?php
include('navigation.php');


// prx(SERVER_DISH_IMAGE);
$mssg="";
$category_id="";
$foodDish="";
$foodDish_detail="";
$images="";
$price="";
$id="";
$image_status='required';
if(isset($_GET['id']) && $_GET['id']>0){
    $id = get_safe_value($_GET['id']);
    $row=mysqli_fetch_assoc(mysqli_query($conn, "select * from food_dish where id='$id'"));
    $category_id=$row['category_id'];
    $foodDish=$row['foodDish'];
    $foodDish_detail=$row['foodDish_detail'];
    $images=$row['images'];
    $price=$row['price'];
    $image_status='';
}


if(isset($_POST['submit'])){
    $category_id = get_safe_value($_POST['category_id']);
    $foodDish = get_safe_value($_POST['foodDish']);
    $foodDish_detail = get_safe_value($_POST['foodDish_detail']);
    // $images = get_safe_value($_POST['images']);
    $price = get_safe_value($_POST['price']);
    // $attribute = get_safe_value($_POST['attribute']);
    // $added_on = date('Y-m-d h:m:s');
    $added_on = date('Y-m-d h:i:s');
    $foodDish_id = mysqli_insert_id($conn);
    

    if($id==''){
    $sql="select * from food_dish where foodDish='$foodDish'";
    }
    else{
        $sql="select * from food_dish where foodDish='$foodDish' and id!='$id'";
    }
    // check if category is repeated or not
    if(mysqli_num_rows(mysqli_query($conn, $sql))>0){
        $mssg="Food Dish already Exist add new";
    }
    else{
        if($id==''){
            $images =  $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'], SERVER_DISH_IMAGE.$images);
            $sqlquery = "insert into food_dish(category_id, foodDish_detail, foodDish, price, status, added_on, images) values('$category_id',  '$foodDish_detail', '$foodDish', '$price' 0, '$added_on', '$images')";
            // prx($sqlquery);
            mysqli_query($conn, $sqlquery);
            // die();
            }
            else{
                $images_condition='';
                if($_FILES['images']['name']!=''){
                    $images =  $_FILES['images']['name'];
                    move_uploaded_file($_FILES['images']['tmp_name'], SERVER_DISH_IMAGE.$images);
                    $images_condition=", images='$images'";
                }
                $sql="update food_dish set category_id='$category_id', foodDish='$foodDish', foodDish_detail='$foodDish_detail' , price='$price' $images_condition where id='$id'";
                mysqli_query($conn, $sql);
            }
    // check if category is repeated or not

    mysqli_query($conn, "insert into fooddish_detail(foodDish_id, price, status, added_on) values('$foodDish_id', '$price', 1, '$added_on')");
    redirect('foodDish.php');
    }
}

$res_category= mysqli_query($conn, "select * from food_category where status='1' order by foodCategory asc");
?>
<?php
include('footer.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Dish</title>
</head>
<style>
    .top{
        text-align: center;
        margin: 1% 0;
    }

    .message{
        color: red
    }

</style>
<body>
    <div class="top">
    <h1>Manage Dish</h1>
    </div>

    <div class="bottom">
        <form method="post" enctype="multipart/form-data">
            <div class="formItems">
            <label>Category</label>
           <select name="category_id" required>
               <!-- <option value="">Select Category</option> -->
               <?php
               while($row_category=mysqli_fetch_assoc($res_category)){
                   if($row_category['id']==$category_id){
                   echo "<option value='".$row_category['id']."' selected>".$row_category['foodCategory']."</option>";
                }
                else{
                    echo "<option value='".$row_category['id']."'>".$row_category['foodCategory']."</option>";
                }
               }
               ?>
           </select>
            </div>

            <div class="formItems">
            <label>Dish Name</label>
            <input type="text" name="foodDish" placeholder="Enter Dish name" value="<?php echo $foodDish?>" required>
            </div>

            <div class="formItems">
            <label>Dish Details</label>
            <input type="text" name="foodDish_detail" placeholder="Enter Dish details" value="<?php echo $foodDish_detail?>" required>
            </div>

            <div class="formItems">
            <label>Images</label>
            <input type="file" name="images" <?php echo $image_status?>>
            </div>

                <div id="dishbox1">   
    
    <div class="formItems">
     <label>Price</label>
    <input type="text" name="price" placeholder="Enter Dish Price" value="<?php echo $price?>"  required>
    </div>

    <!-- <div class="formItems">
    <label>Attribute</label>
    <input type="text" name="attribute" placeholder="Enter Dish Attribute" required>
</div> -->

</div> 



            <div class="message"><?php echo $mssg?></div>
            <button type="submit" name="submit">Add</button>
            <button type="button" onclick="add_more()">Add More</button>
        </form>
</div>
<script>

</script>
</body>
</html>