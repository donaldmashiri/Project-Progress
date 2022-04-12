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
                        <h6 class="m-0 font-weight-bold text-primary">Add New Project</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                        if(isset($_POST['submit'])){

                            $title = $_POST['title'];
                            $justification = $_POST['justification'];
                            $description = $_POST['description'];
                            $amount = $_POST['amount'];
                            $timeline = $_POST['timeline'];

                            $sql = "INSERT INTO projects (title, justification, description, amount, timeline, date)
                            VALUES ('{$title}','{$justification}', '{$description}', '{$amount}','{$timeline}',now())";

                            if ($conn->query($sql) === TRUE) {
                                echo "<h4 class='alert alert-success'>New project was successfully Send</h4>";
                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                        ?>


                        <form action="" method="post">
                            <div class="form-group">
                                <label for="title">Project Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Purpose" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Justification</label>
                                <select name="justification" class="form-control" id="type">
                                    <option value="Problem">Problem</option>
                                    <option value="Opportunity">Opportunity</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description of Project</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="amount">Estimated Budget</label>
                                <input type="text" class="form-control" name="amount" placeholder="Enter Amount (USD)">
                            </div>
                            <div class="form-group">
                                <label for="timeline">Timeline</label>
                                <input type="date" class="form-control" name="timeline" placeholder="Enter Timeline">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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