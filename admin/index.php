<?php include_once ('../includes/header.php'); ?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <h3 style="color: black" class="font-weight-bolder text-center mt-1">
                        ZIMDEF Work Progress Management System
                    </h3>
                    <hr>
                    <h3 style="color: black" class="font-weight-bolder text-center mt-1">
                        <img class="text-center" src="../img/zimdef2.jfif" width="250" height="150" alt="">
                        <br>
                        <p class="mt-2">Administration</p>
                    </h3>

                    <?php
                    if(isset($_POST['admin'])){
                        $admin_password = $_POST['password'];

                        if ($admin_password === "12345") {
                            header('location: profile.php');
                        } else {
                            echo "<p class='alert alert-danger text-center'>Incorrect credentials</p>";
                        }
                    }
                    ?>

                    <form class="user p-3" method="post">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                   id="MsuPassword" placeholder="Password" required>
                        </div>
                        <button type="submit" name="admin" class="btn btn-warning text-dark font-weight-bolder btn-user btn-block">
                            Login
                        </button>
                        <hr>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include_once ('../includes/footer.php'); ?>
