<?php
    include 'db.php';
     
    $id = $_GET['updateid'];
    $sql = "select * from users where id = $id";
    $result =  mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $password = $row['password'];
    $date = $row['date'];

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['psw'];
        $date = $_POST['date'];

        $sql = "update users set name = '$name', email = '$email', 
        phone = '$phone', password = '$password', date = '$date' where id = $id";
        $result =  mysqli_query($con, $sql);
        if($result){
            header('location:display.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" ">

    <title>PHP CRUD OPERATION</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter your name" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone no.</label>
                <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="Enter your phone no." autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="psw" class="form-label">Password</label>
                <input type="password" class="form-control" name="psw" value="<?php echo $password; ?>" placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date Added</label>
                <input type="date" class="form-control" name="date" value="<?php echo $date; ?>" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </form>
    </div>

    </body>

</html>