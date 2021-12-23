    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <?php include('includes/menus.php'); ?>
    <!-- Categories Widget -->

    <!-- Page Content -->
    <div class="container">

        <?php
      $pagetype = 'contactus';
      $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
      while ($row = mysqli_fetch_array($query)) {

      ?>
        <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle']) ?>

        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>

        <!-- Intro Content -->
        <div class="row">

            <div class="col-lg-12">

                <p><?php echo $row['Description']; ?></p>
            </div>
        </div>
        <!-- /.row -->
        <?php } ?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>