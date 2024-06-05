<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Leaves</h1>
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
              <h5 class="card-title">Leaves Form Edit
                <a href="leave-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                        $id=$_POST['id'];
                        $leave_type=$_POST['LeaveType'];
                        $to_date=$_POST['ToDate'];
                        $from_date=$_POST['FromDate'];
                        $description=$_POST['Description'];
                        $posting_date=$_POST['PostingDate'];
                        $admin_remark=$_POST['status'];
                        $emp_id=$_POST['empid'];

                        $sql="update tblleaves set Leavetype='$leave_type',ToDate='$to_date',FromDate='$from_date',
                        Description='$description',PostingDate='$posting_date',status='$admin_remark',empid='$emp_id' 
                        where id='$id'";

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
                        $id=$_GET['id'];
                        $sql="select * from tblleaves where id='$id'";
                        $result=mysqli_query($conn,$sql);
                        $rows=mysqli_fetch_array($result);
                        ?>
                        <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                          <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Leave Type</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="LeaveType" value="<?php echo $rows['LeaveType'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">To</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="ToDate" value="<?php echo $rows['ToDate'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">From</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="FromDate" value="<?php echo $rows['FromDate'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Description</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Description" value="<?php echo $rows['Description'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Post Date</label>
                              <div class="input-group has-validation">
                                <input type="date" class="form-control" name="PostingDate" value="<?php echo $rows['PostingDate'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Admin Remark</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="status" value="<?php echo $rows['status'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">ID</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="empid" value="<?php echo $rows['empid'];?>">
                              </div>
                          </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="update_btn">Update</button>
                            </div>
                        <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </main>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>