<?php
include('navigation.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
    $type = get_safe_value($_GET['type']);
    $id = get_safe_value($_GET['id']);
    if($type=='delete'){
        mysqli_query($conn, "delete from food_category where id='$id' ");
        redirect('category.php');
    }
    if($type=='active' || $type=='deactive'){
    $status=1;
    if($type=='deactive'){
        $status=0;
    }
    mysqli_query($conn, "update food_category set status='$status' where id='$id' ");
    redirect('category.php');
    }
}
$sql = "select * from food_category order by order_no";
$res= mysqli_query($conn, $sql);
?>
<?php
include('footer.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>Category</title>
  </head>
  <style>
      .top{
          display: flex;
          align-items: center;
          justify-content: space-around;
          margin: 1% 0;
      }

      .top a{
          text-decoration: none;
          padding: 10px 20px;
          background: yellow;
          border-radius: 10px;
          color: black;
          font-weight: 600
      }

      .top a:hover{
          color: red
      }
      </style>
  <body>
     
<div class="top">
    <h1>Category</h1>
    <a href="changeCategory.php" class="addButton">Add new category</a>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" width="10%">S.no</th>
            <th scope="col" width="40%">Category</th>
            <th scope="col" width="20%">Order no.</th>
            <th scope="col" width="30%">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($res)>0){
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                ?>
        <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $row['foodCategory']?></td>
            <td><?php echo $row['order_no']?></td>
            <td>
            <a href="changeCategory.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-info">Edit</button></a>
            <?php
            if($row['status']==1){
                ?>
                <a href="?id=<?php echo $row['id']?>&type=deactive"><button type="button" class="btn btn-primary">Active</button></a>
                
                <?php
            }
            else{
                ?>
                <a href="?id=<?php echo $row['id']?>&type=active"><button type="button" class="btn btn-primary">Deactive</button></a>
                
                <?php
            }
            ?>
            <a href="?id=<?php echo $row['id']?>&type=delete"><button type="button" class="btn btn-danger">Delete</button></a>

            </td>
          </tr>
         <?php 
        $i++;
        } } else{ ?>
         <th scope="row" colspan="4">No Data</th>
         <?php }  ?>
         <tr>
         </tr>
        </tbody>
      </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
  </body>
</html>
