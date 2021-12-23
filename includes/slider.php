 <style>
a.carousel-control {
    display: flex;
    justify-content: center;
    align-items: center;
}

a.carousel-control i {
    font-size: 50px;
    font-weight: bolder;
}
 </style>

 <?php
    $query = "select * from tblposts where Is_Active=1 and isSliding=1 order by id desc LIMIT 5";
    $result = mysqli_query($con, $query);
    $slide_num = mysqli_num_rows($result);
    ?>
 <div class="slider_area">
     <div class="row">
         <div class="col-md-7">
             <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                     <?php
                        $count = 0;
                        while ($count < $slide_num) {
                        ?>
                     <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count; ?>"
                         class="<?php if ($count == 0) {
                                                                                                                        echo 'active';
                                                                                                                    } ?>"></li>
                     <?php
                            $count += 1;
                        } ?>
                 </ol>
                 <div class="carousel-inner">
                     <?php
                        $count = 1;
                        while ($slide_row = mysqli_fetch_array($result)) {
                        ?>
                     <div class="item <?php if ($count == 1) {
                                                echo 'active';
                                            } ?>">
                         <a href="details.php?news=<?php echo $slide_row['id']; ?>">
                             <img src="<?php echo './admin/postimages/' . $slide_row['PostImage']; ?>"
                                 alt="slide <?php echo $count; ?>" style="width: 100%; height: 100%;">
                             <div class="carousel-caption">
                                 <p><?php echo $slide_row['PostTitle']; ?></p>
                             </div>
                         </a>
                     </div>
                     <?php
                            $count += 1;
                        }
                        ?>
                 </div>
                 <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                     <i class="fa fa-angle-left"></i></a><a class="right carousel-control"
                     href="#carousel-example-generic" data-slide="next"><i class="fa fa-angle-right">
                     </i></a>
             </div>
         </div>

         <?php
            $query = "select 
        tblposts.id as pid,
        tblposts.PostTitle as posttitle,
        tblposts.postvideo,
        tblcategory.CategoryName as category,
        tblcategory.id as cid,
        tblsubcategory.Subcategory as subcategory,
        tblposts.PostDetails as postdetails,
        tblposts.PostingDate as postingdate,
        tblposts.PostUrl as url from tblposts 
        left join tblcategory on tblcategory.id=tblposts.CategoryId 
        left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
        where tblposts.Is_Active=1 and postvideo!=null 
        order by tblposts.id desc 
        LIMIT 1, 10";
            $result = mysqli_query($con, $query);
            $result2 = mysqli_query($con, $query);
            ?>
         <!-- video slides -->
         <div class=" col-md-3 col-md-offset-1">
             <div id="wowslider-container1" style="margin-top:10px; width: 100%;">
                 <div class="ws_images">
                     <ul>
                         <li><iframe width="100%" height="100%" src="./admin/postvideo/<?= $row['postvideo'] ?>"
                                 frameborder="0" allowfullscreen></iframe><img src="wow/data1/images/c7xcddjdqiu.png"
                                 alt="<?php echo htmlentities($row['posttitle']); ?>"
                                 title="<?php echo htmlentities($row['posttitle']); ?>" id="wows1_0" /></li>
                         <li><iframe width="100%" height="100%"
                                 src="https://www.youtube.com/embed/w1u-qtJ37HI?autoplay=0&rel=0&enablejsapi=1&playerapiid=ytplayer&wmode=transparent"
                                 frameborder="0" allowfullscreen></iframe><img src="wow/data1/images/w1uqtj37hi.png"
                                 alt="Sophia, the humanoid robot's one-on-one interview with Minister Paula Ingabire"
                                 title="Sophia, the humanoid robot's one-on-one interview with Minister Paula Ingabire"
                                 id="wows1_1" /></li>
                         <li><iframe width="100%" height="100%"
                                 src="https://www.youtube.com/embed/V0UyQBqUvK8?autoplay=0&rel=0&enablejsapi=1&playerapiid=ytplayer&wmode=transparent"
                                 frameborder="0" allowfullscreen></iframe><img src="wow/data1/images/v0uyqbquvk8.png"
                                 alt="css slider"
                                 title="RUSIZI: Ibanga ry'igabanuka ry'imibare y'abandura COVID-19 mu minsi itatu ishize yikurikiranya"
                                 id="wows1_2" /></li>
                         <li><iframe width="100%" height="100%"
                                 src="https://www.youtube.com/embed/qG0lCxQTJ00?autoplay=0&rel=0&enablejsapi=1&playerapiid=ytplayer&wmode=transparent"
                                 frameborder="0" allowfullscreen></iframe><img src="wow/data1/images/qg0lcxqtj00.png"
                                 alt="Babanje kuryumaho || Ukuri kwa Sadio Mané ku rukundo rwe na Kate Bashabe"
                                 title="Babanje kuryumaho || Ukuri kwa Sadio Mané ku rukundo rwe na Kate Bashabe"
                                 id="wows1_3" /></li>
                     </ul>
                 </div>
                 <div class="ws_bullets">
                     <div>
                         <a href="#"
                             title="RIB yerekanya abantu 57 bahoze mu mitwe igamije guhungabanya umutekano w’u Rwanda bitwara gisirikare"><span><img
                                     src="wow/data1/tooltips/c7xcddjdqiu.png"
                                     alt="RIB yerekanya abantu 57 bahoze mu mitwe igamije guhungabanya umutekano w’u Rwanda bitwara gisirikare" />1</span></a>
                         <a href="#"
                             title="Sophia, the humanoid robot's one-on-one interview with Minister Paula Ingabire"><span><img
                                     src="wow/data1/tooltips/w1uqtj37hi.png"
                                     alt="Sophia, the humanoid robot's one-on-one interview with Minister Paula Ingabire" />2</span></a>
                         <a href="#"
                             title="RUSIZI: Ibanga ry'igabanuka ry'imibare y'abandura COVID-19 mu minsi itatu ishize yikurikiranya"><span><img
                                     src="wow/data1/tooltips/v0uyqbquvk8.png"
                                     alt="RUSIZI: Ibanga ry'igabanuka ry'imibare y'abandura COVID-19 mu minsi itatu ishize yikurikiranya" />3</span></a>
                         <a href="#"
                             title="Babanje kuryumaho || Ukuri kwa Sadio Mané ku rukundo rwe na Kate Bashabe"><span><img
                                     src="wow/data1/tooltips/qg0lcxqtj00.png"
                                     alt="Babanje kuryumaho || Ukuri kwa Sadio Mané ku rukundo rwe na Kate Bashabe" />4</span></a>
                     </div>
                 </div>
                 <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">slider
                         html</a> by WOWSlider.com v9.0</div>
                 <div class="ws_shadow"></div>
             </div>
         </div>
         <script type="text/javascript" src="wow/engine1/wowslider.js"></script>
         <script type="text/javascript" src="wow/engine1/script.js"></script>
     </div>
 </div>
 <div id="push">
 </div>