<?php
include "header.php";
?>
		<!-- /BREADCRUMB -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<style>
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
</style>
		<script>
    
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>



<style>
.hidden {
  display: none;
}

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
#submitPay {
	-webkit-font-smoothing: antialiased;
  background: #c94b53;
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
button:hover {
  filter: contrast(115%);
}
button:disabled {
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
	


		<!-- SECTION -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<!-- <script src="https://js.stripe.com/v3/"></script> -->
					<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

					
					
					<?php
								session_start();
								include 'db.php';
								$id = $_POST['id'];
								$name = $_GET['name'];
								$description = $_GET['description'];
								$decodeDescription = nl2br($description);
								$status = $_GET['status'];
								$price = $_GET['price'];
								$condition = $_GET['condition'];
								$seller = $_GET['seller'];
								$shipping_payer = $_GET['shipping_payer'];
								$shipping_duration = $_GET['shipping_duration'];
								$firstPhoto = $_GET["photos"];
								$price = floatval($price); // 确保 $price 是浮点数
								$hkD = round($price * 0.056, 2); // 直接计算并四舍五入
								$_SESSION['payment_amount'] = $hkD; // 存储浮点数
								
								
								?>

								<div class="col-md-5 col-md-push-2">
    <div id="product-main-img">
        <?php
        if (isset($_GET['photos'])) {
            $photosJson = urldecode($_GET['photos']);
            $photos = json_decode($photosJson, true);
			
            // 检查是否成功解码
            if (is_array($photos)) {
                // 遍历数组以显示多个图片
                foreach ($photos as $imageUrl) {
					// $imageData = file_get_contents($imageUrl);
				
					if ($imageUrl !== false) {
						
						echo '<img src="' . $imageUrl . '" alt="Image">';
					} else {
						echo "无法获取图像数据". error_get_last()['message'];
					}
				}
            } else {
                echo '无效的图片数据。';
            }
        } else {
            echo '没有提供图片数据。';
        }
        ?>
    </div>
</div>

<div class="col-md-2 col-md-pull-5">
    <div id="product-imgs">
        <?php
        if (isset($_GET['photos'])) {
            $photosJson = urldecode($_GET['photos']);
            $photos = json_decode($photosJson, true);

            // 检查是否成功解码
            if (is_array($photos)) {
                // 遍历数组以显示多个图片
                foreach ($photos as $imageUrl) {
					// $imageData = file_get_contents($imageUrl);
				
					if ($imageUrl !== false) {
						
						echo '<img src="' . $imageUrl . '" alt="Image">';
					} else {
						echo "无法获取图像数据". error_get_last()['message'];
					}
				}
            } else {
                echo '无效的图片数据。';
            }
        } else {
            echo '没有提供图片数据。';
        }
        ?>
    </div>
</div>



                          
									
									<!-- FlexSlider -->
									
									
									<?php
									session_start();
									$id = $_GET['id'];
									$name = $_GET['name'];
									$price = $_GET['price'];
									$photo = $photos[0];
									$_SESSION['Amount'] = $hkD*100;
									$_SESSION['productName'] = $name;
									$_SESSION['id'] = $id;
						
									  
									echo '
									
                                    
                                   
                    <div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">'.$name.'</h2>
							 
							<div>
								<h3 class="product-price">'.$price.'日圓<p class="product-old-price">約'.$hkD.'港元</p></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>'.$decodeDescription.'</p>

							 
							
<div class="product-options">
    <div class="add-to-cart">
        <!-- 添加购物车按钮 -->
        <button class="add-to-cart-btn" pid="' . htmlspecialchars($id) . '" id="product-' . htmlspecialchars($id) . '" Name="'.htmlspecialchars($name).'" Price="'.htmlspecialchars($price).'" Photo="'.htmlspecialchars($photo).'">
    <i class="fa fa-shopping-cart"></i> 添加購物車
</button>

        <div id="error-message"></div>
    </div>

    <!-- Stripe支付表单 -->
    <script src="https://js.stripe.com/v3/"></script>
    <form id="payment-form" action="/checkout.php" method="POST">
        <div id="link-authentication-element">
            <!-- Stripe.js will inject the Link Authentication Element here -->
        </div>
        <div id="payment-element">
            <!-- Stripe.js will inject the Payment Element here -->
        </div>
        <!-- 提交支付按钮 -->
        <button id="submitPay" type="submit">
            <div class="spinner hidden" id="spinner"></div>
            <span id="button-text">直接購買</span>
        </button>
        <div id="payment-message" class="hidden"></div>
    </form>
</div>
								
								


							

							

						</div>
					</div>
									
					
					
					
					
					
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<!-- <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li> -->
								<!-- <li><a data-toggle="tab" href="#tab2">Details</a></li> -->
								<!-- <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>.</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3 mainn">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Similar Products</h3>
							<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						</div>
					</div>
                    ';
					if(isset($_POST["search"])){
		
		// $keyword = $_POST["keyword"] ?? null;
		$keyword = $_POST["keyword"];

		$pageNum = $_POST["page"];

		$limit = 12;

		$queryParameters = array(
			// 设置查询参数，根据需要选择添加或修改的参数
			 'keyword' => $keyword,
			// 'exclude_keyword' => 'your_exclude_keyword',
			// 'category_id' => 658,
			// 'brand_id' => 456,
			// 'seller_id' => 789,
			// 'size_id' => 101,
			// 'color_id' => 202,
			// 'price_min' => 50,
			// 'price_max' => 200,
			// 'item_condition_id' => 1,
			// 'shipping_payer_id' => 2,
			 'status' => 'on_sale',
			// 'include_shop_item' => true,
			// 'sort' => 'score',
			// 'order' => 'desc',
			'page' => $pageNum,
			'limit' => 15,

			'include_shop_item' => true,
			 
		);
	
		try {
			$response = $client->request('GET', 'https://api.jp-mercari.com/v3/items/search', array(
				'headers' => $headers,
				'query' => $queryParameters,
			));
		
			$statusCode = $response->getStatusCode();
			$body = $response->getBody()->getContents();
			// echo $body;
	
			if ($statusCode == 200) {
				// 处理成功响应
				$data = json_decode($body, true);
				if (isset($data['data']) && is_array($data['data'])) {
		foreach ($data['data'] as $item) {
			echo '<div class="col-md-4 col-xs-6">';
			echo '<a href="product.php?p=' . $item['id'] . '"><div class="product">';
			echo '<div class="product-img">';
	
			// 检查是否有照片，如果有，则显示第一张照片
			if (isset($item['photos']) && is_array($item['photos']) && count($item['photos']) > 0) {
				$remoteWebpUrl = $item['photos'][0];
				
	
				$referer = 'https://fetchbuy.com.hk'; // 合法的Referer来源
				$ch = curl_init($remoteWebpUrl);
				curl_setopt($ch, CURLOPT_REFERER, $referer);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$imageData = curl_exec($ch);
	
				if ($imageData !== false) {
					$localFilePath = 'product_images/' . str_replace('?','_', basename($remoteWebpUrl)).'.jpg';
					file_put_contents($localFilePath, $imageData);
					echo '<img src="' . $localFilePath . '" alt="Product Image">';
				} else {
					echo '无法下载图片。';
				}
	
				curl_close($ch);
	
	
	
				
				$photos = $item['photos'];
				$photoCount = count($item['photos']);
				$photosJson = json_encode($photos);
	
			}
	
			// echo '<div class="product-label">';
			// echo '<span class="sale">-30%</span>';
			// echo '<span class="new">NEW</span>';
			// echo '</div>';
			echo '</div>';
        echo '<div class="product-body">';
        echo '<p class="product-category" style="max-height:100px;">' . $item['item_category']['name'] . '</p>';
        echo '<h3 class="product-name" style="height: 2.4em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">'.$item['name'].'</h3>';
        echo '<h4 class="product-price header-cart-item-info">'.$item['price'].'日圓<p class="product-old-price">約'.number_format($item["price"]*0.056, 2).'港元</p></h4>';
        echo '<a href="product.php?id='.urlencode($item['id']).'&name='.urlencode($item['name']).'&description='.urlencode($item['description']).'&status='.urlencode($item['status']).'&price='.$item['price'].'&condition='.urlencode($item['item_condition']['name']).'&seller='.urlencode($item['seller']['name']).'&shipping_payer='.urlencode($item['shipping_payer']['name']).'&shipping_duration='.urlencode($item['shipping_duration']['name']).'&photos='.urlencode($photosJson).'">';
        echo '<button id="submitCheck">';
        echo '<div class="spinner hidden" id="spinner"></div>';
        echo '<span id="button-text">詳細</span>';
        echo '</button>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
		}
	} else {
		echo '没有找到匹配的商品。';
	}
	
						
			} else {
	
				// 处理失败响应
				echo "HTTP请求失败，状态码：$statusCode";
	
			}
	
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			// 处理异常或API错误
			echo "发生异常：" . $e->getMessage();
		}
		
       
	}
					

					

				
								?>	


								  


								<?php
                    			
								require 'vendor/autoload.php';
								require '/var/www/html/getSimilarItems.php';
			
                       				
		
      

?>

					<!-- product -->
					
					<!-- /product -->

				</div>
				<!-- /row -->
                
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- NEWSLETTER -->
		
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
<?php
include "newslettter.php";
include "footer.php";

?>
