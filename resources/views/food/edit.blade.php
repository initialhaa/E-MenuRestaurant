@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('food.update', [$food->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Update Food</div>

                <div class="card-body">
                 <div class="form group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $food->name }}">
                 </div>
                 <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $food->price }}">
                 </div>
                 <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id==$food->category_id) selected  @endif>
                            {{ $category->name }}</option>   
                        @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                 </div>
                 <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                 </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
