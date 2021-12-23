<!-- Navigation -->
<?php include('includes/header.php'); ?>

<?php include('includes/menus.php'); ?>
<!-- Categories Widget -->

<?php
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = "bin2hex(random_bytes(32))";
}

if (isset($_POST['submit'])) {
    //Verifying CSRF Token
    if (!empty($_POST['csrftoken'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $postid = intval($_GET['news']);
            $st1 = '0';
            $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
            if ($query) :
                echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
                unset($_SESSION['token']);
            else :
                echo "<script>alert('Something went wrong. Please try again.');</script>";

            endif;
        }
    }
}
?>

<!-- Page Content -->
<div class="content_area">
    <div class="col-md-8">
        <?php
        if (isset($_GET['news'])) {
            $news_id = $_GET['news'];
            $query = mysqli_query($con, "select * from tblposts where id='$news_id'");
            $numrows = mysqli_num_rows($query);
        ?>
        <div>
            <?php
                while ($row = mysqli_fetch_array($query)) {
                    $views = $row['viewed'] + 1;
                    $cat = $row['CategoryId'];
                    $updateViews = mysqli_query($con, "update tblposts set viewed='$views' where id='$news_id'");
                    $catquery = mysqli_query($con, "select * from tblcategory where id='$cat'");
                    $catfetch = mysqli_fetch_array($catquery);
                ?>

            <img style="width:100%; height: 400px;" src="<?php echo './admin/postimages/' . $row['PostImage']; ?>" />
            <br><br>
            <i>Posted by Admin | <b><i class="fa fa-clock-o" aria-hidden="true"></i>
                    <i> <?php echo $row['UpdationDate']; ?></b> &nbsp;&nbsp; Category:
                <b><a
                        href="category.php?catid=<?php echo $row['CategoryId']; ?>"><?php echo $catfetch['CategoryName']; ?></a></b>
            </i><br><br>
            <h2><b>
                    <?php echo htmlentities($row['PostTitle']); ?></b>
            </h2>
            <hr />
            <?php echo $row['PostDetails']; ?>
            <?php }
            } ?>

        </div>
        <p></p>

        <!-- comment section start -->

        <div class="single_left_coloum_wrapper" style="border-top: 1px dashed #999;">
            <div class="col-md-8">
                <div class="card my-4">
                    <h2 class="card-header">Leave a Comment:</h2>
                    <div class="card-body">
                        <form name="Comment" method="post">
                            <input type="hidden" name="csrftoken"
                                value="<?php echo htmlentities($_SESSION['token']); ?>" />
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Enter your fullname"
                                    required>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your Valid email" required>
                            </div>


                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="3" placeholder="Comment"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <hr />

                <!---Comment Display Section --->

                <?php
                    $sts = 1;
                    $pid = $_GET['news'];
                    $query = mysqli_query($con, "select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
                    $total_replies = mysqli_num_rows($query); ?>
                <h2 class="card-header"><b>Replies (<?php echo $total_replies; ?>):</b></h2>
                <?php
                    if ($total_replies < 1) { ?>
                <span><i>No Reply yet</i></span>
                <?php
                    } else {
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                <div class="media mb-4">
                    <div class="media-body">
                        <h4><b><?php echo htmlentities($row['name']); ?></b> <br />
                            <span style="font-size:11px;"><b>at</b>
                                <?php echo htmlentities($row['postingDate']); ?></span>
                        </h4>

                        <?php echo htmlentities($row['comment']); ?>
                    </div>
                </div>
                <?php }
                    } ?>

            </div>
        </div>

        <!-- comment section end -->

        <div class="single_left_coloum_wrapper">
            <h2 class="title">Related news</h2>

            <?php
                $query = mysqli_query($con, "select * from tblposts where CategoryId='$cat' and Is_Active=1 and id!='$news_id'");
                $numrows = mysqli_num_rows($query);
                if ($numrows < 1) {
                ?>
            <div class="col-md-4 col-sm-12">
                <p>No relates news</p>
            </div>
            <?php
                } else {
                }
                while ($row = mysqli_fetch_array($query)) {
                ?>
            <div class="col-md-4 col-sm-12" style="margin-bottom: 10px;"> <img
                    src="<?php echo './admin/postimages/' . $row['PostImage'] ?>" alt=""
                    style="width: 100%; height: 150px;" />
                <h3><?php echo $row['PostTitle']; ?></h3><br />
                <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                    <i><?php echo $row['PostingDate']; ?></i>
                </p>
                <a class="readmore" href="details.php?news=<?php echo $row['id']; ?>">read more</a>
            </div>
            <?php
                }
                ?>
        </div>

        <div class="single_sidebar">
            <div class="popular">
                <h2 class="title">Popular News</h2>
                <?php
                    $popular_query = mysqli_query($con, "Select * from  tblposts where Is_Active=1 order by viewed desc limit 6");
                    while ($posts = mysqli_fetch_array($popular_query)) {
                    ?>
                <div class="col-md-4 col-sm-12" style="margin-bottom: 10px;"> <img
                        src="<?php echo './admin/postimages/' . $posts['PostImage'] ?>" alt=""
                        style="width: 100%; height: 150px;" />
                    <h3><?php echo $posts['PostTitle']; ?></h3><br />
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                        <i><?php echo $posts['PostingDate']; ?></i>
                    </p>
                    <a class="readmore" href="details.php?news=<?php echo $posts['id']; ?>">read more</a>
                </div>
                <?php
                    }
                    ?>
            </div>
        </div>
    </div>

    <!-- adverts side -->
    <?php
    include('adverts_section.php');
    ?>
    <!-- end of adverts -->
</div>
<!-- /.container -->

<!-- Footer -->
<?php include("includes/footer.php"); ?>