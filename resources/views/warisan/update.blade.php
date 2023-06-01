<!-- update.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Item</title>
    <!-- Include any necessary CSS or JS files -->
</head>
<body>
    <h1>Update Item</h1>

    <form action="{{ route('warisan.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="kategori">Category:</label>
        <input type="text" name="kategori" value="{{ $item->kategori }}"><br>

        <label for="nama">Name:</label>
        <input type="text" name="nama" value="{{ $item->nama }}"><br>

        <label for="desc">Description:</label>
        <textarea name="desc">{{ $item->desc }}</textarea><br>

        <label for="date">Date:</label>
        <input type="date" name="date" value="{{ $item->date }}"><br>

        <label for="gambar">Image:</label>
        <input type="file" name="gambar"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
