<?php include('includes/header.php'); ?>

<?php include('includes/menus.php'); ?>

<?php
include('./includes/slider.php')
?>
<div class="content_area">
    <div class="col-md-9">
        <div class="col-md-9">
            <h2 class="title">Recent News</h2>
            <?php
            $pop_query = mysqli_query($con, "Select * from  tblposts where Is_Active=1 order by viewed desc limit 3");
            while ($postIds = mysqli_fetch_array($pop_query)) {
                $id_array[] = $postIds['id'];
            }
            $id1 = $id_array[0];
            $id2 = $id_array[1];
            $id3 = $id_array[2];
            $query = mysqli_query($con, "select tc.CategoryName,tp.* from tblcategory as tc, tblposts as tp where tc.id=tp.CategoryId and tp.Is_Active=1 and tp.id not in($id1,$id2,$id3) order by PostingDate desc");
            $total_posts = mysqli_num_rows($query);
            if ($total_posts > 0) {
                while ($posts = mysqli_fetch_array($query)) {
                    $comment_query = mysqli_query($con, "Select * from  tblcomments where postId='" . $posts['id'] . "' and status=1");
                    $comment_num = mysqli_num_rows($comment_query);
            ?>
            <div class="col-md-6 col-sm-12" style="margin-bottom: 10px;">
                <a href="details.php?news=<?php echo $posts['id']; ?>"> <img
                        src="<?php echo './admin/postimages/' . $posts['PostImage']; ?>"
                        style="width: 100%; height: 150px;" alt="" />
                    <h3><?php echo $posts['PostTitle']; ?></h3><br />
                </a>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <i><?php echo $posts['PostingDate']; ?></i></p>
                <p><i class="fa fa-eye" aria-hidden="true"></i> <i><?php echo $posts['viewed']; ?></i>

                    &nbsp;&nbsp;<i class="fa fa-comment" aria-hidden="true"></i> <i><?php echo $comment_num; ?></i>

                    &nbsp;&nbsp; <i class="fa fa-share-alt" aria-hidden="true"></i> <i data-toggle="modal"
                        data-target="#exampleModal" id="<?php echo $posts['id']; ?>"
                        title="<?php echo $posts['PostTitle']; ?>" class="share-link">share</i>
                </p>
                <a class="readmore" href="details.php?news=<?php echo $posts['id']; ?>">read more</a>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="col-md-3">
            <div class="single_sidebar">
                <div class="popular">
                    <h2 class="title">Most Popular</h2>
                    <ul>
                        <li><?php
                            $popular_query = mysqli_query($con, "Select * from  tblposts where Is_Active=1 order by viewed desc limit 3");
                            while ($posts = mysqli_fetch_array($popular_query)) {
                            ?>
                            <div class="single_cat_right_content">
                                <div class="single_cat_right_content editorial"> <img
                                        src="<?php echo './admin/postimages/' . $posts['PostImage']; ?>" alt=""
                                        style="width: 100%; min-height: 100px;" />
                                    <h3><?php echo $posts['PostTitle']; ?></h3><br />
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <i><?php echo $posts['PostingDate']; ?></i>
                                    </p>
                                    <a class="readmore" href="details.php?news=<?php echo $posts['id']; ?>">read
                                        more</a>
                                </div>
                                <?php
                            }
                                ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar col-md-3">
        <div class="col-md-12">
            <a href="#" class="readmore"><img src="images/add1.png" alt="" /> </a>
        </div>
        <div class="single_sidebar">

        </div>
        <div class="single_sidebar">
            <div class="popular">
                <h2 class="title">ads</h2>
                <ul>
                    <li>
                        <div class="single_popular">
                            <a href="#" class="readmore"><img src="images/liquidtelecom.webp"></a>
                        </div>
                    </li>
                    <li>
                        <div class="single_popular">

                            <h3><a href="#" class="readmore"><img src="images/igihekiny.gif"></a></h3>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- share news link modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-12">
            <div class="modal-body">
                <h2><i>Share via:</i></h2>
                <div class="icon-container1">
                    <div class="smd"> <a href="#" id="whatsapp-link" target="blank"><i
                                class="fa fa-whatsapp fa-2x"></i></a>
                        <p>Whatsapp</p>
                    </div>
                    <div class="smd"> <a href="#" id="facebook-link" target="blank"><i
                                class="fa fa-facebook fa-2x"></i></a>
                        <p>Facebook</p>
                    </div>
                    <div class="smd"> <a href="#" id="twitter-link" target="blank"><i
                                class="fa fa-twitter fa-2x"></i></a>
                        <p>Twitter</p>
                    </div>
                    <div class="smd"> <a href="#" id="google-link" target="blank"><i class="fa fa-send fa-2x"></i></a>
                        <p>Email</p>
                    </div>
                </div>
                <div> <input class="col-10 ur" type="url" value="https://www.arcardio.app/acodyseyy" id="myInput"
                        aria-describedby="inputGroup-sizing-default" readonly style="width: 90%; height: 40px;"> <button
                        class="cpy" onclick="myFunction()"><i id="copy-icon" class="fa fa-clone"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end share links modal -->

<?php
include('./includes/footer.php');
?>

<script>
$(document).ready(function() {
    $(document).on('click', '.share-link', function() {
        var postId = $(this).attr("id");
        var posttitle = $(this).attr("title");
        var postUrl = window.location.origin + '/' + window.location.pathname.split("/")[1] +
            '/details.php?news=' +
            postId;
        $("#whatsapp-link").attr('href', "web.whatsapp.com://send?text=" + posttitle);
        $("#facebook-link").attr('href', "https://www.facebook.com/share.php?u=" + postUrl + "&title=" +
            posttitle);
        $("#twitter-link").attr('href', "https://twitter.com/intent/tweet?text=" + posttitle + "+" +
            postUrl);
        $("#google-link").attr('href', "mailto:?body=" + postUrl);
        $("#myInput").val(postUrl);
    })
})


function myFunction() {
    var copyText = $("#myInput");
    copyText.select();
    copyText.get(0).setSelectionRange(0, 99999);

    document.execCommand("copy");
    $("#copy-icon").attr('class', 'fa fa-check');
}
</script>