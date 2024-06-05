<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>User Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Validation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Manage Form
                <a href="user-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $name=$_POST['Name'];
                      $username=$_POST['UserName'];
                      $password=$_POST['Password'];
                      $confirm_password=$_POST['ConfirmPassword'];
                      $usertype=$_POST['UserType'];

                      if($password===$confirm_password)
                      {
                        $sql="insert into register (Name,UserName,Password,ConfirmPassword,UserType) 
                        values('$name','$username','$password','$confirm_password','$usertype')";
                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                            $_SESSION['success']="Data Created Successfully";
                            echo "<script>window.location.href='user-manage.php'</script>";
                        }
                        else
                        {
                            $_SESSION['status']="Data Not Created";
                            echo "<script>window.location.href='user-manage.php'</script>";
                        }
                      }    
                    }
                    else
                    {
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" action="" method="POST" novalidate >
                              <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Name</label>
                                  <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="Name" required>
                                      <div class="invalid-feedback">
                                        Please Enter your Name
                                      </div>
                                  </div>
                              </div>

                                <div class="col-md-4">
                                  <label for="validationCustomUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" name="UserName" required>
                                        <div class="invalid-feedback">
                                          Please Enter your Email Address
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                  <label for="validationCustomUsername" class="form-label">Password</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" name="Password" required>
                                        <div class="invalid-feedback">
                                          Please Enter your Gender
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                  <label for="validationCustomUsername" class="form-label">Confirm Password</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" name="ConfirmPassword" required>
                                        <div class="invalid-feedback">
                                          Please Enter your Birthday Date
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                  <label for="validationCustomUsername" class="form-label">Usertypes</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" name="UserType" required>
                                        <div class="invalid-feedback">
                                          Please Enter your Usertype
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                  <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
                                </div>
                            </form><!-- End Custom Styled Validation -->
                        <?php
                    }
                    ?>

            </div>
        </div>
    </div>
</div>
</section>

</main><!-- End #main -->

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>

