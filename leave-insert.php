<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Leaves Management</h1>
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
              <h5 class="card-title">Leaves Insert Form
                <a href="leave-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $leave_type=$_POST['LeaveType'];
                        $to_date=$_POST['ToDate'];
                        $from_date=$_POST['FromDate'];
                        $description=$_POST['Description'];
                        $posting_date=$_POST['PostingDate'];
                        $admin_remark=$_POST['AdminRemark'];
                        $admin_remark_date=$_POST['AdminRemarkDate'];
                        $emp_id=$_POST['empid'];

                        $sql="insert into tblleaves(LeaveType,ToDate,FromDate,Description,PostingDate,AdminRemark,AdminRemarkDate,empid) 
                        values('$leave_type','$to_date','$from_date','$description','$posting_date','$admin_remark','$admin_remark_date','$emp_id')";
                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                            $_SESSION['success']="Data Created Successfully";
                            echo "<script>window.location.href='leave-manage.php'</script>";
                        }
                        else
                        {
                            $_SESSION['status']="Data Not Created";
                            echo "<script>window.location.href='leave-manage.php'</script>";
                        }
                    }
                    else
                    {
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Leave Type</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Leave Type
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">To</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Email Address
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">From</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Gender
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Description</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Birthday Date
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Post Date</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Posting Date
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Admin</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                    Please Enter your Admin Remark
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Admin Date</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Admin Remark Date
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">ID</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Employee Id
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

