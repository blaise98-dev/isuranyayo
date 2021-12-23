    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <?php include('includes/menus.php'); ?>
    <!-- Categories Widget -->

    <!-- Page Content -->
    <div class="container">

        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = mysqli_query($con, "select * from tblposts where PostTitle like '%$search%' and Is_Active=1 order by UpdationDate desc");
            $numrows = mysqli_num_rows($query);
        ?>
        <div class="single_left_coloum_wrapper">
            <h2 class="title">Search result:
                <b><i><?php echo $search . ' (' . $numrows . ' result(s))'; ?></i></b>
            </h2>
            <?php
                while ($row = mysqli_fetch_array($query)) {

                ?>
            <div class="col-md-4 col-sm-12">
                <a href="./details.php?news=<?php echo $row['id']; ?>">
                    <img src="<?php echo './admin/postimages/' . $row['PostImage']; ?>"
                        style="width: 100%; height: 180px;" alt="" />
                    <h3><?php echo $row['PostTitle']; ?> </h3>
                    <p><?php echo substr($row['PostUrl'], 0, 50) . '...'; ?></p>
                </a>
                <p class="single_cat_left_content_meta">Posted by <span>Admin</span> |
                    <?php echo $row['UpdationDate']; ?>
                </p>
            </div>
            <?php }
            } ?>

        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>