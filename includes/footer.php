<div class="footer_top_area">
    <div class="inner_footer_top"> <img src="images/add3.png" alt="" /> </div>
</div>
<div class="footer_bottom_area">
    <div class="footer_menu">
        <ul id="f_menu">
            <?php
            $query = mysqli_query($con, "select tblcategory.CategoryName as category from tblcategory");
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <li><a href="category.php?"><?php echo htmlentities($row['category']); ?></a>

            </li>

            <?php } ?>
            <li><a href="../aboutus.php">About Us</a>

            </li>
            <li><a href="../contactus.php">Contact Us</a>

            </li>
        </ul>

    </div>


    <div class="footer-links col-md-12">
        <h2>Reach Us: </h2>
        <ul id="share">
            <!-- whatsapp -->
            <li><a class="whatsapp" href="#" target="blank"><i class="fa fa-whatsapp"></i></a></li>

            <!-- facebook -->
            <li><a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a></li>

            <!-- twitter -->
            <li><a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a></li>

            <!-- google -->
            <li><a class="googleplus" href="#" target="blank"><i class="fa fa-send"></i></a></li>

            <!-- linkedin -->
            <li><a class="linkedin" href="#" target="blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>

    <div class="copyright_text">
        <p>Copyright &copy; 2021 Isuranyayo. All rights reserved | Design by <a target="_blank" rel="nofollow"
                href="">Adaptive Engineering Group Ltd</a></p>
    </div>
</div>
</div>
</div>
<script type="text/javascript" src="assets/js/jquery-min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="wow/engine1/jquery.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript">
// selectnav('nav', {
//     label: '-Navigation-',
//     nested: true,
//     indent: '-'
// });
// selectnav('f_menu', {
//     label: '-Navigation-',
//     nested: true,
//     indent: '-'
// });
$('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
});

var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, '300');
});
</script>
</body>

</html>