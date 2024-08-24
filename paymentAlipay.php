
<?php
session_start();
// $_SESSION['Amount'] = 55555;
?>


<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
 
  
  <form id="payment-form">
    <!-- 你的支付表单字段 -->
    <button type="submit">pay_product</button>
  </form>
  <div id="error-message"></div>
  <script>
    const stripe = Stripe('this is key ');

    const form = document.getElementById('payment-form');
   
    

    form.addEventListener('submit', async function(event) {
      event.preventDefault();
      const myLink = "https://fetchbuy.com.hk/";
      // 获取客户端秘密并调用 stripe.confirmAlipayPayment 处理支付
      const clientSecret = await getClientSecretFromServer(); // 从服务器端获取客户端秘密的函数
      

      const { error } = await stripe.confirmAlipayPayment(clientSecret, {
        return_url: myLink,

      

      });

      if (error) {
        const errorElement = document.getElementById('error-message');
        errorElement.textContent = error.message;
      }
    });

    // 从服务器端获取客户端秘密的函数，你需要实现它
    async function getClientSecretFromServer() {
      const response = await fetch('paymentAlipaySecrets.php'); // 替换为你的服务器端获取客户端秘密的URL
      const data = await response.json();
      return data.client_secret;
    }
  </script>
</body>
</html>


