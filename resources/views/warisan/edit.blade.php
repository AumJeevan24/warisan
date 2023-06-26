@extends('layout')

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="{{ asset('images/'.$warisanData->gambar) }}" alt="Item Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-header">
                    <h3>Update Form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('warisan.update', $warisanData->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kategori">Category:</label>
                            <input type="text" name="kategori" value="{{ $warisanData->kategori }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nama">Name:</label>
                            <input type="text" name="nama" value="{{ $warisanData->nama }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <textarea name="desc" class="form-control" rows="4">{{ $warisanData->desc }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="text" name="date" value="{{ $warisanData->date }}" class="form-control">
                        </div>

                        <!-- Hidden image input field -->
                        <input type="hidden" name="id" value="{{ $warisanData->id }}">
                        <button type="submit" class="btn">Update</button>
                    </form>
                </div>
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
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn{
            margin-top: 20px;
            background-color: #1B1F27;
            color: #EBEBEB;
        }

        .btn:hover{
            background-color: black;
            color: #EBEBEB;
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