<?php
include('navigation.php');
$mssg="";
$category="";
$order_no="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
    $id = get_safe_value($_GET['id']);
    $row=mysqli_fetch_assoc(mysqli_query($conn, "select * from food_category where id='$id'"));
    $category=$row['foodCategory'];
    $order_no=$row['order_no'];
}


if(isset($_POST['submit'])){
    $category = get_safe_value($_POST['category']);
    $order_no = get_safe_value($_POST['order_no']);
    $added_on = date('Y-m-d h:i:s');

    if($id==''){
    $sql="select * from food_category where foodCategory='$category'";
    }
    else{
        $sql="select * from food_category where foodCategory='$category' and id!='$id'";
    }
    // check if category is repeated or not
    if(mysqli_num_rows(mysqli_query($conn, $sql))>0){
        $mssg="Category already Exist add new";
    }
    else{
        if($id==''){
            mysqli_query($conn, "insert into food_category(foodCategory, order_no, status, added_on) values('$category', '$order_no', 1, '$added_on') ");
            }
            else{
                mysqli_query($conn, "update food_category set foodCategory='$category', order_no='$order_no' where id='$id'");
            }
    // check if category is repeated or not
    redirect('category.php');
    }
}


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
    <title>Add new Category</title>
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
    <h1>Manage Category</h1>
    </div>

    <div class="bottom">
        <form method="post">
            <div class="formItems">
            <label>Category Name</label>
            <input type="text" name="category" placeholder="Enter Category Name" value="<?php echo $category?>" required>
            </div>

            <div class="formItems">
            <label>Order Number</label>
            <input type="text" name="order_no" placeholder="Enter Order Number" value="<?php echo $order_no?>" required>
            </div>
            <div class="message"><?php echo $mssg?></div>
            <button type="submit" name="submit">Add</button>
        </form>
</div>
</body>
</html>