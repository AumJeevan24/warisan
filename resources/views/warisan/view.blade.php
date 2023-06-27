@extends('layout')

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-6" id="image">
                <div class="image-container">
                    <img src="{{ $warisanData->gambar }}" alt="Item Image">


                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="category">{{ $warisanData->kategori }}</div>
                    <div class="name">{{ $warisanData->nama }}</div>
                    <div class="desc">{{ $warisanData->desc }}</div>
                    <div class="date">Date: {{ $warisanData->date }}</div>

                    <!-- Hidden image input field -->
                    <input type="hidden" name="gambar" value="{{ $warisanData->gambar }}">
                   
                    <div class='align-right'>  
                        <a href="{{ route('warisan.edit', $warisanData->id) }}"><button class="btn" id="update">Update</button></a>
                        <form action="{{ route('warisan.delete', $warisanData->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirmDelete();">Delete</button>
                        </form>                        
                    </div>

            </div>
        </div>
    </div>
<!-- Delete Confirmation Modal -->
<script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete this item?")) {
                return true;
            }
            return false;
        }
    </script>    
<style>
        .card {
            margin: auto;
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
            padding: 50px 20px;
        }

        #image{
            display: flex;
            align-items: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .align-right{
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .btn {
            border-radius: 50px;
            font-size: small;
            width: 120px;
            margin: 0 5px;
        }

        #update {
            /* margin-top: 20px; */
            background-color: #1B1F27;
            color: #EBEBEB;
        }

        #update:hover {
            background-color: black;
            color: #EBEBEB;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        .delete{
            background-color: #D9D9D9;
            border-radius: 50px;
            font-size: small;
            width: 120px;
            margin: 0 5px;
            padding: 7px 0;
            border: none;
        }

        .delete:hover{
            background-color: #A6A6A6;
        }

        .image-container {
            padding: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        .category{
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .name{
            font-weight:bold;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .desc{
            margin-bottom: 20px;
        }

        .date{
            font-size: small;
            margin-bottom: 10px;
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
