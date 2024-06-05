<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Leaves Type</h1>
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
              <h5 class="card-title">Leaves Type Form Edit
                <a href="leavetype-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                        $id=$_POST['id'];
                        $leave_type=$_POST['LeaveType'];
                        $description=$_POST['Description'];

                        $sql="update tblleaves set Leavetype='$leave_type',Description='$description' 
                        where id='$id'";

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
                        $id=$_GET['id'];
                        $sql="select * from tblleavetype where id='$id'";
                        $result=mysqli_query($conn,$sql);
                        $rows=mysqli_fetch_array($result);
                        ?>
                        <form class="row g-3 needs-validation" novalidate>
                          <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Leave Type</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="LeaveType" value="<?php echo $rows['LeaveType'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Description</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Description" value="<?php echo $rows['Description'];?>">
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