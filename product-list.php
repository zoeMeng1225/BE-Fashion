<?php

include "lib/php/helpers.php";
require_once "lib/php/db_connect.php";



?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product List</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>


  
     <div class="container warpper row">
        <div class="main-img">
          <img src="imgs/productlist-top.jpg">
        </div>
  
        <div class="container filter_detail mobile-search">
               <form id="searchform">
              <input type="search" id="topsearch" placeholder="Search">
              </form>
        </div>

	      <div class="container top">
	        <div class="all-nav1">
           <input type="checkbox" id="checkbox-2">
          <div class="woman-all"><h2>Category</h2>
          <label id="toggle1" for="checkbox-2"><i class="material-icons">expand_more</i></label>
        </div>



    		<div class="side-nav">
    		<div class="ul-group-prarent">
		    <div class="ul-grounp sub-ul">
		    <button type="button" data-filter="category" data-value="" class="button-category">All Products</button>
		    <button type="button" data-filter="category" data-value="top" class="button-category">Tops</button>
		    <button type="button" data-filter="category" data-value="bottom" class="button-category">Bottoms</button>
		    <button type="button" data-filter="category" data-value="accessories" class="button-category">Accessories</button>
	      </div>
        </div>
        </div>
	

        <input type="checkbox" id="checkbox-3">
        <div class="woman-all"><h2>Filter</h2>
        <label id="toggle2" for="checkbox-3"><i class="material-icons">expand_more</i></label>
        </div>
	
	<div class="ul-group-prarent1">
	<div class="ul-grounp sub-ul">
		<button type="button" data-orderby="date_create" data-direction="DESC" class="button-category">Newest</button>
		<button type="button" data-orderby="date_create" data-direction="ASC" class="button-category">Oldest</button>
		<button type="button" data-orderby="price" data-direction="DESC" class="button-category">Most Expensive</button>
		<button type="button" data-orderby="price" data-direction="ASC" class="button-category">Least Expensive</button>
	</div>
   </div>
  </div>

 
	<div class="product-result category center row"> 
	 	
  </div>
</div>

</div>



	<footer class="container footer">
   <?php include "parts/footer.html" ?>
    </div>
   </div>
</footer>
</body>
</html>