<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Documents </h6>
                        <a class="btn btn-secondary justify-content-end" href="documents.php">Back</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#:</th>
                                <th scope="col">Title</th>
                                <th scope="col">Send By:</th>
                                <th scope="col">Document</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql = "SELECT * FROM documents JOIN employees ON employees.staff_id = documents.emp_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {

                                    $doc_id = $row["doc_id"];
                                    $firstName = $row["firstName"];
                                    $title = $row["title"];
                                    $document = $row["document"];
                                    $date = $row["date"];

                                    ?>
                                    <tr>
                                        <th scope="row">PJ00<?php echo $doc_id ?></th>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $firstName ?></td>
                                        <td><?php echo $document ?></td>
                                        <td><?php echo $date ?></td>
                                        <td>
                                            <a href="../img/<?php echo $document ?>" target="_blank" class="btn btn-info btn-sm">open</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<p class='alert alert-danger'>No documents available</p>";
                            }
                            ?>


                            </tbody>
                        </table>
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