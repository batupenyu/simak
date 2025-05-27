@extends('layout.master')

@section('content')

<div class="w-50 center border rounded py-3 px-3 mt-5 mx-auto">
    <form action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Login</button>
        </div>
    </form>
</div>

@endsection