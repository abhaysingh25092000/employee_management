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
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Leaves Manage
            <a href="leave-insert.php" class="btn btn-primary btn-sm float-end" style="margin-left:5px;">
              <i class="bi bi-person-plus-fill" style="margin-left:2px;"></i>
              Add New Records
            </a>

            <a href="leave-export.php" class="btn btn-danger btn-sm float-end" style="margin-left: 5px;">
              <i class="bi bi-download" style="margin-left:2px;"></i>
              Export to Excel
            </a>

            <a href="leave-import.php" class="btn btn-warning btn-sm float-end" style="margin-left: 5px;">
              <i class="bi bi-upload" style="margin-left:2px;"></i>
              Import to Excel
            </a>

            <a href="leave-pdf.php" class="btn btn-info btn-sm float-end" style="margin-left: 5px;">
              <i class="bi bi-file-pdf-fill" style="margin-left:2px;"></i>
              PDF
            </a>
          </h5>

          <form class="d-flex" role="search" action="leave-search.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="margin-top:10px;width:20%;margin-left:75%;" name="search_value">
            <button class="btn btn-primary" type="submit" name="search_btn" style="margin-top:10px;"><i class="bi bi-search"></i></button>
          </form>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Leave Type</th>
                <th scope="col">To</th>
                <th scope="col">From</th>
                <th scope="col">Description</th>
                <th scope="col">Admin Remark</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql="select * from tblleaves";
              $result=mysqli_query($conn,$sql);
              while($rows=mysqli_fetch_array($result))
              {
                $id=$rows['id'];
                if($rows['status']==1)
                $sts="<a href=leave-status.php?sts=0&id=$id><span class='badge text-bg-success'>Approved</span></a>";
                if($rows['status']==0)
                $sts="<a href=leave-status.php?sts=1&id=$id><span class='badge text-bg-danger'>Not Approved</span></a>";
                ?>
                <tr>
                  <th scope="row"><?php echo $rows['id'];?></th>
                  <td><?php echo $rows['empid'];?></td>
                  <td><?php echo $rows['LeaveType'];?></td>
                  <td><?php echo $rows['ToDate'];?></td>
                  <td><?php echo $rows['FromDate'];?></td>
                  <td><?php echo $rows['Description'];?></td>
                  <td><?php echo $sts;?></td>
                  <td>
                    <a href="leave-edit.php?id=<?php echo $rows['id'];?>" class="btn btn-success btn-sm">
                      <i class="bi bi-pen-fill"></i>
                    </a>
                    <a href="leave-delete.php?id=<?php echo $rows['id'];?>" class="btn btn-danger btn-sm">
                      <i class="bi bi-trash-fill"></i>
                    </a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

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

