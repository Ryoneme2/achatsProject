<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../public/css/seller.css">
  <link rel="stylesheet" href="../../public/css/main.css">
  <title>Sign in: Seller</title>
</head>

<body>
  <?php

  session_start();

  if ($_SESSION['isLogin'] && $_SESSION['role'] == 'seller') {

    require_once '../../config/dbcon.php';

    $sqlSellCmd = "SELECT seller_product_qty,seller_follower,seller_rating FROM seller_info WHERE seller_id = " . $_SESSION['seller_id'];

    // echo $sqlCmd;
    $result2 = mysqli_query($con, $sqlSellCmd);
    $rowP = mysqli_fetch_array($result2);

  ?>
    <nav class="navbar navbar-light bg-color-one70 py-1">
      <div class="container-fluid d-flex justify-content-between align-items-center mx-2">
        <div>
          <a class="navbar-brand ms-4 text-decoration-line-through fs-1 text-light" href="#">
            achats<span class="fs-1 text-light text-decoration-none">.</span>
          </a>

        </div>
        <div class="profile-image d-flex align-items-center">
          <div class="add-new-prod d-flex justify-content-center align-items-center me-3">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#6f6f6f">
                    <path d="M86,14.33333c-39.49552,0 -71.66667,32.17115 -71.66667,71.66667c0,39.49552 32.17115,71.66667 71.66667,71.66667c39.49552,0 71.66667,-32.17115 71.66667,-71.66667c0,-39.49552 -32.17115,-71.66667 -71.66667,-71.66667zM86,28.66667c31.74921,0 57.33333,25.58412 57.33333,57.33333c0,31.74921 -25.58412,57.33333 -57.33333,57.33333c-31.74921,0 -57.33333,-25.58412 -57.33333,-57.33333c0,-31.74921 25.58412,-57.33333 57.33333,-57.33333zM78.83333,50.16667v28.66667h-28.66667v14.33333h28.66667v28.66667h14.33333v-28.66667h28.66667v-14.33333h-28.66667v-28.66667z"></path>
                  </g>
                </g>
              </svg>
            </div>
            <a class="text-decoration-none" href="./addProduct.php">
              <p class="text-color-darker m-0">new product</p>
            </a>
          </div>
          <img src="<?php echo $_SESSION['seller_photo'] ?>" alt="">
          <div class="dropdownClick">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                <g id="original-icon" fill="#ffffff">
                  <path d="M78.83333,21.5c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v14.33333c0,3.956 3.21067,7.16667 7.16667,7.16667h14.33333c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-14.33333c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667zM78.83333,71.66667c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v14.33333c0,3.956 3.21067,7.16667 7.16667,7.16667h14.33333c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-14.33333c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667zM78.83333,121.83333c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v14.33333c0,3.956 3.21067,7.16667 7.16667,7.16667h14.33333c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-14.33333c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667z"></path>
                </g>
              </g>
            </svg>
          </div>
        </div>
      </div>
    </nav>

    <div class="dropdown-container me-2 mt-1">
      <ul class="dropdown-ul">
        <div class="d-flex justify-content-start align-items-center mx-3">
          <div><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                <g id="original-icon" fill="#666666">
                  <path d="M86,21.5c-15.74728,0 -28.66667,12.91939 -28.66667,28.66667c0,15.74728 12.91939,28.66667 28.66667,28.66667c15.74727,0 28.66667,-12.91939 28.66667,-28.66667c0,-15.74728 -12.91939,-28.66667 -28.66667,-28.66667zM86,35.83333c8.00097,0 14.33333,6.33237 14.33333,14.33333c0,8.00097 -6.33237,14.33333 -14.33333,14.33333c-8.00097,0 -14.33333,-6.33237 -14.33333,-14.33333c0,-8.00097 6.33237,-14.33333 14.33333,-14.33333zM86,100.33333c-22.5105,0 -64.5,11.0725 -64.5,32.25v17.91667h66.61361c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-50.16667v-3.58333c0,-6.22783 26.574,-17.91667 50.16667,-17.91667c1.591,0 3.2026,0.06764 4.8151,0.16797c2.33633,-4.95217 5.43412,-9.47568 9.18229,-13.38151c-5.074,-0.74533 -9.86223,-1.11979 -13.9974,-1.11979zM129.46191,100.33333c-0.9245,0 -1.69816,0.69236 -1.80566,1.6097l-0.83985,7.25065c-3.46867,1.204 -6.59893,3.03116 -9.32226,5.389l-6.71875,-2.91146c-0.84567,-0.3655 -1.82291,-0.03281 -2.28157,0.76986l-6.71875,11.61784c-0.45867,0.80267 -0.24826,1.82089 0.48991,2.36556l5.78093,4.2832c-0.33683,1.77733 -0.5459,3.59565 -0.5459,5.45899c0,1.86333 0.2019,3.67482 0.5459,5.44499l-5.76693,4.2972c-0.73817,0.55183 -0.95574,1.57006 -0.48991,2.36556l6.70475,11.61784c0.45867,0.80267 1.4499,1.12136 2.29557,0.75586l6.70475,-2.89746c2.71617,2.35067 5.8536,4.185 9.32226,5.389l0.83985,7.25065c0.10033,0.9245 0.88116,1.6097 1.80566,1.6097h13.40951c0.9245,0 1.69816,-0.69236 1.80566,-1.6097l0.83985,-7.25065c3.46867,-1.204 6.59893,-3.03116 9.32226,-5.389l6.71875,2.91146c0.84567,0.3655 1.82291,0.02564 2.28157,-0.76986l6.71875,-11.61784c0.45867,-0.80267 0.24826,-1.82089 -0.48991,-2.36556l-5.78093,-4.2972c0.344,-1.77017 0.5459,-3.58166 0.5459,-5.44499c0,-1.86333 -0.2019,-3.67482 -0.5459,-5.44499l5.76693,-4.2972c0.73817,-0.55183 0.95574,-1.57006 0.48991,-2.36556l-6.70475,-11.61784c-0.45867,-0.80267 -1.4499,-1.12136 -2.29557,-0.75586l-6.70475,2.89746c-2.71617,-2.35067 -5.8536,-4.185 -9.32226,-5.389l-0.83985,-7.25065c-0.10033,-0.9245 -0.88116,-1.6097 -1.80566,-1.6097zM136.16667,123.625c6.923,0 12.54167,5.6115 12.54167,12.54167c0,6.923 -5.61867,12.54167 -12.54167,12.54167c-6.923,0 -12.54167,-5.61867 -12.54167,-12.54167c0,-6.93017 5.61867,-12.54167 12.54167,-12.54167z"></path>
                </g>
              </g>
            </svg></div>
          <div>
            <li><a class="text-color-dark text-decoration-none" href="#">manage account</a></li>
          </div>
        </div>
        <hr class="hr-drop">
        <div class="d-flex justify-content-start align-items-center ms-3">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#6f6f6f">
                  <path d="M86,14.33333c-39.49552,0 -71.66667,32.17115 -71.66667,71.66667c0,39.49552 32.17115,71.66667 71.66667,71.66667c39.49552,0 71.66667,-32.17115 71.66667,-71.66667c0,-39.49552 -32.17115,-71.66667 -71.66667,-71.66667zM86,28.66667c31.74921,0 57.33333,25.58412 57.33333,57.33333c0,31.74921 -25.58412,57.33333 -57.33333,57.33333c-31.74921,0 -57.33333,-25.58412 -57.33333,-57.33333c0,-31.74921 25.58412,-57.33333 57.33333,-57.33333zM78.83333,50.16667v28.66667h-28.66667v14.33333h28.66667v28.66667h14.33333v-28.66667h28.66667v-14.33333h-28.66667v-28.66667z"></path>
                </g>
              </g>
            </svg>
          </div>
          <div>
            <li><a class="text-color-dark text-decoration-none" href="../../service/logout.php">new product</a></li>
          </div>
        </div>
        <hr class="hr-drop">
        <div class="d-flex justify-content-start align-items-center ms-3">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#666666">
                  <path d="M43,14.33333c-7.90483,0 -14.33333,6.4285 -14.33333,14.33333v114.66667c0,7.90483 6.4285,14.33333 14.33333,14.33333h86c7.90483,0 14.33333,-6.4285 14.33333,-14.33333v-34.04167l-14.31934,10.736v23.30566h-86.014v-114.66667h86v23.29167l14.33333,10.75v-34.04167c0,-7.90483 -6.4285,-14.33333 -14.33333,-14.33333zM114.66667,59.125v19.70833h-35.83333v14.33333h35.83333v19.70833l35.83333,-26.875z"></path>
                </g>
              </g>
            </svg>
          </div>
          <div>
            <li><a class="text-color-dark text-decoration-none" href="../../service/logout.php">logout</a></li>
          </div>
        </div>
      </ul>
    </div>

    <script src="../../public/js/close.js"></script>


    <section class="container my-5 px-6">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-3 col-sm-12 d-flex justify-content-center mb-4">
          <div class="img-shop">
            <img src="<?php echo $_SESSION['seller_photo'] ?>" alt="">
          </div>
        </div>
        <div class="col-lg-9 col-sm-12">
          <div class="flexx">
            <div class="d-flex align-items-center text-color-dark">
              <h2 class="m-0 fs-1 d-inline"><?php echo $_SESSION['seller_shopname'] ?></h2>
              <a class="ms-1" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#7f7c82">
                      <path d="M128.49609,21.33203c-5.62695,0 -11.25391,2.18359 -15.62109,6.55078l-84.99219,84.99219l-0.33594,1.67969l-5.87891,29.5625l-1.67969,7.89453l7.89453,-1.67969l29.5625,-5.87891l1.67969,-0.33594l84.99219,-84.99219c8.73438,-8.73437 8.73438,-22.50781 0,-31.24219c-4.36719,-4.36719 -9.99414,-6.55078 -15.62109,-6.55078zM128.49609,31.57813c2.70849,0 5.43799,1.23877 8.0625,3.86328c5.22803,5.22803 5.22803,10.89697 0,16.125l-3.86328,3.69531l-15.95703,-15.95703l3.69531,-3.86328c2.62451,-2.62451 5.35401,-3.86328 8.0625,-3.86328zM109.17969,46.86328l15.95703,15.95703l-65.00391,65.00391c-3.52734,-6.88672 -9.07031,-12.42969 -15.95703,-15.95703zM37.28906,120.60156c6.4458,2.60352 11.50586,7.66357 14.10938,14.10938l-17.63672,3.52734z"></path>
                    </g>
                  </g>
                </svg></a>
            </div>
            <div>
              <p class="d-inline me-3 text-color-dark"><span><?php echo $rowP['seller_product_qty'] ?></span> products</p>
              <p class="d-inline me-3 text-color-dark"><span><?php echo $rowP['seller_follower'] ?></span> followers</p>
            </div>
            <div>
              <p class="d-inline me-3 text-color-dark">rating: <span><?php echo $rowP['seller_rating'] ?></span></p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="container my-5 px-5">
      <div class="row">
        <div class="col-6 bg-color-one text-color-light link-prod1 d-flex align-items-center justify-content-center">
          <h2 class="fs-2 mt-1">products</h2>
        </div>
        <div class="col-6 bg-color-light text-color-dark link-prod2 d-flex align-items-center justify-content-center">
          <h2 class="fs-2 mt-1">orders</h2>
        </div>
      </div>

      <div class="row"></div>
    </section>

    <!-- TODO show product -->
    <!-- SELECT * FROM `product` LEFT JOIN seller_info ON product.seller_id = seller_info.seller_id WHERE product.seller_id = 1; -->


    <section class="container my-5 px-5">
      <div class="row d-flex justify-content-center align-items-center">

        <div class="col-lg-3 col-md-6 col-sm-12 prod_thumnail2 mx-2 my-2 p-2">
          <a class="text-decoration-none text-color-dark" href="./addProduct.php">
            <div class="d-flex justify-content-center align-items-center w-100 h-100">
              <h1 class="big-size ">+</h1>
            </div>
          </a>
        </div>

        <?php

        require_once "../../config/dbcon.php";

        $prodDataCmd = 'SELECT * FROM product LEFT JOIN seller_info ON product.seller_id = seller_info.seller_id WHERE product.seller_id = ' . $_SESSION['seller_id'];
        // echo $prodDataCmd;
        $prodData =  mysqli_query($con, $prodDataCmd);

        while ($prod_row = mysqli_fetch_array($prodData)) {
        ?>

          <div class="col-lg-3 col-md-6 col-sm-12 prod_thumnail mx-2 my-2 p-2">
            <a class="text-decoration-none" href="<?php echo "./editProduct.php?id=" . $prod_row['prod_id'] ?>">
              <div class="img-thumnail d-flex justify-content-center mb-3">
                <img src="<?php echo $prod_row['prod_photo'] ?>">
              </div>
              <div class="ms-2">
                <h3 class="text-color-dark text-overflow-self"><?php echo $prod_row['prod_name'] ?></h3>
                <p class="text-color-dark text-overflow-self">Price : <?php echo number_format($prod_row['prod_price']) ?> baht</p>
              </div>
            </a>
          </div>


        <?php } ?>
      </div>
    </section>

    <section class="container my-5 px-5">
      <h2 class="text-color-dark fs-3">contact admin</h2>
      <hr style="width:100%;" class="mx-auto mb-5">

      <form action="#">
        <div class="container row mb-4">
          <div class="col-md-3 col-sm-12">
            <label class="text-color-dark d-block fs-3" for="Address">question:</label>
          </div>
          <div class="col-md-9 col-sm-12">
            <textarea class="input-textarea" name="address" rows="4" cols="50" placeholder="Enter Address..."></textarea>
            <input class="sign-up-btn bg-color-one text-light fs-5" type="submit">
          </div>
        </div>
      </form>

      <div class="container row mb-4">
        <div class="col-md-3 col-sm-12">
          <label class="text-color-dark d-block fs-3" for="Address">answer:</label>
        </div>
        <div class="col-md-9 col-sm-12">

        </div>
      </div>

    </section>

    <footer class="container-fulid py-4 mt-5">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12 d-flex justify-content-center align-items mb-3">
            <div class="mx-2">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="38" height="33" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#7f7c82">
                    <path d="M86,10.32c-41.75623,0 -75.68,33.92377 -75.68,75.68c0,37.90582 27.95871,69.27594 64.37235,74.7461l3.95062,0.59797v-59.63563h-17.8786v-12.10719h17.8786v-16.07797c0,-9.9006 2.37582,-16.42129 6.3089,-20.51235c3.93309,-4.09105 9.74446,-6.15437 17.83156,-6.15437c6.46654,0 8.98224,0.39181 11.37485,0.68531v9.91016h-8.4186c-4.77673,0 -8.69574,2.66507 -10.72984,6.21484c-2.0341,3.54978 -2.66735,7.78817 -2.66735,12.10719v13.82047h21.06328l-1.87453,12.10719h-19.18875v59.73641l3.9036,-0.53078c36.93123,-5.00873 65.4339,-36.631 65.4339,-74.90735c0,-41.75623 -33.92377,-75.68 -75.68,-75.68zM86,17.2c38.03801,0 68.8,30.76199 68.8,68.8c0,33.47048 -23.95685,60.99738 -55.5775,67.19422v-44.6125h18.20781l3.99765,-25.86719h-22.20547v-6.94047c0,-3.56891 0.65299,-6.76666 1.7536,-8.68735c1.1006,-1.92069 2.16152,-2.75469 4.76359,-2.75469h15.2986v-23.01844l-2.98313,-0.40313c-2.06328,-0.27919 -6.77392,-0.9339 -15.27172,-0.9339c-9.29866,0 -17.28029,2.53306 -22.79,8.26406c-5.50971,5.731 -8.23047,14.26461 -8.23047,25.28265v9.19797h-17.8786v25.86719h17.8786v44.39078c-31.11251,-6.59066 -54.56297,-33.87112 -54.56297,-66.97922c0,-38.03801 30.76199,-68.8 68.8,-68.8z"></path>
                  </g>
                </g>
              </svg>
            </div>
            <div class="mx-2">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="32" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#7f7c82">
                    <path d="M55.04,10.32c-24.65626,0 -44.72,20.06374 -44.72,44.72v61.92c0,24.65626 20.06374,44.72 44.72,44.72h61.92c24.65626,0 44.72,-20.06374 44.72,-44.72v-61.92c0,-24.65626 -20.06374,-44.72 -44.72,-44.72zM55.04,17.2h61.92c20.9375,0 37.84,16.9025 37.84,37.84v61.92c0,20.9375 -16.9025,37.84 -37.84,37.84h-61.92c-20.9375,0 -37.84,-16.9025 -37.84,-37.84v-61.92c0,-20.9375 16.9025,-37.84 37.84,-37.84zM127.28,37.84c-3.79972,0 -6.88,3.08028 -6.88,6.88c0,3.79972 3.08028,6.88 6.88,6.88c3.79972,0 6.88,-3.08028 6.88,-6.88c0,-3.79972 -3.08028,-6.88 -6.88,-6.88zM86,48.16c-20.85771,0 -37.84,16.98229 -37.84,37.84c0,20.85771 16.98229,37.84 37.84,37.84c20.85771,0 37.84,-16.98229 37.84,-37.84c0,-20.85771 -16.98229,-37.84 -37.84,-37.84zM86,55.04c17.13948,0 30.96,13.82052 30.96,30.96c0,17.13948 -13.82052,30.96 -30.96,30.96c-17.13948,0 -30.96,-13.82052 -30.96,-30.96c0,-17.13948 13.82052,-30.96 30.96,-30.96z"></path>
                  </g>
                </g>
              </svg>
            </div>
            <div class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="33" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#7f7c82">
                    <path d="M117.7125,18.8125c-20.57281,0 -37.3025,16.72969 -37.3025,37.3025c0,1.23625 0.30906,2.44563 0.43,3.655c-25.43719,-2.43219 -47.93156,-14.68719 -63.21,-33.4325c-0.71219,-0.90031 -1.81406,-1.38406 -2.96969,-1.30344c-1.14219,0.08062 -2.16344,0.73906 -2.72781,1.73344c-3.21156,5.52281 -5.0525,11.87875 -5.0525,18.705c0,8.26406 2.95625,15.82938 7.525,22.0375c-0.88687,-0.38969 -1.85437,-0.60469 -2.6875,-1.075c-1.06156,-0.56437 -2.33812,-0.5375 -3.37281,0.08063c-1.03469,0.61812 -1.66625,1.73344 -1.67969,2.92937v0.43c0,12.67156 6.5575,23.67688 16.2325,30.4225c-0.1075,-0.01344 -0.215,0.02688 -0.3225,0c-1.1825,-0.20156 -2.37844,0.215 -3.17125,1.11531c-0.79281,0.90031 -1.04812,2.15 -0.69875,3.29219c3.84313,11.94594 13.6525,21.07 25.8,24.4025c-9.675,5.75125 -20.89531,9.1375 -33.0025,9.1375c-2.62031,0 -5.13312,-0.13437 -7.6325,-0.43c-1.6125,-0.215 -3.15781,0.72563 -3.69531,2.2575c-0.55094,1.53188 0.05375,3.23844 1.43781,4.085c15.52031,9.95719 33.94313,15.8025 53.75,15.8025c32.10219,0 57.28406,-13.41062 74.175,-32.5725c16.89094,-19.16187 25.6925,-44.04812 25.6925,-67.295c0,-0.98094 -0.08062,-1.935 -0.1075,-2.9025c6.30219,-4.82406 11.9325,-10.48125 16.34,-17.0925c0.87344,-1.27656 0.77938,-2.98312 -0.22844,-4.16562c-0.99438,-1.1825 -2.67406,-1.54531 -4.07156,-0.88688c-1.77375,0.79281 -3.84312,0.87344 -5.6975,1.505c2.44563,-3.26531 4.54188,-6.78594 5.805,-10.75c0.43,-1.35719 -0.04031,-2.84875 -1.15562,-3.73562c-1.11531,-0.87344 -2.67406,-0.98094 -3.89688,-0.24188c-5.87219,3.48031 -12.37594,5.92594 -19.2425,7.4175c-6.665,-6.235 -15.43969,-10.4275 -25.2625,-10.4275zM117.7125,25.6925c8.77469,0 16.70281,3.74906 22.2525,9.675c0.83313,0.86 2.05594,1.22281 3.225,0.9675c4.48813,-0.88687 8.74781,-2.19031 12.9,-3.87c-2.39187,3.225 -5.34812,5.97969 -8.815,8.0625c-1.57219,0.76594 -2.31125,2.58 -1.73344,4.23281c0.56437,1.63937 2.28437,2.59344 3.99094,2.21719c3.44,-0.41656 6.50375,-1.81406 9.7825,-2.6875c-2.94281,3.18469 -6.16781,6.06031 -9.675,8.6c-0.95406,0.69875 -1.47812,1.8275 -1.3975,3.01c0.05375,1.3975 0.1075,2.78156 0.1075,4.1925c0,21.5 -8.25062,44.84094 -23.9725,62.6725c-15.72187,17.83156 -38.8075,30.315 -69.015,30.315c-13.71969,0 -26.67344,-3.03687 -38.3775,-8.385c14.5125,-1.11531 27.89625,-6.24844 38.7,-14.7275c1.12875,-0.90031 1.57219,-2.40531 1.11531,-3.77594c-0.45688,-1.37063 -1.72,-2.31125 -3.15781,-2.35156c-11.34125,-0.20156 -20.84156,-6.79937 -25.9075,-16.125c0.18813,0 0.34938,0 0.5375,0c3.39969,0 6.75906,-0.43 9.89,-1.29c1.505,-0.44344 2.53969,-1.84094 2.48594,-3.41312c-0.05375,-1.57219 -1.16906,-2.91594 -2.70094,-3.25188c-12.24156,-2.4725 -21.41937,-12.44312 -23.5425,-24.8325c3.46688,1.19594 7.01438,2.13656 10.8575,2.2575c1.57219,0.09406 2.99656,-0.88687 3.48031,-2.37844c0.48375,-1.49156 -0.1075,-3.13094 -1.43781,-3.96406c-8.17,-5.46906 -13.545,-14.78125 -13.545,-25.37c0,-3.92375 1.02125,-7.525 2.365,-10.965c17.2,18.87969 41.28,31.41688 68.4775,32.7875c1.075,0.05375 2.12313,-0.38969 2.82188,-1.20937c0.69875,-0.83313 0.9675,-1.935 0.72562,-2.98313c-0.52406,-2.23062 -0.86,-4.59562 -0.86,-6.9875c0,-16.85062 13.57188,-30.4225 30.4225,-30.4225z"></path>
                  </g>
                </g>
              </svg></div>
          </div>
          <div class="col-12 text-center text-color-dark">©achats ,2022 all right reserved.</div>
        </div>
      </div>
    </footer>
  <?php

  } else {
    session_destroy();

    header('refresh: 2; url=./signin.php');
  }

  ?>
</body>

</html>