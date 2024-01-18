<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <style>
        body {
            background-color:#000000; /* Dark Purple */
            color: #FFA31A; /* White text */
        }
        .add-button {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Manga List</h1>
        <a href="{{ route('create') }}" class="btn btn-primary add-button">Add Manga</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group manga-list">
            @forelse($mangas as $manga)
                <li class="list-group-item manga-item d-flex justify-content-between align-items-center" style="background-color:#000000;">
                    {{ $manga->title }} - Chapter {{ $manga->chapter }}
                    <div class="btn-group" role="group">
                        <a href="{{ route('mangas.edit', ['id' => $manga->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mangas.destroy', ['id' => $manga->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this manga?')">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="list-group-item">No mangas available.</li>
            @endforelse
        </ul>

        <!-- Pagination Links -->
        <div class="pagination justify-content-start" style="font-size: 14px; margin-bottom: 10px">
            {{ $mangas->links('pagination::bootstrap-4') }}
        </div>        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
