<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/upload-image') }}">Upload Image</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Upload Image</div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Choose Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>

                        <hr>

                        <h4 class="mt-4">Current Image:</h4>
                        @if($images && $images->filepath)
                        <p>Image path: {{ $images->filepath }}</p>
                        <img src="{{ url('storage/' . $images->filepath) }}" alt="Current Image" class="img-fluid mt-2" id="currentImage">
                        <p class="mt-2">{{ $images->filename }}</p>
                        @else
                        <p>No image uploaded yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tambahkan di bagian bawah upload-image.blade.php sebelum </body> -->
    <script>
        // Fungsi untuk memeriksa perubahan gambar
        function checkImageUpdate() {
            fetch('/latest-image')
                .then(response => response.json())
                .then(data => {
                    const currentImage = document.getElementById('currentImage');
                    if (currentImage && data.image_url) {
                        currentImage.src = data.image_url + '?t=' + new Date().getTime();
                    }
                });
        }

        // Periksa perubahan setiap 3 detik
        setInterval(checkImageUpdate, 3000);
    </script>
</body>

</html>