<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<header> <div class="container banner-parent">
            <div class="logo-area">
             
                  <img src="imgs/logo-bee02.png" >
                </div>
         
    


            <div class="top-nav">
                <div class="textfree">Free Shipping on $150
                </div>

                <div class="checkbox-menu">
                  
                        <label id="toggle1-cart" for="">
                          <a href="http://zoeroom.com/aau/wnm608/m14/product-cart.php">
                            <i class="material-icons" id="shoppingcart">shopping_cart</i> 
                            <span class="badge cart-amount" id="text-badge">0</span>
                          </a>
                        </label>
         
    
                         
                         <label id="toggle" for="menu-checkbox"><i class="material-icons" id="hambeger">dehaze</i></label>
                        <input type="checkbox" id="menu-checkbox">
                      </label>

                        <div class="mainnav">
                            <ul>
                              <li class="banner-li"><a href="http://zoeroom.com/aau/wnm608/m15/main.php">HOME</a></li>
                                <li class="banner-li"><a href="http://zoeroom.com/aau/wnm608/m15/product-list.php">SHOP</a></li>
                                <li class="banner-li"><a href="http://zoeroom.com/aau/wnm608/m15/product-cart.php">CART</a></li>
                                <li class="banner-li"><a href="http://zoeroom.com/aau/wnm608/m15/about.html">ABOUT US</a></li>
                                 <li class="banner-li"><a href="http://zoeroom.com/aau/wnm608/m15/logout.php">LOGOUT</a></li>
                              
                            
                            </ul>
                        </div> 
                      </div>
                    </div>
            </div>
    
</header>
	<br>
	<br>
	<br>

	



<div class="container padding001">
	 <div class="back-icon">
        <a href="product-list.php">Back To Homepage</a>
      </div>

 <div class="inline-flex row">
	<div class="admin-sidebar">

		<div class="admin-title"><h3>Admin Page</h3></div>
		<div class="add-producr">Add Product</div>
		
	</div>

	<div class="admin-panel">
		
		<div class="panel-title"><h2>Add New Product</h2></div>
		<div class="panel-info row">
			 <div class="all-bao">
			<form action="add_new_product1.php">
			<div class="submit-button">
				<input type="submit" value="Submit" id="admin-submit" class="">
           </div>
               
                <div class="bao">
                 <label for="fname">Name</label>
                     <input type="text" id="fname" name="name" placeholder="Your name.." class="lable-style">
                </div>
                
                <div class="bao">
                <label for="lname">Description</label>
                    <input type="text" id="lname" name="description" placeholder="What is the Product about"class="lable-style" >
                </div>
                <div class="bao">
                <label for="pro-link">Image</label>
                     <input type="text" id="pro-image" name="image" placeholder="Type link of the image" class="lable-style">
                </div>
                <div class="bao">
                 <label for="pro-link">Thumbnail</label>
                     <input type="text" id="pro-thumbnail" name="thumbnail" placeholder="Type link of the image" class="lable-style">
               </div>
                <div class="cate-price">
                <div class="admin-price">
                 <label for="pro-link">Price</label>
                     <input type="text" id="pro-price" name="price" placeholder="Type the Product of Price" class="lable-style">
                    </div>
                    <div class="admin-cate">
                   <label for="category">Category</label>
                    <select id="category" name="category"class="lable-style select-style">
                    <option value="top">Top</option>
                    <option value="bottom">Bottom</option>
                    <option value=“accessories”>Accessories</option>
                    </select>
                </div>
            </div>
        </div>
                    <div class="submit-button">
				   <input type="submit" value="Submit" id="admin-submit" class="">
                 </div>
           
              
            </form>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
