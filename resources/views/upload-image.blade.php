<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .upload-container {
            max-width: 700px;
            margin: 3rem auto;
        }
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        .card-header-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1.5rem;
            border: none;
        }
        .card-header-modern h4 {
            color: white;
            font-weight: 600;
            margin: 0;
        }
        .form-label-modern {
            font-weight: 500;
            color: #4a5568;
        }
        .form-control-modern {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .form-control-modern:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        }
        .btn-upload {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .image-preview {
            border-radius: 12px;
            overflow: hidden;
            border: 3px dashed #e2e8f0;
            padding: 1rem;
            text-align: center;
            background: #f8fafc;
        }
        .image-preview img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .file-upload-wrapper {
            position: relative;
            margin: 1rem 0;
        }
        .file-upload-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .file-upload-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(245, 87, 108, 0.4);
        }
        .file-name-display {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #718096;
        }
        .alert-modern {
            border-radius: 10px;
            border: none;
        }
        .nav-modern {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            margin-bottom: 2rem;
        }
        .nav-modern .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .nav-modern .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .nav-modern .nav-link.active {
            background: white;
            color: #667eea;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="nav nav-modern justify-content-between">
            <div class="d-flex align-items-center">
                <span class="navbar-brand text-white me-4" style="font-weight: 700;">
                    <i class="bi bi-image me-2"></i>Image Upload
                </span>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/upload-image') }}">Upload Image</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="upload-container">
            <div class="card card-modern">
                <div class="card-header card-header-modern">
                    <h4><i class="bi bi-cloud-upload me-2"></i>Upload Image</h4>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                    <div class="alert alert-success alert-modern">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-modern">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('gambar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label-modern">Choose Image</label>
                            <div class="file-upload-wrapper">
                                <label for="image" class="file-upload-label">
                                    <i class="bi bi-folder2-open"></i>
                                    <span>Browse File</span>
                                </label>
                                <input type="file" class="d-none" id="image" name="image" required accept="image/*">
                                <div id="file-chosen" class="file-name-display">No file chosen</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">Preview</label>
                            <div class="image-preview" id="preview-container">
                                <i class="bi bi-image" style="font-size: 3rem; color: #cbd5e0;"></i>
                                <p class="text-muted mt-2">Image preview will appear here</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-upload w-100">
                            <i class="bi bi-upload me-2"></i>Upload Image
                        </button>
                    </form>

                    <hr class="my-4">

                    <h5 class="mb-3" style="color: #4a5568; font-weight: 600;">
                        <i class="bi bi-image me-2"></i>Current Image:
                    </h5>
                    @if($images && $images->filepath)
                    <div class="image-preview">
                        <img src="{{ url('storage/' . $images->filepath) }}" alt="Current Image" id="currentImage">
                        <p class="mt-2 text-muted">
                            <i class="bi bi-file-earmark me-1"></i>{{ $images->filename }}
                        </p>
                        <p class="text-muted small">
                            <i class="bi bi-clock me-1"></i>Uploaded: {{ $images->updated_at->diffForHumans() }}
                        </p>
                    </div>
                    @else
                    <div class="image-preview">
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #cbd5e0;"></i>
                        <p class="text-muted mt-2">No image uploaded yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // File upload preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileChosen = document.getElementById('file-chosen');
            const previewContainer = document.getElementById('preview-container');

            if (file) {
                fileChosen.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-height: 300px;">`;
                };
                reader.readAsDataURL(file);
            }
        });

        // Check for image updates
        function checkImageUpdate() {
            fetch('/latest-image')
                .then(response => response.json())
                .then(data => {
                    const currentImage = document.getElementById('currentImage');
                    if (currentImage && data.image_url) {
                        currentImage.src = data.image_url + '?t=' + new Date().getTime();
                    }
                })
                .catch(err => console.log('Error checking image:', err));
        }

        // Check for updates every 3 seconds
        setInterval(checkImageUpdate, 3000);
    </script>
</body>

</html>
