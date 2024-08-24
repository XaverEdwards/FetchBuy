<?php
include 'header.php';
?>
     <script id="jsbin-javascript">
     
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

.category-bar {
  background: #f8f8f8; /* 浅灰色背景 */
  text-align: center;
  padding: 10px 0;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.category-bar a {
  display: inline-block;
  background-color: #ffffff; /* 每个分类的背景色 */
  color: #333; /* 文字颜色 */
  padding: 8px 15px; /* 内边距 */
  margin: 5px; /* 外边距 */
  text-decoration: none;
  font-size: 14px;
  border: 1px solid #ddd; /* 边框 */
  border-radius: 15px; /* 圆角 */
  box-shadow: 0 2px 3px rgba(0,0,0,0.1); /* 阴影效果 */
  transition: all 0.3s ease; /* 过渡动画 */
}

.category-bar a:hover, .category-bar a:focus {
  background-color: #5469d4; /* 悬停时的背景颜色 */
  color: #ffffff; /* 悬停时的文字颜色 */
  border-color: #5469d4; /* 悬停时的边框颜色 */
  box-shadow: 0 0 8px rgba(84,105,212,0.5); /* 悬停时的阴影 */
}

/* 针对移动设备的响应式设计 */
@media (max-width: 768px) {
  .category-bar a {
    padding: 8px 12px; /* 移动设备上的内边距 */
    font-size: 12px; /* 移动设备上的字体大小 */
  }
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

  


      <div class="main main-raised"> 
        
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
          
					
						
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
          <!-- <div id="loading" style="display: none;">

  Loading...
</div> -->

<div class="category-bar">
  <a href="#women" id="women">女士</a>
  <a href="#men" id="men">男士</a>
  <a href="#kids" id="kids">兒童</a>
  <a href="#home-decor" id="home-decor">室內 小物件</a>
  <a href="#books-music-games" id="books-music-games">書 音樂 遊戲</a>
  <a href="#toys-hobbies" id="toys-hobbies">玩具 愛好 物品</a>
  <a href="#beauty" id="beauty">化妝品 香水 美容</a>
  <a href="#electronics" id="electronics">家電 手提電話 相機</a>
  <a href="#sports-leisure" id="sports-leisure">運動 休閒</a>
  <a href="#handmade" id="handmade">手工製品</a>
  <a href="#tickets" id="tickets">票</a>
  <a href="#automotive" id="automotive">汽車 摩托車</a>
  <a href="#others" id="others">其他</a>
</div>
						<!-- store top filter -->
						<!-- <div class="store-filter clearfix">
							<div class="store-sort"> -->
              
								<!-- <label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label> -->

								<!-- <label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label> -->
							<!-- </div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div> -->
						<!-- /store top filter -->
            

						<!-- store products -->
						<div class="row" id="product-row">
						<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
							<!-- product -->
             
							<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
							
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<!-- <span class="store-qty">Showing 20-100 products</span> -->
							<ul class="store-pagination" id="pageno">
								<!-- <li ><a class="active" href="#aside"></a></li> -->
								<li><a href="#store" id="prevPage"><i class="fa fa-angle-left"></i></a></li>
								<li><a href="#store" id="nextPage"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
</div>
<?php
include "newslettter.php";
include "footer.php";
?>