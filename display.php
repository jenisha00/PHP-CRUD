<?php
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD OPERATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" ">
    <script src=" https://kit.fontawesome.com/e397564fde.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h1 class="p-3 mt-3 text-center bg-dark text-light">LIST OF ALL USERS</h1>

        <div class="text-center">
            <a href="display.php" class="btn btn-secondary mt-2" role="button
                    "><i class="fas fa-long-arrow-alt-left"></i> Back To All Users</a>
        </div>

        <div class="d-flex justify-content-between">
            <a href="user.php" class="btn btn-primary my-5" role="button
                ">Add User</a>                
            <form method="post" class="my-5">
                <div class="d-flex">
                    <input type="text" class="form-control" name="searchtxt" placeholder="Search Here...">
                    <button type="submit" class="btn btn-primary" name="search"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>


        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Password</th>
                    <th scope="col">Date Added</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //----if search, only search data table else complete users table
                if (isset($_POST['search'])) {
                    $str = mysqli_real_escape_string($con, $_POST['searchtxt']);
                    $sql = "select * from users where name like '%$str%' or email like '%$str%' or phone like '%$str%' or date like '%$str%'";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $password = $row['password'];
                            $date = $row['date'];

                            echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $password . '</td>
                            <td>' . $date . '</td>
                            <td>
                                <a href="update.php?updateid=' . $id . '" role="button" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="delete.php?deleteid=' . $id . '" role="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            </tr>';
                        }
                    } else {
                        echo '<div class="container text-center bg-secondary p-2 mb-3 text-light">No data found</div>';
                    }
                    
                } else {
                    $sql = "select * from users";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $password = $row['password'];
                            $date = $row['date'];

                            echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $password . '</td>
                            <td>' . $date . '</td>
                            <td>
                                <a href="update.php?updateid=' . $id . '" role="button" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="delete.php?deleteid=' . $id . '" role="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            </tr>';
                        }
                    }
                }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>
