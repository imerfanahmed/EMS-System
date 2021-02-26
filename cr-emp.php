<?php


    require "conn.php";
    session_start();
    if(!$_SESSION){
        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <!-- Nav section start -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="dash.php">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Welcome
                                <?php echo $_SESSION['u_name'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>
                    <h5 class="user-info">
                        <a href="logout.php" class="text-white"> LogOut</a>
                    </h5>

                </div>
            </div>
        </nav>


    </div>
    <!-- Nav section stop -->
    <p></p>
    <!-- body section start -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Employees
                    </div>
                    <div class="list-group">
                        <a href="cr-emp.php" class="list-group-item list-group-item-action active">Add New Employees</a>
                        <a href="dash.php" class="list-group-item list-group-item-action">View All Employees</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add New Employees Details
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="e_name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Postion</label>
                                <input type="text" name="e_pos" class="form-control" id="exampleInputPassword1"
                                    placeholder="CEO">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number</label>
                                <input type="text" name="e_phone" class="form-control" id="exampleInputPassword1"
                                    placeholder="+8801420420420">
                            </div>
                            <p></p>
                            <button type="submit" name="e_add" class="btn btn-success">Add Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- body section end -->

    <?php
    
    if(isset($_POST['e_add'])){
        $e_name=$_POST['e_name'];
        $e_pos=$_POST['e_pos'];
        $e_phone=$_POST['e_phone'];


        $sql="INSERT INTO `employees` (`ID`, `name`, `position`, `phone`) VALUES (NULL, '$e_name', '$e_pos', '$e_phone')";

        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script> alert('New Record Created Successfully!'); </script>";


        }
        else{
            echo mysqli_error($conn);
        }

    }
    
    
    
    ?>






    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>

</html>