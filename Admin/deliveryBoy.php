<?php
include('navigation.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
    $type = get_safe_value($_GET['type']);
    $id = get_safe_value($_GET['id']);
    
    if($type=='active' || $type=='deactive'){
    $status=1;
    if($type=='deactive'){
        $status=0;
    }
    mysqli_query($conn, "update delivery_person set status='$status' where id='$id' ");
    redirect('deliveryBoy.php');
    }
}
$sql = "select * from delivery_person order by id desc";
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

    <title>User</title>
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
    <h1>Delivery Persons</h1>
    <a href="changeDeliveryPerson.php" class="addButton">Add new Delivey Person</a>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" width="10%">S.no</th>
            <th scope="col" width="40%">Name</th>
            <th scope="col" width="20%">Mobile Number</th>
            <th scope="col" width="15%">Date of Added</th>
            <th scope="col" width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($res)>0){
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                ?>
        <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $row['aaded_on']?></td>
            <td>
            <a href="changeDeliveryPerson.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-info">Edit</button></a>
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
            <!-- <a href="?id=<?php echo $row['id']?>&type=delete"><button type="button" class="btn btn-danger">Delete</button></a> -->

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
