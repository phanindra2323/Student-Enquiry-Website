<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>student score</title>
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
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Enter Roll Number">
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
                                    
                                    <th>Roll NUMBER</th>
                                    <th>SEM-1</th>
                                    <th>SEM-2</th>
                                    <th>SEM-3</th>
                                    <th>SEM-4</th>
                                    <th>SEM-5</th>
                                    <th>SEM-6</th>
                                    <th>SEM-7</th>
                                    <th>SEM-8</th>
                                    <th>CGPA</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","<<dbname>>");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $pattern='/Regular Expression/';
                                        if(preg_match($pattern,$filtervalues)){
                                            $query  = "SELECT * FROM <<tablename>> WHERE CONCAT(RollNO,sem1,sem2,sem3,sem4,sem5,sem6,sem7,sem8,cgpa) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($con, $query);
                                         
    
                                            if(mysqli_num_rows($query_run))
                                            {
                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                         
                                                       
                                                        <td><?= $items['RollNO']; ?></td>
                                                        <td><?= $items['sem1']; ?></td>
                                                        <td><?= $items['sem2']; ?></td>
                                                        <td><?= $items['sem3']; ?></td>
                                                        <td><?= $items['sem4']; ?></td>
                                                        <td><?= $items['sem5']; ?></td>
                                                        <td><?= $items['sem6']; ?></td>
                                                        <td><?= $items['sem7']; ?></td>
                                                        <td><?= $items['sem8']; ?></td>
                                                        <td><?= $items['cgpa']; ?></td>                                                        
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
