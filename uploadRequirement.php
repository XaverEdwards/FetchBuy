
<link rel="stylesheet" type="text/css" href="css/upload.css">
    <?php
    include 'header.php';
    
    echo "
    <form name='sentMessage' action='uploadRequirement.php' method='post' enctype='multipart/form-data'>
  <script class='jsbin' src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
<div class='file-upload'>
  <button class='file-upload-btn' type='button' onclick='$('.file-upload-input').trigger( 'click' )'>上傳圖片</button>

  <div class='image-upload-wrap'>
    <input class='file-upload-input' type='file' name='upfile' id='file-input' onchange='readURL(this);' accept='image/jpeg, image/heic, image/jpg, image/png' />
    <div class='drag-text'>
      <h3>拖拽圖片到此</h3>
    </div>
  </div>
  <div class='file-upload-content'>
    <img class='file-upload-image' id='blobImage' src='#' alt='your image' />
   
    <div class='image-title-wrap'>
      <button type='button' onclick='removeUpload()' class='remove-image'>移除 <span class='image-title'>上傳圖片</span></button>
    </div>
  </div>
</div>
        <div class='container-fluid py-5'>
        <div class='container py-5'>
            <div class='row justify-content-center'>
                <div class='col-lg-6'>
                    <h1 class='section-title position-relative text-center mb-5'>請輸入您的信息和商品描述</h1>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-lg-9'>
                    <div class='contact-form bg-light rounded p-5'>
                        <div id='success'></div>

                            <div class='form-row'>
                                <div class='col-sm-6 control-group'>
                                    <input type='text' class='form-control p-4' name='name' placeholder='請輸入您的名字' required='required' data-validation-required-message='請輸入您的名字' />
                                    <p class='help-block text-danger'></p>
                                    <input type='number' class='form-control p-4' name='price' placeholder='希望價格' required='required'/>
                                </div>
                                <div class='col-sm-6 control-group'>
                                    <input type='email' class='form-control p-4' name='email' placeholder='請輸入您的郵箱' required='required' data-validation-required-message='請輸入您的郵箱' />
                                    <p class='help-block text-danger'></p>
                                </div>
                            </div>
                    
                            <div class='control-group'>
                                <input type='text' class='form-control p-4' name='subject' placeholder='請輸入您想購買的商品的名字' required='required' data-validation-required-message='請輸入您想購買的商品的名字' />
                                <p class='help-block text-danger'></p>
                            </div>
                            <div class='control-group'>
                                <textarea class='form-control p-4' rows='6' name='message' placeholder='請輸入詳細描述：如產地，型號，如果可以您也可以附上商店的連結' required='required' data-validation-required-message='請輸入詳細描述：如產地，型號，如果可以您也可以附上商店的連結'></textarea>
                                <p class='help-block text-danger'></p>
                            </div>

                            <div class='control-group'>
                                <input type='adderss' class='form-control p-4' name='shippingAddress' placeholder='請輸入您的配送地址' required='required' data-validation-required-message='請輸入您的配送地址' />
                                <p class='help-block text-danger'></p>
                            </div>
                            
                            
                            
                              

                            <div>
                                <button class='btn btn-primary btn-block py-3 px-5' type='submit' id='sendMessageButton' name='submit'>提交</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

   


    </div>
 
    </form>";
   

    
    include 'footer.php';
    ?>