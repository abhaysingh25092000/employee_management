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
                <a href="user-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                      $name=$_POST['Name'];
                      $username=$_POST['UserName'];
                      $password=$_POST['Password'];
                      $confirm_password=$_POST['ConfirmPassword'];
                      $usertype=$_POST['UserType'];

                      $sql="update register set Name='$name',UserName='$username',Password='$password',
                      ConfirmPassword='$confirm_password',UserType='$usertype' where id='$id'";

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
                    else
                    {
                        $id=$_GET['id'];
                        $sql="select * from register where id='$id'";
                        $result=mysqli_query($conn,$sql);
                        $rows=mysqli_fetch_array($result);
                        ?>
                        <form class="row g-3 needs-validation" action="" method="POST" novalidate >
                          <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">
                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Name</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Name" value="<?php echo $rows['Name'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="UserName" value="<?php echo $rows['UserName'];?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Password</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="Password" value="<?php echo $rows['Password'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Confirm Password</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="ConfirmPassword" value="<?php echo $rows['ConfirmPassword'];?>">
                              </div>
                          </div>

                          <div class="col">
                            <label for="validationCustomUsername" class="form-label">Usertypes</label>
                              <div class="input-group has-validation">
                                <input type="text" class="form-control" name="UserType" value="<?php echo $rows['UserType'];?>">
                              </div>
                          </div>

                          <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="update_btn">Update form</button>
                          </div>
                        </form>
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