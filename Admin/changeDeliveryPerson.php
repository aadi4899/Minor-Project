<?php
include('navigation.php');
$mssg="";
$name="";
$mobile="";
$password="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
    $id = get_safe_value($_GET['id']);
    $row=mysqli_fetch_assoc(mysqli_query($conn, "select * from delivery_person where id='$id'"));
    $name=$row['name'];
    $mobile=$row['mobile'];
    $password=$row['password'];
}


if(isset($_POST['submit'])){
    $name = get_safe_value($_POST['name']);
    $mobile = get_safe_value($_POST['mobile']);
    $password = get_safe_value($_POST['password']);
    $added_on = date('Y-m-d h:i:s');

    if($id==''){
    $sql="select * from delivery_person where mobile='$mobile'";
    }
    else{
        $sql="select * from delivery_person where mobile='$mobile' and id!='$id'";
    }
    // check if category is repeated or not
    if(mysqli_num_rows(mysqli_query($conn, $sql))>0){
        $mssg="Delivery person already Exist add new";
    }
    else{
        if($id==''){
            mysqli_query($conn, "insert into delivery_person(name, password, mobile, status, aaded_on) values('$name',  '$password', '$mobile', 0, '$added_on') ");
            }
            else{
                mysqli_query($conn, "update delivery_person set name='$name', mobile='$mobile', password='$password' where id='$id'");
            }
    // check if category is repeated or not
    redirect('deliveryBoy.php');
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
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Name" value="<?php echo $name?>" required>
            </div>

            <div class="formItems">
            <label>Mobile Number</label>
            <input type="text" name="mobile" placeholder="Enter Mobile Number" value="<?php echo $mobile?>" required>
            </div>

            <div class="formItems">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" value="<?php echo $password?>" required>
            </div>
            <div class="message"><?php echo $mssg?></div>
            <button type="submit" name="submit">Add</button>
        </form>
</div>
</body>
</html>