$(document).ready(function(){

	var currentPage = 1;
	var currentCategory = null;
	var isSearchActive = false;
	var searchKeyword = "";



	$("#women, #men, #kids, #home-decor, #books-music-games, #toys-hobbies, #electronics, #handmade, #tickets, #automotive, #others").on("click", function(e){
		e.preventDefault();
		var categoryMap = {
			
	 'women' : 1,
	 'men' : 2,
	 'kids' : 3,
	 'home' : 4,
	 'books' : 5,
	 'toys' : 1328,
	 'beauty' : 6,
	 'electronics' : 7,
	 'sports' : 8,
	 'handmade' : 9,
	 'tickets' : 1027,
	 'automotive' : 1318,
	 'others' : 10

		};
		currentCategory = categoryMap[$(this).attr('id')];
		updateCategory(currentCategory);
	});




	cat();
    cathome();
	brand();
	product();
    
    producthome();
    
	
	
    
	//cat() is a funtion fetching category record from database whenever page is load
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#").html(data);
				
			}
		})
	}
    function cathome(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{categoryhome:1},
			success	:	function(data){
				$("#get_category_home").html(data);
				
			}
		})
	}
	//brand() is a funtion fetching brand record from database whenever page is load
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	//product() is a funtion fetching product record from database whenever page is load
		function product(){
			$("#get_product").html("<h3>Loading...</h3>");
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			},
			complete: function () {
				// 隐藏加载效果
				$("#loading").hide();
			  },
		})
	}
    gethomeproduts();
    function gethomeproduts(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{gethomeProduct:1},
			success	:	function(data){
				$("#get_home_product").html(data);
			}
		})
	}
    function producthome(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{getProducthome:1},
			success	:	function(data){
				$("#get_product_home").html(data);
			}
		})
	}
   
    
	

	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					// $("body").scrollTop(683);
				}
			}
		})
	
	})
    $("body").delegate(".categoryhome","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"homeaction.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})



	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	/*
		At the top of page there is a search box with search button when user put name of product then we will take the user 
		
	*/
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Loading...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			isSearchActive = true;
			searchKeyword = keyword;
			currentPage = 1;
			updateSearchResult(searchKeyword);
		}
	});

	function updateSearchResult(keyword){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {search:1, keyword:keyword, page:currentPage},
			success: function(data){
				$("#get_product").html(data);
				console.log("keyword"+keyword, "page"+currentPage);

			}
		})
	}

	
	//end


	$("#login").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "login_success"){
					window.location.href = "index.php";
				}else if(data == "cart_login"){
					window.location.href = "cart.php";
				}else{
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//end

	//Get User Information before checkout
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	
	
    $("#offer_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "offersmail.php",
			method : "POST",
			data : $("#offer_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				$("#offer_msg").html(data);
				
			}
		})
	})
    
    
    
	//Get User Information before checkout end here

	//Add Product into Cart
	
		// 确保在文档加载完成后执行
		$("body").on("click", ".add-to-cart-btn", function(event) {
			event.preventDefault(); // 阻止默认操作
			var pid = $(this).attr("pid"); // 获取产品ID
			var addTOCartName = $(this).attr("Name");
			var addTOCartPrice = $(this).attr("Price");
			var addTOCartPhoto = $(this).attr("Photo");
			console.log("Product ID:", pid); // 检查 pid 的值
			console.log("Product Name:", addTOCartName);
			console.log("Product ID:", addTOCartPrice);
			console.log("Product Photo", addTOCartPhoto);
			$(".overlay").show(); // 显示加载动画或遮罩层
	
			// 发送 Ajax 请求
			$.ajax({
				url : "action.php",
				method : "POST",
				data : { addToCart: 1, proId: pid, proName: addTOCartName, proPrice: addTOCartPrice, proPhoto: addTOCartPhoto},
				success : function(data) {
					count_item(); // 更新购物车中商品数量
					getCartItem(); // 获取购物车中的商品列表
					$('#product_msg').html(data); // 显示返回的消息
					$('.overlay').hide(); // 隐藏加载动画或遮罩层
				}
			});
		});
	//Add Product into Cart End Here
	//Count user cart items funtion
	count_item();
	function count_item() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { count_item: 1 },
			success: function(data) {
				$(".badge.qty").html(data); // 更新购物车数量显示
			}
		});
	}
	//Count user cart items funtion end

	
	
	//Fetch Cart item from Database to dropdown menu
	getCartItem();
	function getCartItem() {
    $.ajax({
        url: "action.php",
        method: "POST",
        data: { Common: 1, getCartItem: 1 },
        success: function(data) {
            $("#cart_product").html(data); // 显示购物车商品列表
            net_total(); // 更新总价
        }
    });
}

$("body").on("click", ".remove-from-cart-btn", function(event) {
	event.preventDefault();
	var productId = $(this).data("proid"); // 获取商品ID

	$.ajax({
		url: "action.php",
		method: "POST",
		data: { removeItemFromCart: 1, proId: productId },
		success: function(response) {
			alert(response); // 显示操作结果
			location.reload(); // 刷新页面以更新购物车
		}
	});
});
	
	//Fetch Cart item from Database to dropdown menu

	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);

	})
	//Change Quantity end here 

    
	   
    $("body").delegate(".remove","click",function(event){
        var remove = $(this).parent().parent().parent();
        var remove_id = remove.find(".remove").attr("remove_id");
        $.ajax({
            url	:	"action.php",
            method	:	"POST",
            data	:	{removeItemFromCart:1,rid:remove_id},
            success	:	function(data){
                $("#cart_msg").html(data);
                checkOutDetails();
                }
            })
    })
    
    
	
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})
	checkOutDetails();
	net_total();
	
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}
	/*
		net_total function is used to calcuate total amount of cart item
	*/
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);
	}

	

	$("#prevPage, #nextPage").on("click", function(e){
		e.preventDefault();
		$("#get_product").html("<h3 style='display: flex; justify-content: center; align-items: center; height: 100px; width: 100%; margin: 0;'>Loading...</h3>");

		if($(this).attr('id') === "prevPage" && currentPage > 1){
			currentPage--;
		} else if ($(this).attr('id') === "nextPage"){
			currentPage++;
		}

		if(isSearchActive){
			updateSearchResult(searchKeyword);

		} else if(currentCategory != null) {
			
			updateCategory(currentCategory);
		} else {
			product();
		}
	});


	//These are category

	function updateCategory(category = currentCategory){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {getProduct:1, page:currentPage, category:category},
			success: function(data){
				$("#get_product").html(data);
				console.log("currentPage:"+currentPage, "category"+category);

			}
		})

	}

	
	
})