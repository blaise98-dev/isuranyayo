<! <?php
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

 <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
         <?php while ($row = mysqli_fetch_array($result)) { ?>
             <li data-target="#carouselExampleCaptions" data-slide-to="<?= $row['pid']; ?>" class="<?php echo $row['pid'] == 34 ? 'active' : ''; ?>"></li>
         <?php } ?>
     </ol>
     <div class="carousel-inner">
         <?php
            while ($row = mysqli_fetch_array($result2)) { ?>
             	<div class="carousel-item <?php echo $row['pid'] == 34 ? 'active' : ''; ?>">
                 <div class="img-holder">
                  
                   <video src="./admin/postvideo/<?= $row['postvideo'] ?>" class="d-block w-100" alt="<?php echo htmlentities($row['posttitle']);?>" controls width="250" height="420">
                 </div>
                 <div class="carousel-caption d-none d-md-block slidefrombottom">
                     <h5><?= $row['posttitle'] ?></h5>
                     
                 </div>
             </div>
             <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
             </a>
         <?php } ?>
     </div>
 </div>