<?php
require_once "lib/php/helpers.php";
require_once "lib/php/db_connect.php";

function productListTemplate($carry,$item) {
return $carry.<<<HTML
<div class="col-sm-6 col-md-4 col-lg-3">
	<div class="card card-full category-img">
	<a href="product_item.php?id=$item->id" class="product-item">
		<img src="$item->image" alt="" class="product-image media-image">
		<span class="product-description category-text" >
			$item->name<br>
			&dollar;$item->price
		</span>
	</a>
	</div>
</div>
HTML;
}

$results = getQueryResults(
	isset($_GET['id'])?
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
<h2>Suggested Items</h2>
<div class='grid'><div class='row gutters'>";
echo array_reduce($results,'productListTemplate');
echo "</div></div>";