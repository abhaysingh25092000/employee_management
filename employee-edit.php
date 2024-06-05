<?php
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Employees</h1>
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
              <h5 class="card-title">Employees Form
                <a href="employee-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                        $id=$_POST['id'];
                        $name=$_POST['Name'];
                        $emp_id=$_POST['EmpId'];
                        $email=$_POST['EmailId'];
                        $gender=$_POST['Gender'];
                        $dob=$_POST['Dob'];
                        $department=$_POST['Department'];
                        $address=$_POST['Address'];
                        $city=$_POST['City'];
                        $country=$_POST['Country'];
                        $phone_number=$_POST['PhoneNumber'];

                        $sql="update tblemployees set Name='$name',EmpId='$emp_id',EmailId='$email',Gender='$gender',
                        Dob='$dob',Department='$department',Address='$address',City='$city',
                        Country='$country',PhoneNumber='$phone_number' where id='$id'";

                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                            $_SESSION['success']="Data Updated Successfully";
                            echo "<script>window.location.href='employee-manage.php'</script>";
                        }
                        else
                        {
                            $_SESSION['status']="Data Not Updated";
                            echo "<script>window.location.href='employee-manage.php'</script>";
                        }
                    }
                    else
                    {
                        $id=$_GET['id'];
                        $sql="select * from tblemployees where id='$id'";
                        $result=mysqli_query($conn,$sql);
                        $rows=mysqli_fetch_array($result);
                        ?>
                        <form class="row g-3 needs-validation" novalidate>
                          <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Name</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Name" value="<?php echo $rows['Name'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">ID</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="EmpId" value="<?php echo $rows['EmpId'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="EmailId" value="<?php echo $rows['EmailId'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Gender</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Gender" value="<?php echo $rows['Gender'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Date Of Birth</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Dob" value="<?php echo $rows['Dob'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Department</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Department" value="<?php echo $rows['Department'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Address</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Address" value="<?php echo $rows['Address'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">City</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="City" value="<?php echo $rows['City'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Country</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Country" value="<?php echo $rows['Country'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Mobile No</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Phonenumber" value="<?php echo $rows['Phonenumber'];?>">
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
    </main>

    <?php
    include('includes/scripts.php');
    ?>