const templater = (tf) => (oa) =>
	(Array.isArray(oa)?oa:[oa])
	.reduce((r,o,i,a)=>r+tf(o,i,a),'');

const makeProductList = templater(o=>`
<div class="imgtext detail-group col-sm-6 col-md-4 col-lg-3">
	<div class="detail-img">
	<a href="product-item.php?id=${o.id}">
	<img src=${o.image} id="img"></div>
	<div class="product-name">${o.name}</div><br>
	<div class="product-price">&dollar;${o.price.toFixed(2)}</div>
 
</div>

</a>
`);


const makeCartList = templater(o=>`
<tr class="id_tr">
	<td class="button-style1">
		<button class="form-button cart-remitem button-style" data-id="${o.id}">&times;</button>
	</td>
	<td>
		<img src="${o.thumbnail}" alt="" class="cart-image media-image product-img-child">
	</td>
	<td class="product-detail-text">
		${o.name}
	</td>
	<td style="text-align:right">
		&dollar;<span class="item-price">${o.price.toFixed(2)}</span>
	</td>
	<td class="td_center">
		<input type="number" min="0" value="${o.amount}" class="item-amount form-input">
	</td>
	<td style="text-align:right">
		&dollar;<span class="item-total">${o.total.toFixed(2)}</span>
	</td> 
</tr>

`);

const search = (str,w,callback) => {
	$.getJSON(`data/data-feed.php?where=${w}&like=`+str)
	.done(callback)
}



const getCart = () => {
	return sessionStorage.cart===undefined?[]:
		JSON.parse(sessionStorage.cart);
}
const setCart = (cart) => {
	sessionStorage.cart = JSON.stringify(cart);
}


const getTotals = () => {
	let total = 0;
	$(".item-total").each((i,o)=>{
		total += +$(o).html();
	})
	$(".price-total-total").html(`&dollar;${total.toFixed(2)}`);
}

const makeCart = () => {
	let cart = getCart();
	if(!cart.length) {
		$(".cart-result").html("<td colspan='6'>No cart items yet</td>")
		return;
	}

	let items = cart.map(o=>o.id);
	$.getJSON(
		'data/data-feed.php?where=id&in='+
		items.join(",")
	)
	.done(d=>{
		let cart = getCart();
		let results = d.result.map((o,i,a)=>{
			o.amount = cart.find(co=>co.id==o.id).amount;
			o.total = o.amount * o.price;
		})
		$(".cart-result").html(makeCartList(d.result))
		getTotals();
	})
}



$(()=>{

	if($(".product-result").length) {
		$.getJSON('data/data-feed.php')
		.done(d=>{
			$(".product-result").html(makeProductList(d.result))
		})
	}
	if($(".cart-result").length) {
		makeCart();
	}

	$("#searchform").on('submit',e=>{
		e.preventDefault();
		console.log($("#topsearch").val())
		search(
			$("#topsearch").val(),
			'name,description,category',
			d=>{
				$(".product-result").html(makeProductList(d.result))
			}
		)
	})

	$("[data-filter]").on('click',e=>{
		e.preventDefault();
		search(
			$(e.target).data("value"),
			$(e.target).data("filter"),
			d=>{
				$(".product-result").html(makeProductList(d.result))
			}
		)
	})

	$("[data-orderby]").on('click',e=>{
		e.preventDefault();
		search(
			$("#topsearch").val()+
			"&orderby="+
			$(e.target).data("orderby")+
			"&direction="+
			$(e.target).data("direction"),
			'name,description,category',
			d=>{
				$(".product-result").html(makeProductList(d.result))
			}
		)
	})

	$(".image-thumbs img").on("mouseenter",e=>{
		$(".image-main img").attr({
			src:e.target.src
		})
	})


	$(".add-to-cart").on("click",e=>{
		let cart = getCart();
		console.log(cart);

		let item = cart.find(o=>o.id==$(e.target).data("id"));

		if(item) item.amount++;
		else cart.push({id:$(e.target).data("id"),amount:1});

		setCart(cart);
	});

	$(document)
	.on("input",".item-amount",e=>{
		let td = $(e.target).parent();
		let it = td.next().find(".item-total");
		let ia = e.target;
		let ip = td.prev().find(".item-price");

		it.html((ip.html() * ia.value).toFixed(2));

		getTotals();
	})
	.on("click",".cart-remitem",e=>{
		setCart(getCart().filter(
			o=>o.id!=$(e.target).data("id")));
		makeCart();
	})

})