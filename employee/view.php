<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');

$view = $_GET['view'];

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $proj_id = $row["proj_id"];
        $title = $row["title"];
        $justification = $row["justification"];
        $description = $row["description"];
        $timeline = $row["timeline"];
        $status = $row["status"];
        $date = $row["date"];
    }
}


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-11 col-lg-11">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"> View Project PJ00<?php echo $proj_id; ?>  </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">



                        <div class="row">
                            <div class="col-md-8 mt-2">
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

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 card card-body">
                                <h6 class="font-weight-bolder">Comments</h6>
                                <?php
                                if($status === 'not complete'){

                                    if(isset($_POST['send'])){
                                       $comment = $_POST['comment'];

                                        $sql = "INSERT INTO comments (proj_id, emp_id, comment, date)
                                            VALUES ('{$proj_id}','{$_SESSION['staff_id']}','{$comment}', now())";

                                        if ($conn->query($sql) === TRUE) {

                                            echo "<p class='alert alert-success'>Comment sent</p>";

                                        }else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                    }

                                ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" name="comment" class="form-control" required>
                                    </div>
                                    <button type="submit" name="send" class="btn btn-primary float-right mb-5">Send</button>
                                </form>
                                    <hr>

                                    <div class="border border-1 p-2">
                                        <?php
                                    $sql = "SELECT * FROM comments JOIN employees ON employees.staff_id = comments.emp_id";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $proj_id = $row["proj_id"];
                                            $comment = $row["comment"];
                                            $date = $row["date"];
                                            $firstName = $row["firstName"];
                                        ?>

                                        <div class="mb-2 ng-binding bg-light">
                                            <span class="font-weight-bold text-dark rounded"><?php echo $firstName ?> : </span> <?php echo $comment; ?>
                                        </div>

                                     <?php    }
                                    } ?>
                                    </div>

                                    <?php }
                                else{
                                    echo "<p class='alert alert-warning'>No comments Allowed</p>";
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>