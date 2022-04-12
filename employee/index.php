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
                            <p class="mt-2">Employee</p>
                    </h3>

                    <?php
                    if(isset($_POST['staff_login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $query = "select * from employees where email = '$email' and password = '$password'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $count = mysqli_num_rows($result);

                        if ($count == 1) {
                            $_SESSION['staff_id'] = $row['staff_id'];
                            header('location: profile.php');
//                                            echo "<script>window.location.href='profile.php';</script>";
                        } else {
                            echo "<p class='alert alert-danger'>Incorrect Password</p>";
                        }
                    }
                    ?>


                    <!--                    <p class="text-center alert alert-danger">Incorrect credentials</p>-->

                    <form class="user p-5" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                   id="MsuEmail" aria-describedby="emailHelp"
                                   placeholder="Enter Email Your Msu Address..." required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                   id="MsuPassword" placeholder="Password" required>
                        </div>
                        <button type="submit" name="staff_login" class="btn btn-primary btn-user btn-block">
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
