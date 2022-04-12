<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>Project No: </th>
                                <th scope='col'>Title: </th>
                                <th scope='col'>Justification: </th>
                                <th scope='col'>Descriptions</th>
                                <th scope='col'>Budget ($): </th>
                                <th scope='col'>Date Started </th>
                                <th scope='col'>Timeline: </th>
                                <th scope='col'>Status: </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM projects ";
//    JOIN msustaff ON patient_requests.staff_id = msustaff.staff_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $proj_id = $row["proj_id"];
                                    $title = $row["title"];
                                    $description = $row["description"];
                                    $amount = $row["amount"];
                                    $timeline = $row["timeline"];
                                    $status = $row["status"];
                                    $justification = $row["justification"];
                                    $date = $row["date"];
                                    ?>

                                    <tr>
                                        <td><?php echo "P00".$proj_id ?></td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $justification ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php
                                            echo " USD". $amount ."<br>".
                                            "<p class='badge badge-primary'> $amount</p>"?>
                                        </td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $timeline ?></td>
                                        <td>
                                            <?php
                                            if ($status === "not complete") {
                                                echo "<p class='text-danger'> $status </p>";
                                            }elseif($status === "progress") {
                                                echo "<p class='text-warning'> $status </p>";
                                            }
                                            else {
                                                echo "<p class='text-success'> $status </p>";
                                            }
                                            ?>
                                        </td>
                                        <td><a href="view.php?view" class="btn btn-warning">View</a></td>
                                    </tr>

                                    <?php

                                }
                            } else {
                                echo "0 results";
                            }
                            ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>