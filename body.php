<!-- <del class='product-old-price'>$990.00</del> -->
<!-- 这个是旧价格的类 -->
<style>
	/* form {
  width: 50vw;
  min-width: 500px;
  align-self: center;
  box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
    0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
  border-radius: 7px;
  padding: 40px;
} */

/* .hidden {
  display: none;
} */

#payment-message {
  color: rgb(105, 115, 134);
  font-size: 16px;
  line-height: 20px;
  padding-top: 12px;
  text-align: center;
}

#payment-element {
  margin-bottom: 24px;
}

/* Buttons and links */
#submitCheck {
  background: #5469d4;
  font-family: Arial, sans-serif;
  color: #ffffff;
  border-radius: 4px;
  border: 0;
  padding: 12px 16px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  display: block;
  transition: all 0.2s ease;
  box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
  width: 100%;
}
#submitCheck:hover {
  filter: contrast(115%);
}
#submitCheck:disabled {
  opacity: 0.5;
  cursor: default;
}

/* spinner/processing state, errors */
.spinner,
.spinner:before,
.spinner:after {
  border-radius: 50%;
}
.spinner {
  color: #ffffff;
  font-size: 22px;
  text-indent: -99999px;
  margin: 0px auto;
  position: relative;
  width: 20px;
  height: 20px;
  box-shadow: inset 0 0 0 2px;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
.spinner:before,
.spinner:after {
  position: absolute;
  content: "";
}
.spinner:before {
  width: 10.4px;
  height: 20.4px;
  background: #5469d4;
  border-radius: 20.4px 0 0 20.4px;
  top: -0.2px;
  left: -0.2px;
  -webkit-transform-origin: 10.4px 10.2px;
  transform-origin: 10.4px 10.2px;
  -webkit-animation: loading 2s infinite ease 1.5s;
  animation: loading 2s infinite ease 1.5s;
}
.spinner:after {
  width: 10.4px;
  height: 10.2px;
  background: #5469d4;
  border-radius: 0 10.2px 10.2px 0;
  top: -0.1px;
  left: 10.2px;
  -webkit-transform-origin: 0px 10.2px;
  transform-origin: 0px 10.2px;
  -webkit-animation: loading 2s infinite ease;
  animation: loading 2s infinite ease;
}


/* .row-equal-height {
    display: flex;
    flex-wrap: wrap;
}

.col-equal-height {
    flex: 1;
    margin: 5px;
	display: flex;
    flex-direction: column;
} */



@-webkit-keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@media only screen and (max-width: 600px) {
  form {
    width: 80vw;
    min-width: initial;
  }
}
	</style>

   <div class="main main-raised" style="margin-top: 30px;">
        <div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   

    <!-- Wrapper for slides -->
    <!-- <div class="carousel-inner">

      <div class="item active">
        <img src="img/banner3.jpg" alt="Los Angeles" style="width:100%;">
        
      </div>

      <div class="item">
        <img src="img/banner2.jpg" style="width:100%;">
        
      </div>
    
      <div class="item">
        <img src="img/banner4.jpg" alt="New York" style="width:100%;">
        
      </div>
      <div class="item">
        <img src="img/banner1.jpg" alt="New York" style="width:100%;">
        
      </div>
      <div class="item">
        <img src="img/banner3.jpg" alt="New York" style="width:100%;">
        
      </div>
  
    </div> -->

    <!-- Left and right controls -->
    <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only" >Previous</span>
    </a>
    <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
     


		<!-- SECTION -->
		<div class="section mainn mainn-raised">
		
		
			<!-- container -->
			<div class="container">
			
				<!-- row -->
				<div class="row row-equal-height">
					<!-- shop -->
					<div class="col-md-4 col-xs-6 col-equal-height">
						<!-- product.php?p=78 -->
						<a href="#"><div class="shop">
							<div class="shop-img">
								<img src="./img/mer.png" alt="" >
							</div>
							<div class="shop-body">
								<h3>Mercari<br>日淘入口</h3>
								<a href="store.php?" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<!-- <div class="col-md-4 col-xs-6 col-equal-height">
						<a href="uploadRequirement.php"><div class="shop">
							<div class="shop-img">
								<img src="./img/find.png"  alt="" >
							</div>
							<div class="shop-body">
								<h3>尋找代購報價<br></h3>
								<a href="uploadRequirement.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div> -->
					<!-- /shop -->

					<!-- shop -->
					<!-- <div class="col-md-4 col-xs-6 col-equal-height">
						<a href="product.php?p=79"><div class="shop">
							<div class="shop-img">
								<img src="./img/onlineStore.png" alt="" style="height 200px; width=200px;">
							</div>
							<div class="shop-body">
								<h3>在線<br>商店</h3>
								<a href="store.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
                            </div></a>
					</div> -->
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		  
		

		<!-- SECTION -->
		<!-- <div class="section"> -->
			<!-- container -->
			<!-- <div class="container"> -->
				<!-- row -->
				<!-- <div class="row"> -->

					<!-- section title -->
					<!-- <div class="col-md-12">
						<div class="section-title">
							<h3 class="title">新商品</h3>
							<div class="section-nav"> -->
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul> -->
							<!-- </div>
						</div>
					</div> -->
					<!-- /section title -->

					<!-- Products tab & slick -->
					<!-- <div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs"> -->
								<!-- tab -->
								<!-- <div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1" > -->
									
									<?php
                //     include 'db.php';
								
                    
				// 	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 80 AND 90";
                // $run_query = mysqli_query($con,$product_query);
                // if(mysqli_num_rows($run_query) > 0){

                //     while($row = mysqli_fetch_array($run_query)){
                //         $pro_id    = $row['product_id'];
                //         $pro_cat   = $row['product_cat'];
                //         $pro_brand = $row['product_brand'];
                //         $pro_title = $row['product_title'];
                //         $pro_price = $row['product_price'];
                //         $pro_image = $row['product_image'];

                //         $cat_name = $row["cat_title"];

                      //  echo "
				
                        
                                
								// <div class='product'>
								// 	<a href='product.php?p=$pro_id'><div class='product-img'>
								// 		<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
								// 		<div class='product-label'>
								// 			<span class='sale'>-30%</span>
								// 			<span class='new'>NEW</span>
								// 		</div>
								// 	</div></a>
								// 	<div class='product-body'>
								// 		<p class='product-category'>$cat_name</p>
								// 		<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
								// 		<h4 class='product-price header-cart-item-info'>HK$$pro_price</h4>
											
								// 		<a href='product.php?p=$pro_id'>
								// 			<button id='submitCheck'>
								// 			<div class='spinner hidden' id='spinner'></div>
								// 			<span id='button-text'>詳細</span>
								// 			</button>
								// 			</a>
										
										
								// 	</div>
									
								// </div>
                               
							
								
			//";
			
			
	//	}
      //  ;
      
//}

?>
										<!-- product -->
										
	
										<!-- /product -->
										
										
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<!-- <div id="hot-deal" class="section mainn mainn-raised">
			
			<div class="container">
				
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="store.php">Shop now</a>
						</div>
					</div>
				</div>
				
			</div>
			
		</div> -->
		
		

		<!-- SECTION -->
		<!-- <div class="section"> -->
			<!-- container -->
			<!-- <div class="container"> -->
				<!-- row -->
				<!-- <div class="row"> -->

					<!-- section title -->
					<!-- <div class="col-md-12">
						<div class="section-title">
							<h3 class="title">熱賣</h3>
							<div class="section-nav"> -->
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Formals</a></li>
									<li><a data-toggle="tab" href="#tab2">Shirts</a></li>
									<li><a data-toggle="tab" href="#tab2">T-Shirts</a></li>
									<li><a data-toggle="tab" href="#tab2">Pants</a></li>
								</ul> -->
							<!-- </div>
						</div>
					</div> -->
					<!-- /section title -->

					<!-- Products tab & slick -->
					<!-- <div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs"> -->
								<!-- tab -->
								<!-- <div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2"> -->
										<!-- product -->
										<?php
                //     include 'db.php';
								
                    
				// 	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id IN (87, 91)";
				// 	mysqli_set_charset($con, "utf8mb4");
                // $run_query = mysqli_query($con,$product_query);
                // if(mysqli_num_rows($run_query) > 0){

                //     while($row = mysqli_fetch_array($run_query)){
                //         $pro_id    = $row['product_id'];
                //         $pro_cat   = $row['product_cat'];
                //         $pro_brand = $row['product_brand'];
                //         $pro_title = $row['product_title'];
                //         $pro_price = $row['product_price'];
                //         $pro_image = $row['product_image'];

                //         $cat_name = $row["cat_title"];

                //        echo "
				
                        
                                
								// <div class='product'>
								// 	<a href='product.php?p=$pro_id'><div class='product-img'>
								// 		<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
								// 		<div class='product-label'>
								// 			<span class='sale'>-30%</span>
								// 			<span class='new'>NEW</span>
								// 		</div>
								// 	</div></a>
								// 	<div class='product-body'>
								// 		<p class='product-category'>$cat_name</p>
								// 		<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
								// 		<h4 class='product-price header-cart-item-info'>HK$$pro_price</h4>
								// 		<a href='product.php?p=$pro_id'>
								// 			<button id='submitCheck'>
								// 			<div class='spinner hidden' id='spinner'></div>
								// 			<span id='button-text'>詳細</span>
								// 			</button>
								// 			</a>
										
								// 	</div>
									
								// </div>
                               
							
                        
			//";
	//	}
      //  ;
      
//}
?>
										
										<!-- /product -->
									<!-- </div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div> -->
								<!-- /tab -->
							<!-- </div>
						</div> -->
					<!-- </div> -->
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		<!-- <div class="section">
		
			<div class="container">
				
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>
						

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div id="get_product_home">
								
							</div>

							<div id="get_product_home2">
								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

							
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								
							</div>

							<div>
								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs">
					    
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								
							</div>

							<div>
								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								

								
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								
							</div>
						</div>
					</div> -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
</div>
		