<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Admin Panel</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="mb-3">Books Inventory</h2>
        <ul class="list-group mb-4">
            @foreach($books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">{{ $book->title }}</h5>
                        <p class="mb-1">{{ $book->stock }} in stock</p>
                    </div>
                    <form action="/admin/book/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h2 class="mb-3">Add New Book</h2>
        <form action="/admin/book" method="POST" class="mb-4">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
            </div>
            <div class="form-group">
                <input type="text" name="author" class="form-control mb-2" placeholder="Author" required>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
            </div>
            <div class="form-group">
                <input type="number" name="stock" class="form-control mb-2" placeholder="Stock" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Book</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
