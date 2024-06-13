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

    <!-- <script src="./public/js/index.js"></script> -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
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
              <li class="nav-item">
                  <a class="nav-link" href="#">Username</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="/Lab_09_10/CartController/SayHi">Cart (4 items)</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3" id="table-category">

          <h1 class="my-4">Luffy store</h1>
          <div class="list-group">
            <a href="/Lab_09_10/HomeController/SayHi" class="list-group-item">Tất cả</a>
            <script>
              function getCategory(member){
                  let list_group = `
                  <a href="/Lab_09_10/HomeController/getProductGroupByName/${member.name}" class="list-group-item">${member.name}</a>
                  `
                  $("#table-category").append(list_group);
                }
              let category = <?php echo $data["Category"];?>;
              category.forEach(member => getCategory(member))
            </script>
          </div>
          <!-- <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div> -->

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="/Lab_09_10/public/images/slider_1.webp" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="/Lab_09_10/public/images/slider_2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="/Lab_09_10/public/images/slider_3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row" id="table-item">
            <!-- <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Six</a>
                  </h4>
                  <h5 style="color: #f47442">$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
                <div class="card-footer">
                  <a href="#" class="btn btn-primary">Add to cart</a>

                </div>
              </div>
            </div> -->

            <script>
              let data = <?php echo $data["Product"];?>;
              data.forEach(member => getProduct(member))

              function getProduct(member)
              {
                let vote = ""
                const maxStar = 5;
                for(let i = 1; i <=  maxStar; i++)
                {
                  if(i <= member.vote)
                  {
                    vote = vote + "&#9733; "
                  }
                  else {
                    vote = vote + "&#9734; "
                  }
                }
                let price = member.price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                let item = `
                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="/Lab_09_10/public/${member.image}" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">${member.name}</a>
                        </h4>
                        <h5 style="color: #f47442">${price}</h5>
                        <p class="card-text"${member.description}</p>
                        <small class="text-muted">${vote}</small>
                      </div>
                      <div class="card-footer">
                        <a href="/Lab_09_10/CartController/SayHi"> 
                          <button class="btn btn-primary" onclick="addItem(this.value)" value="${member.id}"">Add to cart</button>
                        </a>
                      </div>
                    </div>
                  </div>
                  </div>
                `
                $("#table-item").append(item);
              }

              function addItem(id)
              {
                $.post(`/Lab_09_10/CartController/getProductInCart/`, {id: id},function(data, status) {
                  console.log(status)
                  console.log(data)
                })
                
              }
            </script>

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
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    

  </body>

</html>
