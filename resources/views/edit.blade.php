<!-- resources/views/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Manga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #4B0082; /* Dark Purple */
            color: #000000; /* White text */
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Edit Manga</h1>

        <form action="{{ route('mangas.update', ['id' => $manga->id]) }}" method="post">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $manga->title }}" required>
            </div>

            <div class="form-group">
                <label for="chapter">Chapter:</label>
                <input type="number" class="form-control" id="chapter" name="chapter" value="{{ $manga->chapter }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Manga</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
