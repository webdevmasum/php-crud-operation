<?php
/* include model.php */
include 'model.php';
$obj =new model();


/* Insert Records */
if(isset($_POST['submit'])){
    $obj->insertRecord($_POST);
}//if closed

// $data = $obj->displayRecord();
// print_r($data); // to show data with array

/* update Records */
if(isset($_POST['update'])){
    $obj->updateRecord($_POST);
}//if closed

/* Delete Record */
if(isset($_GET['deleteid'])){
    $delid = $_GET['deleteid'];
    $obj->deleteRecord($delid);
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD | OOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h2 class="text-center text-info m-3"> PHP CRUD Operation with OOP</h2>
    <div class="container col-4 bg-dark p-3 offset-4 mt-3">
        <!-- success message -->
        <?php
            if(isset($_GET['msg']) AND ($_GET['msg']== 'ins')){
                echo '<div class="alert alert-primary" role="alert">
                    Hoice re vai insert hoice...!!
                    </div>';
            }

            if(isset($_GET['msg']) AND ($_GET['msg']== 'ups')){
                echo '<div class="alert alert-primary" role="alert">
                    Hoice re vai update hoice...!!
                    </div>';
            }

            if(isset($_GET['msg']) AND ($_GET['msg']== 'del')){
                echo '<div class="alert alert-primary" role="alert">
                    Hoice re vai delete hoice...!!
                    </div>';
            }
        ?>

        <?php
            /* fetch record for update */
            if(isset($_GET['editid'])){
                $editid = $_GET['editid'];
                $myrecord = $obj->displayRecordById($editid);
                ?>

        <!-- updated form  -->
        <form action="index.php" method="post">
            <div class="form-group">
                <label class="text-info">Name</label>
                <input type="text" name="name" value="<?php echo $myrecord['name']; ?>"  class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label class="text-info mt-2">Email</label>
                <input type="email" name="email" value="<?php echo $myrecord['email']; ?>" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label class="text-info mt-2">Phone</label>
                <input type="number" name="phone" value="<?php echo $myrecord['phone']; ?>"  class="form-control" placeholder="Enter your number">
            </div>
            <div class="form-group mt-3">
                <input type="hidden" name="hid" value="<?php echo $myrecord['id']; ?>" >
                <input type="submit" name="update" value="Update" class="btn btn-info">
            </div>      
        </form> 
        
        <?php        
            }else{
        ?>

        <form action="index.php" method="post">
            <div class="form-group">
                <label class="text-info">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label class="text-info mt-2">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label class="text-info mt-2">Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter your number">
            </div>
            <div class="form-group mt-3">
                <input type="submit" name="submit" value="submit" class="btn btn-success">
            </div>
        </form>
        <?php }//else closed ?>       
    </div>
    <div class="container mt-3">
    <!-- <h3 class="text-center text-warning mt-4 bg-dark col-4 offset-4 p-2">Display Records</h3> -->
    <table class="table table-border">
        <tr class="bg-dark text-warning text-center">
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        // displayRecord
        $data = $obj->displayRecord();
        $sno=1;
        foreach($data as $value){
        ?>

        <tr class="text-center">
            <td><?Php echo $sno++ ?></td>
            <td><?Php echo $value['name']; ?></td>
            <td><?Php echo $value['email']; ?></td>
            <td><?Php echo $value['phone']; ?></td>
            <td>
                <a href="index.php?editid=<?php echo $value['id']; ?>" class="btn btn-dark  text-info">View<a/>
                <a href="index.php?editid=<?php echo $value['id']; ?>" class="btn btn-dark text-warning">Edit<a/>
                <a href="index.php?deleteid=<?php echo $value['id']; ?>" class="btn btn-dark text-danger">Delete<a/>
            </td>
        </tr>



        <?php
        }//foreach closed
        ?>
    </table>
    </div>
    
    
  </body>
</html>