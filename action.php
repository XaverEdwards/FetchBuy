<?php
session_start();

require 'vendor/autoload.php';
include '/var/www/html/api.php';
include 'var/www/html/db.php';

$imageFolder = 'product_images/';

$headers = array(
    'Accept' => 'application/json',
    'Authorization' => $access_token,
    'User-Agent' => 'foo/1.0.9',
    'User-Country-Code' => 'CN',
);

$client = new \GuzzleHttp\Client();
$ip_add = getenv("REMOTE_ADDR");

if (isset($_POST["getProduct"])) {
    $category = $_POST["category"];
    $limit = 12;

    $queryParameters = array(
        'keyword' => $keyword,
        'category_id' => $category,
        'status' => 'on_sale',
        'page' => $page,
        'limit' => 12,
    );

    try {
        $response = $client->request('GET', 'https://api.jp-mercari.com/v3/items/search', array(
            'headers' => $headers,
            'query' => $queryParameters,
        ));

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        if ($statusCode == 200) {
            $data = json_decode($body, true);
            if (isset($data['data']) && is_array($data['data'])) {
                foreach ($data['data'] as $item) {
                    echo '<div class="col-md-4 col-xs-6">';
                    echo '<div class="product">';
                    echo '<div class="product-img">';

                    if (isset($item['photos']) && is_array($item['photos']) && count($item['photos']) > 0) {
                        $remoteWebpUrl = $item['photos'][0];
                        if ($remoteWebpUrl !== false) {
                            echo '<img src="' . $remoteWebpUrl . '" alt="Image">';
                        } else {
                            echo "无法获取图像数据: " . error_get_last()['message'];
                        }

                        $ProductId = $item['id'];
                        $photosJson = json_encode($item['photos']);
                    }

                    echo '</div>';
                    echo '<div class="product-body">';
                    echo '<p class="product-category">' . htmlspecialchars($item['item_category']['name']) . '</p>';
                    echo '<h3 class="product-name">' . htmlspecialchars($item['name']) . '</h3>';
                    echo '<h4 class="product-price">' . htmlspecialchars($item['price']) . '日圓</h4>';
                    echo '<p>約' . number_format($item["price"] * 0.056, 2) . '港元</p>';
                    echo '<a href="product.php?id=' . urlencode($item['id']) . '&name=' . urlencode($item['name']) . '&description=' . urlencode($item['description']) . '&status=' . urlencode($item['status']) . '&price=' . $item['price'] . '&condition=' . urlencode($item['item_condition']['name']) . '&seller=' . urlencode($item['seller']['name']) . '&shipping_payer=' . urlencode($item['shipping_payer']['name']) . '&shipping_duration=' . urlencode($item['shipping_duration']['name']) . '&photos=' . urlencode($photosJson) . '">';
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
            echo "HTTP请求失败，状态码：$statusCode";
        }
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        echo "发生异常：" . $e->getMessage();
    }
}

if (isset($_POST["search"])) {
    $keyword = $_POST["keyword"];
    $pageNum = $_POST["page"];
    $limit = 12;

    $queryParameters = array(
        'keyword' => $keyword,
        'status' => 'on_sale',
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

        if ($statusCode == 200) {
            $data = json_decode($body, true);
            if (isset($data['data']) && is_array($data['data'])) {
                foreach ($data['data'] as $item) {
                    echo '<div class="col-md-4 col-xs-6">';
                    echo '<a href="product.php?p=' . $item['id'] . '"><div class="product">';
                    echo '<div class="product-img">';

                    if (isset($item['photos']) && is_array($item['photos']) && count($item['photos']) > 0) {
                        $remoteWebpUrl = $item['photos'][0];

                        $referer = 'https://fetchbuy.com.hk';
                        $ch = curl_init($remoteWebpUrl);
                        curl_setopt($ch, CURLOPT_REFERER, $referer);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $imageData = curl_exec($ch);

                        if ($imageData !== false) {
                            $localFilePath = 'product_images/' . str_replace('?', '_', basename($remoteWebpUrl)) . '.jpg';
                            file_put_contents($localFilePath, $imageData);
                            echo '<img src="' . $localFilePath . '" alt="Product Image">';
                        } else {
                            echo '无法下载图片。';
                        }

                        curl_close($ch);

                        $photosJson = json_encode($item['photos']);
                    }

                    echo '</div>';
                    echo '<div class="product-body">';
                    echo '<p class="product-category">' . htmlspecialchars($item['item_category']['name']) . '</p>';
                    echo '<h3 class="product-name">' . htmlspecialchars($item['name']) . '</h3>';
                    echo '<h4 class="product-price">' . htmlspecialchars($item['price']) . '日圓</h4>';
                    echo '<p>約' . number_format($item["price"] * 0.056, 2) . '港元</p>';
                    echo '<a href="product.php?id=' . urlencode($item['id']) . '&name=' . urlencode($item['name']) . '&description=' . urlencode($item['description']) . '&status=' . urlencode($item['status']) . '&price=' . $item['price'] . '&condition=' . urlencode($item['item_condition']['name']) . '&seller=' . urlencode($item['seller']['name']) . '&shipping_payer=' . urlencode($item['shipping_payer']['name']) . '&shipping_duration=' . urlencode($item['shipping_duration']['name']) . '&photos=' . urlencode($photosJson) . '">';
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
            echo "HTTP请求失败，状态码：$statusCode";
        }
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        echo "发生异常：" . $e->getMessage();
    }
}

// 添加商品到购物车
if (isset($_POST["addToCart"])) {
    $p_id = $_POST["proId"];
    $p_Name = $_POST["proName"];
    $p_Price = $_POST["proPrice"];
    $p_Photo = $_POST["proPhoto"];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$p_id])) {
        $_SESSION['cart'][$p_id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$p_id] = [
            'quantity' => 1,
            'name' => $p_Name,
            'price' => $p_Price,
            'photo' => $p_Photo,
        ];
    }
    echo "Product added to cart.";
    exit();
}

// 计算购物车中的商品数量
if (isset($_POST["count_item"])) {
    $total_items = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $total_items += $product['quantity'];
        }
    }

    echo $total_items;
    exit();
}

