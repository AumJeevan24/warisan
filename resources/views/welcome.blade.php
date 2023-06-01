<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warisan Tradisional Bumi Nusantara</title>
    <style>
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

        .card-title {
            font-size: 18px;
            text-align: center;
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
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><img class="logo" src="images/logo.jpg"></a>
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
<div class="container">
    <div class="row" id="card-content">
        <div class="col">
            <h1 id="view-collection">all collections</h1>
            <div class="row" id="card-information"></div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "/data/collections.json",
            type: "get",
            success: function (data) {
                let semuaCollection = data.semuaCollection;
                $.each(semuaCollection, function (i, koleksi) {
                    $('#card-information').append('<div class="col-md-4" data-category="' + koleksi.kategori + '"><div class="card"><img class="card-img-top" src="/images/' + koleksi.gambar + '"><div class="card-body"><h5 class="card-title">Category: ' + koleksi.kategori + '</h5><h5 class="card-title">Name: ' + koleksi.nama + '</h5><h5 class="card-title">Description: ' + koleksi.desc + '</h5><h5 class="card-title">Date: ' + koleksi.date + '</h5><a href="#" class="btn btn-success hide-button">Hide</a><a href="#" class="btn btn-danger delete-button">Delete</a></div></div></div>');
                });

                $(document).on("click", ".hide-button", function () {
                    var cardText = $(this).parent().find(".card-title, .card-text");
                    cardText.toggle();
                    if (cardText.is(":visible")) {
                        $(this).text("Hide");
                    } else {
                        $(this).text("Show");
                    }
                });

                $(document).on("click", ".delete-button", function () {
                    var card = $(this).closest(".col-md-4");
                    card.remove();
                });

                $(".navbar-nav .nav-link").click(function (e) {
                    e.preventDefault();
                    var category = $(this).text().trim().toLowerCase();

                    $("#card-content .col-md-4").each(function () {
                        if (category == "all collections" || $(this).attr("data-category").toLowerCase() === category) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });

                    $(".navbar-nav .nav-link").removeClass("active");
                    $(this).addClass("active");
                    $("#view-collection").text(category);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
</script>
</html>
