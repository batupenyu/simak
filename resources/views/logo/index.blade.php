<!DOCTYPE html>
<html>
<head>
    <title>Manage Logo</title>
</head>
<body>
    <h1>Current Logo</h1>

    @if ($logo && $logo->image)
        @php
            $imagePath = asset('storage/' . $logo->image);
            $cacheBuster = file_exists(public_path('storage/' . $logo->image)) ? filemtime(public_path('storage/' . $logo->image)) : time();
        @endphp
        <img src="{{ $imagePath }}?t={{ $cacheBuster }}" alt="Logo" style="max-width: 200px;">
        <p>Image URL: {{ $imagePath }}?t={{ $cacheBuster }}</p>
        <p>Raw image path: {{ $logo->image }}</p>
        <p>Full URL: {{ url('storage/' . $logo->image) }}</p>
    @else
        <img src="{{ asset('image/logo.jpg') }}" alt="Default Logo" style="max-width: 200px;">
        <p>Image URL: {{ asset('image/logo.jpg') }}</p>
    @endif

    <h2>Upload New Logo</h2>
    <a href="{{ route('logo.create') }}">Upload Logo</a>
    <form action="{{ route('logo.create') }}" method="GET" style="margin-top: 10px;">
        <button type="submit">Replace Current Image</button>
    </form>
</body>
</html>
