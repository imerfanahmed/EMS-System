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
                        <a href="cr-emp.php" class="list-group-item list-group-item-action">Add New Employees</a>
                        <a href="dash.php" class="list-group-item list-group-item-action active">View All Employees</a>
                    </div>

                </div>



            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Single Employee Details
                    </div>

                    <table class="table table-bordered text-center">

                        <?php

                        $id=$_GET['e_id'];



                         $sql="SELECT * FROM `employees` WHERE ID='$id'";
                         $result=mysqli_query($conn,$sql);
                         
                         if(mysqli_num_rows($result)>0){
                             while($employee = mysqli_fetch_assoc($result)){ ?>
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td> <?php echo $employee['ID']; ?> </td>

                            </tr>
                            <tr>
                                <th>Name</th>
                                <td> <?php echo $employee['name']; ?> </td>

                            </tr>

                            <tr>
                                <th>Position</th>
                                <td> <?php echo $employee['position']; ?> </td>

                            </tr>

                            <tr>
                                <th>Mobile</th>
                                <td> <?php echo $employee['phone']; ?> </td>

                            </tr>


                            <tr>
                                <td>
                                    <a href="edit.php?e_id=<?php echo $employee['ID']; ?>" class="btn btn-warning">Edit</a>

                                </td>
                                <td>
                                    <a href="delete.php?e_id=<?php echo $employee['ID']; ?>" class="btn btn-danger">Delete</a>
                                </td>


                            </tr>



                        </tbody>






                        <?php }
                        }

                        else{
                            echo 0;
                        }
                        ?>





                    </table>



                </div>
            </div>


        </div>



    </div>

    <!-- body section end -->







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