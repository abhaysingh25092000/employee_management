<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Validation</h1>
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
              <h5 class="card-title">Department Insert Form
                <a href="department-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                        $id=$_POST['id'];
                        $name=$_POST['DepartmentName'];
                        $short_name=$_POST['DepartmentShortName'];
                        $code=$_POST['DepartmentCode'];

                        $sql="update tbldepartments set DepartmentName='$name',DepartmentShortName='$short_name',DepartmentCode='$code' where id='$id'";
                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                          $_SESSION['success']="Data Updated Successfully";
                          echo "<script>window.location.href='department-manage.php'</script>";
                        }
                        else
                        {
                          $_SESSION['status']="Data Not Updated";
                          echo "<script>window.location.href='department-manage.php'</script>";
                        }
                    }
                    else
                    {
                        $id=$_GET['id'];
                        $sql="select * from tbldepartments where id='$id'";
                        $result=mysqli_query($conn,$sql);
                        $rows=mysqli_fetch_array($result);
                        ?>
                        <!-- Custom Styled Validation -->
                        <form class="row g-3 needs-validation" novalidate>
                          <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Department Name</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="DepartmentName" value="<?php echo $rows['DepartmentName'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Department Short Name</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="DepartmentShortName" value="<?php echo $rows['DepartmentShortName'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Department Code</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="DepartmentCode" value="<?php echo $rows['DepartmentCode'];?>">
                              </div>
                          </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="update_btn">Update</button>
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
    include('includes/scripts.php');
    ?>