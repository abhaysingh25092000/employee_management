<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Leave Types</h1>
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
              <h5 class="card-title">LeaveType Insert Form
                <a href="leavetype-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $leave_type=$_POST['LeaveType'];
                        $description=$_POST['Description'];

                        $sql="insert into tblleavetype (LeaveType,Description) values('$leave_type','$description') ";
                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                            $_SESSION['success']="Data Created Successfully";
                            echo "<script>window.location.href='leavetype-manage.php'</script>";
                        }
                        else
                        {
                            $_SESSION['status']="Data Not Created";
                            echo "<script>window.location.href='leavetype-manage.php'</script>";
                        }
                    }
                    else
                    {
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" novalidate>
                            <div class="col">
                              <label for="validationCustomUsername" class="form-label">Name</label>
                                <div class="input-group has-validation">
                                  <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                      Please Enter your Department Name
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                              <label for="validationCustomUsername" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                  <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                      Please Enter your Email Address
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

