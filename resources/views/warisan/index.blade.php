<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warisan Tradisional Bumi Nusantara</title>
    <style>

        /* .body{
            background-color: blue;
        } */

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .card {
            border: 1px solid black;
            margin: 20px;
            width: 240px;
            height: 550px;
            padding: 10px;
            background-color: #f8f9fa;
        }

        .card:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }

        .card-title {
            /* font-size: 18px; */
            /* text-align: center; */
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
        }

        #cards-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .hide-button {
            display: block;
            margin: auto;
            margin-top: 10px;
        }

        .delete-button {
            display: block;
            margin: auto;
            margin-top: 10px;
        }

        #card-content {
            margin-top: 50px;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .navbar-brand {
            padding: 0px;
            margin-right: 10px;
        }

        .navbar-brand img {
            height: 100%;
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-link.active {
            font-weight: bold;
        }

        .card-body {
            height: auto;
            overflow: auto;
        }

        .card-body::-webkit-scrollbar {
            width: 5px;
        }

        .card-body::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .card-body::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 5px;
        }

        @media screen and (max-width: 576px) {
            .card {
                width: 100%;
            }
        }

        .update-form {
            display: none;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('images/logo.jpg') }}"></a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#" id="all-collections-link">all collections</a>
          <a class="nav-item nav-link" href="#" id="weapons-and-arms-link">weapons and arms</a>
          <a class="nav-item nav-link" href="#" id="household-items-link">household items</a>
          <a class="nav-item nav-link" href="#" id="textiles-link">textiles</a>
          <a class="nav-item nav-link" href="#" id="carving-and-woodworks-link">carving and woodworks</a>
      </div>
  </div>
</div>
</nav>
<div id="card-columns" class="container">
<div class="row" id="cards-row">
  @foreach($warisanData as $item)
  <div class="col-md-4" data-category="{{ $item->kategori }}">
    <div class="card-deck">
      <div class="card shadow p-3 mb-3 bg-white border-light rounded" style="width: 20rem;">
          <img class="card-img-top" src="{{ asset('images/'.$item->gambar) }}">
          <div class="card-body">
              <h5 class="card-title">{{ $item->nama }}</h5>
              <p class="card-text">{{ $item->desc }}</p>
              <!-- <p class="card-text">Date: {{ $item->date }}</p> -->
              <p class="card-text"><small class="text-muted">{{ $item->kategori }}</small></p>
              <!-- <form action="{{ route('warisan.edit', $item->id) }}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-warning text-dark">Update</button>
              </form> -->
          </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
  $(".navbar-nav .nav-link").click(function (e) {
      e.preventDefault();
      var category = $(this).text().trim().toLowerCase();

      $("#card-content .col-md-4").each(function () {
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