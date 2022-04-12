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
                        <h6 class="m-0 font-weight-bold text-primary">Share Documents </h6>
                        <a class="btn btn-primary justify-content-end" href="docs.php">View Documents</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                        if(isset($_POST['send'])){
                            $title = $_POST['title'];
                            $image = $_FILES['image']['name'];
                            $image_temp = $_FILES['image']['tmp_name'];
                            move_uploaded_file($image_temp, "../img/$image");

                            $sql = "INSERT INTO documents (title, document, emp_id, date)
                                            VALUES ('{$title}','{$image}', '1', now())";

                            if ($conn->query($sql) === TRUE) {

                                echo "<p class='alert alert-success'>Your document was successfully sent</p>";

                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        }

                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Purpose">
                            </div>
                            <div class="form-group">
                                <label for="">Upload Document</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" name="send" class="btn btn-primary float-right mb-5">Send</button>
                        </form>


                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>