@extends('layout')

@section('content')
<style>
    .btn {
        margin-left: 80px;
        background-color: #1B1F27;
        color: white;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }

    .btn:hover{
        transform: scale(1.05);
        color: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }

    .col-md-3 a{
        text-decoration: none;
        color: #1B1F27;
    }

    .col-md-3 a:hover{
        text-decoration: none;
        color: #1B1F27;
    }

    .wsk-cp-product{
        background:#fff;
        padding:15px;
        border-radius:6px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        position:relative;
        margin:20px auto;
        cursor: pointer;
    }

    .wsk-cp-product:hover{
        transform: scale(1.05);
        box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }

    .wsk-cp-img{
        position:absolute;
        top:5px;
        left:50%;
        transform:translate(-50%);
        -webkit-transform:translate(-50%);
        -ms-transform:translate(-50%);
        -moz-transform:translate(-50%);
        -o-transform:translate(-50%);
        -khtml-transform:translate(-50%);
        width: 100%;
        padding: 15px;
        transition: all 0.2s ease-in-out;
    }
    .wsk-cp-img img{
        width:100%;
        max-height: 150px;
        transition: all 0.2s ease-in-out;
        border-radius:6px;
    }

    .wsk-cp-text{
        padding-top:70%;
    }
    
    .wsk-cp-text .title-product{
        text-align:center;
    }
    .wsk-cp-text .title-product h3{
        font-size:20px;
        font-weight:bold;
        margin:15px auto;
        overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        width:100%;
    }
    .wsk-cp-text .description-prod p{
        margin:0;
    }
    /* Truncate  CAN'T DISPLAY ELLIPSIS */ 
    .wsk-cp-text .description-prod {
        text-align:center;
        height: 62px;
        width: 100%; 
        overflow: hidden;
        text-overflow: ellipsis; 
    }

    .card-footer{
        padding: 10px 0 5px;
        border-top: 1px solid #ddd;
        background-color: white;
    }
    .card-footer:after, .card-footer:before{
        content:'';
        display:table;
    }
    .card-footer:after{
        clear:both;
    }

    .card-footer .wcf-left{
        float:left;
    }

    .card-footer .wcf-right{
        float:right;
    }

    @media screen and (max-width: 991px) {
        .wsk-cp-product{
            margin:40px auto;
        }
        .wsk-cp-product .wsk-cp-img{
        top:-40px;
        }
        .wsk-cp-product .wsk-cp-img img{
        box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        }
        .wsk-cp-product .wsk-cp-text .category > span{
        border-color:#ddd;
        box-shadow: none;
        padding: 11px 28px;
        }
        .wsk-cp-product .wsk-cp-text .category{
        margin-top: 0px;
        }
    }
</style>

@if(session('success'))
    <script>
        alert("Item deleted successfully");
    </script>
@endif

<div class="shell">
    <a href="{{ route('warisan.create') }}">
        <button type="submit" class="btn"> Add New Item </button>
    </a>
    <div class="container">
    <div class="row">
        @foreach($warisanData as $item)
        <div class="col-md-3" data-category="{{ $item->kategori }}">
            <a href="{{ route('warisan.view', $item->id) }}">
                <div class="wsk-cp-product shadow p-3 mb-3 bg-white border-light rounded">
                    <div class="wsk-cp-img">
                        <img src="{{ asset('images/'.$item->gambar) }}" alt="{{ $item->nama }}" class="img-responsive" />
                    </div>
                    <div class="wsk-cp-text">
                        <div class="title-product">
                            <h3>{{ $item->nama }}</h3>
                        </div>
                        <div class="description-prod">
                            <p>{{ $item->desc }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="wcf-left"><span class="text-muted">{{ $item->kategori }}</span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach   
        <div class="col-md-3">
        <div class="wsk-cp-product shadow p-3 mb-3 bg-white border-light rounded">
            <div class="wsk-cp-img" id="addIcon" style="width: 30%; height: 30%; padding-top: 30%;">
            <img src="/images/addIcon.png" class="img-responsive" />
            </div>
            <div class="wsk-cp-text" style="padding-top:60%; padding-bottom: 20%;">
            <div class="description-prod">
                <p>Add New Item</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
        
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
@endsection