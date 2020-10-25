<?php

include "lib/php/helpers.php";
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
  </a>
  </div>
  </div>
HTML;
}


function productProfileTemplate($carry,$item) {

$image = array_reduce(
  explode(",",$item->image),
  function($c,$i) {
    return $c."<img src='$i'>";
  }
);
return $carry.<<<HTML
<div class="container wrapper main row">
  <div class="group col-sm-12 col-md-12 col-lg-6 col-xl-6 inline-group">
   <div class="thumbs image-thumbs">
     <img src="$item->thumbnail" alt="" class="product-image media-image image-thumbs">
     <img src="$item->thumbnail2" alt="">
     <img src="$item->thumbnail1" alt="">
     <img src="$item->thumbnail3" alt="">
   
  </div>

  <div class="thumb-images image-main">
          $image
   </div>
</div>



  <div class="group detail-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
  <div class="datail-name">
    <h2>$item->name</h2>
    
    <div class="description">$item->description</div>
    <div class="price-item">&dollar;$item->price USD </div>
  </div>

      <div class="color_size">
        <div class="color-options">
          <a href="#"><img src="imgs/pink.jpg"></a>
          <a href="#"><img src="imgs/black.jpg"></a>
          <a href="#"><img src="imgs/blue.png"></a>
          <a href="#"><img src="imgs/white.jpg"></a>
          <a href="#"><img src="imgs/yellow.png"></a>
          <a href="#"><img src="imgs/green.jpg"></a>
        </div>
      </div>
        <div class="detail-select">
        <div class="color-options">
      
        </div>
       </div>
       <div class="size-options">
          <div class="size-guide">
              <a class="size-button" href="#popup1">Size Guide</a>
            </div>
          <div id="popup1" class="overlay"> 
            <div class="popup">
              <img src="imgs/size-chart.jpg">
              <a class="close" href="#">&times;</a>
            </div>
          </div>
     <div class="select-size">
        <select id="label3">
          <option value="select">Select Size</option>
          <option value="0">0</option>
          <option value="2">2</option>
          <option value="4">4</option>
          <option value="6">6</option>
          <option value="8">8</option>
          <option value="10">10</option>
          <option value="12">12</option>
          </select>
          </div>
        </div>
        <div class="card">
      <div class="product-item">
          <div class="product-content box">
             <a href="#popup2"><button type="button" class="js-increase-cart form-button add-to-cart"
             data-id="$item->id">Add To Cart</button></a>
          </div>
      
        <div id="popup2" class="overlay">
        <div class="popup1">
        <div class="icon-close">
        <a class="close" href="#">&times;</a>
        </div>
        <div class="addtocart-title">
        <h2>Added to cart</h2>
        </div>
        <div class="flex-inline">
        <div class="popup-image">
        <img src="$item->image" alt="">
        </div>
        <div class="datail-name">
        <h2>$item->name</h2>
         &dollar;$item->price USD 
         </div>
        </div>
        <div class="popup-button">
          <a href="http://zoeroom.com/aau/wnm608/m15/product-cart.php"><button class="popup-button">View Cart</button></a>
        </div>


 
  </div>
  </div>

      </div>
    <div class="ship">
      <label class="shipping-container">Shipping
      <input type="radio" checked="checked" name="radio" id="checkbox4">
      <span class="checkmark" id="checkmark1"></span>
    </label>

    <label class="shipping-container">Pickup Store
  <input type="radio" checked="checked" name="radio" id="checkbox4">
  <span class="checkmark" id="checkmark1"></span>
</label>
  </div>
</div>
</div>
</div>
</div>
<div>
</div>
  </div>
  </div>

    <br>
    <br>
    <br>
    <br>
    <br>
  

         
         
       
HTML;
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Item</title>
  <?php include "parts/head.html" ?>
</head>
<body>
  <?php include "parts/header.html" ?>

        <br>
        <div class="back-icon">
        <a href="product-list.php">Back</a>
      </div>
      <?php

      if(!isset($_GET['id'])) { 
        echo "Oops";
      }
      else {
        $result = getQueryResults("
          SELECT * FROM Products
          WHERE id='{$_GET['id']}'
        ");

        echo array_reduce($result,'productProfileTemplate');
      }
      ?>
    </div>
  </div>

<?php 


        $results = getQueryResults(isset($_GET['id'])?
  "
    SELECT * FROM Products
    WHERE id<>{$_GET['id']}
    ORDER BY RAND() LIMIT 4
  ":"
    SELECT * FROM Products
    ORDER BY RAND() LIMIT 4
  "
);

echo "
<div class='category-head'>
<h2 class=title-h2>Bestsellers</h2>
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




  <footer class="container footer">
  
  <footer class="container footer">
   <?php include "parts/footer.html" ?>
    </div>
    </div>
   </div>
</footer>

</body>
</html>


</body>
</html>