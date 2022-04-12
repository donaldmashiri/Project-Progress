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
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM projects";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $proj_id = $row["proj_id"];
                                        $title = $row["title"];
                                        $justification = $row["justification"];
                                        $description = $row["description"];
                                        $timeline = $row["timeline"];
                                        $status = $row["status"];
                                        $date = $row["date"];
                                        ?>

                                        <div class="col-md-4 mt-2">
                                            <div class="card">
                                                <div class="card-header font-weight-bold">Project ID:PJ00<?php echo $proj_id; ?></div>
                                                <div class="card-body">
                                                    <div class="mb-2 ng-binding font-weight-bold ">
                                                      <span class="text-dark">
                                                    <?php echo $title; ?>
                                                    <br>
                                                    <small>(<?php echo "Justification". $justification; ?>)</small>
                                                    </div>
                                                    <hr>

                                                    <div class="mb-2 ng-binding bg-light">
                                                        <span class="font-weight-bold text-dark">Description :</span> <?php echo $description; ?>
                                                    </div>
                                                    <div class="mb-2 ng-binding">
                                                        <span class="font-weight-bold text-dark">Timeline :</span> <?php echo $timeline; ?>
                                                    </div>
                                                    <small class="text-muted text-info">Date: <?php echo $date; ?></small>
                                                    <div class="mb-2 ng-binding bg-light">
                                                        <p>
                                                            <?php
                                                            if ($status === "not complete") {
                                                                echo "<p class='text-danger font-weight-bolder'> Status : $status </p>";
                                                            }elseif($status === "complete") {
                                                                echo "<p class='text-success font-weight-bolder'> Status : $status </p>";
                                                            }
                                                            else {
                                                                echo "<p class='text-info'> Status : $status </p>";
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <a href="view.php?view=<?php echo $proj_id ?>" type="submit" class="btn btn-success btn-sm mt-2">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                } else {
                                    echo "<p class='alert alert-info'>No pending projects</p>";
                                }


                                ?>
                            </div>



                        </div>

















                        <?php
                        if(isset($_POST['submit'])){

                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $amount = $_POST['amount'];
                            $req_type = $_POST['req_type'];

                            $sql = "INSERT INTO patient_requests (staff_id, title, description, amount, req_type, date)
                            VALUES ('{$_SESSION['staff_id']}','{$title}', '{$description}', '{$amount}','{$req_type}',now())";

                            if ($conn->query($sql) === TRUE) {

                                echo "<h4 class='alert alert-success'>Your Request Was successfully Send</h4>";

                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>