@extends('layout')

@section('content')
    <div class="card">
        <div class="row">
            <div class="card-body">
                <div class="title">Create A New Item</div>
                <div class="detail">Please provide the required details for the new item to ensure accurate documentation and representation. Thank you for your cooperation.</div>
                <form action="{{ route('warisan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="kategori">
                                <label for="kategori">Category:</label>
                                <select name="kategori" class="form-control">
                                    <option value="household items">household Items</option>
                                    <option value="weapons and arms">heapons and arms</option>
                                    <option value="textiles">textiles</option>
                                    <option value="carving and woodworks">carving and woodworks</option>
                                </select>
                            </div>
                            
                            <div class="nama">
                                <label for="nama">Name:</label>
                                <input type="text" name="nama" value="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="desc">
                                <label for="desc">Description:</label>
                                <textarea name="desc" class="form-control" cols="92" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="date">
                                <label for="date">Date:</label>
                                <input type="date" name="date" value="" class="form-control">
                            </div>
                            <div class="image">
                                <label for="gambar" class="form-label">Image URL:</label><br>
                                <input id="gambar" type="text" name="gambar" value="" class="form-control">
                            </div>
                        </div>

                        <!-- Hidden image input field -->

                        <button type="submit" class="btn">Create</button>
                    </form>
            </div>
        </div>
    </div>

    <style>
        .card {
            margin: 0 auto;
            width: 800px;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .card-header {
            font-size: 24px;
            font-weight: bold;
            padding: 20px;
        }

        .card-body {
            padding: 20px 40px;
        }

        input[type="text"], input[type="url"] {
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        textarea{
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        .title{
            font-weight: bold;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .detail{
            font-size: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            width: 100%;
        }

        label{
            color: #535A69;
        }

        .kategori{
            width: 350px;
            margin-right: 20px;
        }

        .nama{
            width: 350px;
        }

        .image{
            margin-left: 50px;
        }

        .btn{
            margin: 10px 0;
            background-color: #1B1F27;
            color: #EBEBEB;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        .btn:hover{
            background-color: black;
            color: #EBEBEB;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        .image-container {
            padding: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 767px) {
            .card {
                width: 100%;
            }

            .row {
                flex-direction: column;
            }

            .col-md-6 {
                width: 100%;
            }
        }
    </style>
@endsection