// 获取购物车中的商品
function getCartItem() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total_price = 0;
        $item_count = 0;

        foreach ($_SESSION['cart'] as $product_id => $item) {
            $name = htmlspecialchars($item['name']);
            $price = htmlspecialchars($item['price']);
            $quantity = htmlspecialchars($item['quantity']);
            $image = htmlspecialchars($item['photo']);

            $subtotal = $price * $quantity;
            $total_price += $subtotal;
            $item_count += $quantity;
			echo "ID:".$product_id;
            echo '<div class="product-widget">';
            echo '    <div class="product-img">';
            echo '        <img src="' . $image . '" alt="' . $name . '">';
            echo '    </div>';
            echo '    <div class="product-body">';
            echo '        <h3 class="product-name">' . $name . '</h3>';
            echo '        <h4 class="product-price">' . $quantity . ' x ' . $price . ' = ' . $subtotal . '</h4>';
            echo '    </div>';
            echo '<button class="remove-from-cart-btn" data-proid="' . $product_id . '">移除</button>';
            echo '</div>';
        }

        // 更新会话中的支付金额和产品名称
        $_SESSION['productName'] = "有 " . $item_count . " 個商品";
        $_SESSION['Amount'] = round($total_price * 0.056 * 100);
		$_SESSION['ID'] = $product_id;

        // 显示结账部分
        echo '<div class="cart-summary">';
        echo '    <small class="qty">' . $item_count . ' Item(s) selected</small>';
        echo '    <h5>總計: JPY' . $total_price . '</h5>';
        echo '    <h5>HKD ' . number_format($total_price * 0.056, 2) . '</h5>';
        echo '    <form id="payment-form" action="/checkout.php" method="POST">';
        echo '        <div id="payment-element"></div>';
        echo '        <button id="submitPay" type="submit">直接購買</button>';
        echo '    </form>';
        echo '</div>';
    } else {
        echo '<p>Your cart is empty.</p>';
    }
}

// 响应Common请求，获取购物车内容
if (isset($_POST["Common"])) {
    getCartItem();
    exit();
}

// 移除购物车中的商品
if (isset($_POST["removeItemFromCart"])) {
    $p_id = $_POST["proId"];

    if (isset($_SESSION['cart'][$p_id])) {
        unset($_SESSION['cart'][$p_id]);
        echo "Product removed from cart.";
    } else {
        echo "Product not found in cart.";
    }
    exit();
}
?>


		
		
		
	

