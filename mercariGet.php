<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .product-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .product-container h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .product-container p {
            font-size: 16px;
            color: #666;
        }

        .product-images {
            margin-top: 20px;
        }

        .product-images img {
            max-width: 100%;
            height: auto;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>

<?php

require 'vendor/autoload.php';

$headers = array(
    'Accept' => 'application/json',
    'Authorization' => 'lh9uD7fr4d7rO0Oz1QACdLhNaafgN6IMoSbBHehXvSyr-nRkB2dOT5BATQltMQ8bPO8KAKHnAsKapMyr9eOpfA.iJE_8E4I3vxkmgvejiUEyOJy04Nb_MBZ5MJ0gKExtHE',
    'User-Agent' => 'foo/1.0.9', // 设置用户代理
);

$client = new \GuzzleHttp\Client();

$queryParameters = array(
    // 设置查询参数，根据需要选择添加或修改的参数
     'keyword' => '',
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
    // 'status' => 'on_sale,trading,sold_out',
    // 'include_shop_item' => true,
    // 'sort' => 'created_time',
    // 'order' => 'desc',
    // 'page' => 1,
     'limit' => 60,
);

try {
    $response = $client->request('GET', 'https://api.jp-mercari.com/v3/items/search', array(
        'headers' => $headers,
        'query' => $queryParameters,
    ));

    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();
    echo $body;

    if ($statusCode == 200) {
        // 处理成功响应
        $data = json_decode($body, true);
        if (isset($data['data']) && is_array($data['data'])) {
            foreach ($data['data'] as $item) {
                echo '<div class="product">';
                echo '<h2>' . $item['name'] . '</h2>';
                echo '<p>' . $item['description'] . '</p>';
                echo '<p>Status: ' . $item['status'] . '</p>';
                echo '<p>Price: $' . $item['price'] . '</p>';
                echo '<p>Condition: ' . $item['item_condition']['name'] . '</p>';
                echo '<p>Seller: ' . $item['seller']['name'] . '</p>';
                echo '<p>shipping_payer: ' . $item['shipping_payer']['name'] . '</p>';
                echo '<p>shipping_duration: ' . $item['shipping_duration']['name'] . '</p>';
                
                if (isset($item['photos']) && is_array($item['photos'])) {
                    echo '<div class="product-images">';
                    foreach ($item['photos'] as $photo) {
                        echo '<img src="' . $photo . '" alt="Product Image">';
                    }
                    echo '</div>';
                }
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
?>

  