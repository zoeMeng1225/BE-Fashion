<?php
require_once "lib/php/helpers.php";
require_once "lib/php/db_connect.php";

function productListTemplate($carry,$item) {
return $carry.<<<HTML
  <div class="imgtext col-sm-6 col-md-6 col-lg-3 col-xl-3">
    <div class="category-img">
  <a href="product-item.php?id=$item->id">
    <img src="$item->thumbnail" alt="">
     <h5 style="color: black">$item->name<br></h5>
      <h5 style="color: black">&dollar;$item->price</h5>
  </a>
  </a>
  </div>
  </div>
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
        <a href="product-list.php">Continue Shopping</a>
      </div>



	<div class="container main-cart">
		 <div class="cart-titil">
           <h2>My Cart</h2>
         </div>
         <div class="cart-detail-text product-detail-main">DETAILS</div>
   <hr>
		<div class="card cart-detail-text product-detail-main">
			<div class="flex-parent main-product-parent">
			    <div class="flex-none main-product">
			        <table class="table lined horizontal table_style">
			        <thead id="thead1">
			         <tr>
				      <th></th>
				      <th class="thead-img">Image</th>
				      <th>Title</th>
				      <th>Price</th>
				      <th>Amount</th>
				      <th>Total</th>
			         </tr>
			        </thead>

			   <tbody class="cart-result"></tbody>
			</table>
			</div>
            </div>
                    

<div class="order-summary">
   <div class="summary-parent">
   <div class="summary-title"><h3>ORDER SUMMARY<h3></div>

			
				<div class="summary-detail">
					<div><h4>Total</h4></div>
					<div class="price-total-total detail-content"></div>
				</div>
			</div>

  <div class="check-card">
    <div class="card-mothod" id="checkout">CHECKOUT</div>
    <div class="card-mothod" id="paypal">
      <img src="imgs/paypal-logo.png">
    </div>
    <a href="product-list.php"><div class="card-mothod" id="continue">CONTINUE SHOPPING</div></a>
  </div>
</div>
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
<h3>SUGGESTIONS</h3>
</div>

<div class='sub-category row'>";
echo array_reduce($results,'productListTemplate');
echo "</div>";


     ?>

</body>
</html>