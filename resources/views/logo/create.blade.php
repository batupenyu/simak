<!DOCTYPE html>
<html>
<head>
    <title>Upload Logo</title>
</head>
<body>
    <h1>Upload New Logo</h1>

    <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>