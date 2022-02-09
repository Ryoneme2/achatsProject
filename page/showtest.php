<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="../public/css/seller.css">
  <link rel="stylesheet" href="../public/css/main.css">
  <title>Add Product: Seller</title>
</head>

<body>
  <?php


  ?>
  <nav class="navbar navbar-light bg-color-one70 py-1">
    <div class="container-fluid d-flex justify-content-between align-items-center mx-2">
      <div>
        <a class="navbar-brand ms-4 text-decoration-line-through fs-1 text-light" href="./dashboard.php">
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

  <!-- <script src="../../public/js/close.js"></script> -->



  <section class="container mt-5">

    <div class="row">
      <h1 class="text-center my-4 fs-0 text-color-dark">add product</h1>
      <div class="col-12 d-flex justify-content-center">
        <div class="addprod-form p-5">
          <form>
            <div class="col-md-8 col-sm-12">
              <div class="mb-2">
                <label class="uploadLabel">
                  <input type="file" name="prod_photo" id="file" class="uploadButton" multiple="multiple" onchange="encodeImageFileAsURL()" />
                  choose
                </label>
              </div>
              <div>
                <div id="preview" class="d-flex justify-content-center align-items-center"></div>
              </div>

              <div class="mt-5 d-flex justify-content-center">
                <input class="sign-up-btn bg-color-one text-light fs-4" id="allProd-btn" type="submit" onclick="sendPayload()">
              </div>

          </form>
        </div>
      </div>
    </div>

  </section>


  <script src="../public/js/multi_upload.js"></script>
  <?php


  ?>


</body>

</html>