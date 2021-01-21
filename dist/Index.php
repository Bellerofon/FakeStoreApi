<?php
//hämta hostname från PHP servern och sätt den så vi kan använda den senare
//använd file_get_content för att hämta alla produkter som json
//serialisera ner det till ett objekt vi kan använda
$response = file_get_contents("https://fakestoreapi.com/products");
$json_output = json_decode($response,true);

if (isset($_GET['category'])) {
  $category = $_GET['category'];
  $categoryResult = array();
  
  if($category == "women"){
    for ($i = 0; $i <= count($json_output)-1; $i++) {
      if($json_output[$i]['category'] == "women clothing"){
        array_push($categoryResult,$json_output[$i]);
      }
    }
  }
  if($category == "men"){
    for ($i = 0; $i <= count($json_output)-1; $i++) {
      if($json_output[$i]['category'] == "men clothing"){
        array_push($categoryResult,$json_output[$i]);
      }
    }
  }
  if($category == "jewelery"){
    for ($i = 0; $i <= count($json_output)-1; $i++) {
      if($json_output[$i]['category'] == "jewelery"){
        array_push($categoryResult,$json_output[$i]);
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">FakeStoreAPI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">FakeStoreAPI</h1>
        <div class="list-group">
          <a href="?category=women" class="list-group-item">Women clothing</a>
          <a href="?category=men" class="list-group-item">Men clothing</a>
          <a href="?category=jewelery" class="list-group-item">Jewelery</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
 
        </div>

        <div class="row">
        <?php for ($i = 0; $i <= count($categoryResult)-1; $i++) {
          echo "<div class=\"col-lg-4 col-md-6 mb-4\">";
          echo "<div class=\"card h-100\">";
          echo "<a href><img  class=\"card-img-top\" src=\"" . $categoryResult[$i]['image']."\"></a>";
          echo "<div class=\"card-body\">";
          echo "<h4 class=\"card-title\">";
          echo "<a href=\"#\">".$categoryResult[$i]['title']."</a>";
          echo "</h4>";
          echo "<h5>". $categoryResult[$i]['price'] . "</h5>";
          echo "<p class=\"card-text\">".$categoryResult[$i]['description']."</p>";
          echo "</div>";
          echo "<div class=\"card-footer\">";
          echo "<small class=\"text-muted\">.&#9733; &#9733; &#9733; &#9733; &#9734;.</small>";
          echo "</div>";
          echo  "</div>";
          echo  "</div>";
        }?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; FakeStoreAPI</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
