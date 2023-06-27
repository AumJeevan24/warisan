<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warisan Tradisional Bumi Nusantara</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i');
    
    body{
        font-family: 'Muli', sans-serif;
        background:#ddd;
    }
    .shell{
        padding:20px 0;
        background-color: #EBEBEB;
    }

    .navbar {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }

    .navbar-brand {
        padding: 0px;
        margin-left: 60px;
        margin-right: 10px;
    }

    .navbar-brand img {
        height: 50px;
        width: 50px;
        border-radius: 50%
    }

    .navbar-nav .nav-link {
        margin-left: 50px;
        color: black;
    }

    .navbar-nav .nav-link.active {
        font-weight: bold;
    }

</style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('images/logo.jpg') }}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#" id="all-collections-link">all collections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="weapons-and-arms-link">weapons and arms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="household-items-link">household items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="textiles-link">textiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="carving-and-woodworks-link">carving and woodworks</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="shell">

@yield('content')

<script src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
  $(".navbar-nav .nav-link").click(function (e) {
      e.preventDefault();
      var category = $(this).text().trim().toLowerCase();

      $(".container .col-md-3").each(function () {
          if (category === "all collections" || $(this).attr("data-category").toLowerCase() === category) {
              $(this).show();
          } else {
              $(this).hide();
          }
      });

      $(".navbar-nav .nav-link").removeClass("active");
      $(this).addClass("active");
      $("#view-collection").text(category);
  });
});
</script>

</body>
</html>
