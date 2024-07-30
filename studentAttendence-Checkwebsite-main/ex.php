<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Attendence check</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 style="color:red;">HEADING </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Roll NUMBER</th>
                                    <th>Attendence (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","<<databasename>>");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $pattern='/<<regular expression>>/';
                                        if(preg_match($pattern,$filtervalues)){
                                            $query  = "SELECT * FROM <<table name>> WHERE CONCAT(StudentName,RollNO,attendence) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($con, $query);
                                         
    
                                            if(mysqli_num_rows($query_run))
                                            {
                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $items['StudentName']; ?></td>  
                                                       
                                                        <td><?= $items['RollNO']; ?></td>
                                                        <td><?= $items['attendence']; ?></td>                                                        
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="3">No Record Found</td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                                    <tr>
                                                        <td colspan="3">Invalid Input</td>
                                                    </tr>
                                                <?php

                                        }

                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
