<?php
require_once "lib/php/helpers.php";
require_once "lib/php/db_connect.php";

function productListTemplate($carry,$item) {
return $carry.<<<HTML
  <div class="imgtext col-sm-6 col-md-6 col-lg-3 col-xl-3">
    <div class="category-img">
  <a href="product-item.php?id=$item->id">
    <img src="$item->image" alt="">
      <h5 style="color: black">$item->name<br></h5>
      <h5 style="color: black">&dollar;$item->price</h5>
  </a>
  </div>
  </div>
HTML;
}



?><!DOCTYPE html>
 <html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fitness Gear|BodyFit athletica</title>
  <?php include "parts/head.html" ?>
  
  
</head>
<body>

<!-- <header>  -->
  <?php 
    include("parts/header.html");
  ?>
<!-- </header> -->

<br>
<br>
<br>
<br>
<br>  

<div class="container top-ad carousel" data-timer="4">
    <div class="top-image carousel-deck">
    <div class="carousel-slide" style="background-image: url('imgs/slide1.png');"></div>
    <div class="carousel-slide" style="background-image: url('imgs/slide2.png');"></div>
    <div class="carousel-slide" style="background-image: url('imgs/slide4.png');"></div>
    <div class="carousel-slide" style="background-image: url('imgs/slide5.png');"></div>
      </div>
    </div>
    <br>
    <br>
    <br>
<br>
<br>
<br>
<br>
<br>  
        <div class="category whole-cate">
          <div class="category-head">
               <h2 class=title-h2>NEW IN</h2>
           </div>
              <div class="image-top">
               <div class="imgtext col-sm-12 col-md-6 col-lg-6 col-xl-6">
                   <div class="category-img ">
                    <a href="http://zoeroom.com/aau/wnm608/m15/product-list.php">
                    <img src="imgs/fitness1-1.png"></a>
                    <div></div>
                  </div>
                
              </div> 
                 
                  
              <div class="imgtext col-sm-12 col-md-6 col-lg-6 col-xl-6">
                  <div class="category-img ">
                    <a href="http://zoeroom.com/aau/wnm608/m15/product-list.php"><img src="imgs/fitness1-2.png"></a>
                    <div class="textintext"></div>
                  </div>
                 
              </div> 
          </div>
      </div>


    
    <br>
    <br>
    <br>
<br>
<br>
<br>
<br>
<br>  

    
  <div class="new-product row">
       <div class="newtitle">
          <div class="textintext"><h2 class=title-h2>Fit is not a destination, it’s a way of life<h2></div>
       </div>
       <div class="newimg-group row">
          <div class="newimg col-sm-12 col-md-4 col-lg-4 col-xl-4">
              <a href="http://zoeroom.com/aau/wnm608/m14/product-list.php"><img src="imgs/unlock.png"></a>
          </div>
          <div class="newimg col-sm-12 col-md-4 col-lg-4 col-xl-4">
              <a href="http://zoeroom.com/aau/wnm608/m14/product-list.php"><img src="imgs/nopain.png"></a>
          </div> 
          <div class="newimg col-sm-12 col-md-4 col-lg-4 col-xl-4">
             <a href="http://zoeroom.com/aau/wnm608/m14/product-list.php"><img src="imgs/find.png"></a>
          </div>
      </div>
  </div>

   <br>

   <br>
   <br>
   <br>
   <br>
   <div class="container top-ad">
    <div class="freeshipping-background" style="background-image:url(imgs/freeshipping.png)"></div>
    <a href="http://zoeroom.com/aau/wnm608/m14/product-list.php"><button type="button" class="freeshipping-block"><h3>Free Shipping on $150<br/> Free Return</h3></button></a>
    </div>

<br>
<br>
<br>
<br>
<br> 

    <?php 
        $results = getQueryResults(isset($_GET['id'])?
  "
    SELECT * FROM products
    WHERE id<>{$_GET['id']}
    ORDER BY RAND() LIMIT 4
  ":"
    SELECT * FROM Products
    ORDER BY RAND() LIMIT 4
  "
);

echo "
<div class='category-head'>
<h3>SUGGESTIONS</h3>
</div>

<div class='sub-category row'>";
echo array_reduce($results,'productListTemplate');
echo "</div>";


?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>


<!-- <the row div covered the footer> -->

<?php 
          include("parts/footer.html");
          ?>








</body>
</html>
