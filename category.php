            <!-- Navigation -->
            <?php include('includes/header.php'); ?>

            <?php include('includes/menus.php'); ?>
            <!-- Categories Widget -->

            <!-- Page Content -->
            <div class="container">

                <?php
              if (!empty($_GET['catid'])) {
                $_SESSION['catid'] = intval($_GET['catid']);
              }
              if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
              } else {
                $pageno = 1;
              }
              $no_of_records_per_page = 8;
              $offset = ($pageno - 1) * $no_of_records_per_page;

              $total_pages_sql = "SELECT COUNT(*) FROM tblposts where Is_active=1";
              $result = mysqli_query($con, $total_pages_sql);
              $total_rows = mysqli_fetch_array($result)[0];
              $total_pages = ceil($total_rows / $no_of_records_per_page);
              $catquery = mysqli_query($con, "select *from tblcategory where id='" . $_SESSION['catid'] . "'");
              $catfetch = mysqli_fetch_array($catquery);

              $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='" . $_SESSION['catid'] . "' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

              $rowcount = mysqli_num_rows($query);
              if ($rowcount == 0) {
                echo 'No article available';
              } else {
              ?>
                <div class="single_left_coloum_wrapper">
                    <br>
                    <h2 class="title"><?php echo $catfetch['CategoryName']; ?></h2>
                    <?php
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <a href="./details.php?news=<?php echo $row['pid']; ?>">
                        <div class="col-md-3 col-sm-12">
                            <img src="<?php echo './admin/postimages/' . $row['PostImage']; ?>"
                                style="width: 100%; min-height: 180px;" alt="" />
                            <h3><?php echo $row['posttitle']; ?> </h3><br>
                            <p><?php echo substr($row['url'], 0, 50) . '...'; ?></p>
                            <p class="single_cat_left_content_meta">Posted by <span>Admin</span> |
                                <?php echo $row['postingdate']; ?>
                            </p>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <div class="row">
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                        <li class="<?php if ($pageno <= 1) {
                                  echo 'disabled';
                                } ?> page-item">
                            <a href="<?php if ($pageno <= 1) {
                                  echo '#';
                                } else {
                                  echo "?pageno=" . ($pageno - 1);
                                } ?>" class="page-link">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                                  echo 'disabled';
                                } ?> page-item">
                            <a href="<?php if ($pageno >= $total_pages) {
                                  echo '#';
                                } else {
                                  echo "?pageno=" . ($pageno + 1);
                                } ?> " class="page-link">Next</a>
                        </li>
                        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a>
                        </li>
                    </ul>
                </div>
                <?php }
              ?>
            </div>
            <!-- /.container -->

            <!-- Footer -->
            <?php include('includes/footer.php'); ?>