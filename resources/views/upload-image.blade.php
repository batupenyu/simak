<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

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
                        @if($images)
                        <p>Image path: {{ $images->filepath }}</p>
                        <p>Image URL: {{ Storage::url($images->filepath) }}</p>
                        <img src="{{ Storage::url($images->filepath) }}" alt="Current Image" class="img-fluid mt-2" id="currentImage">
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