<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container">
    <form action="{{ route('update')}}" method="POST" >
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" >
        </div>

        <label for="" class="form-label">Catelory</label>
        <select class="form-select" name="category" >
            @foreach($category as $item)
                <option @if($product -> category_id === $item -> id) selected @endif value="{{ $item -> id }}">{{ $item -> name }}</option>
            @endforeach
        </select>

        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control" value="{{ $product->price }}">

        <label class="form-label">View</label>
        <input type="text" name="view" class="form-control" value="{{ $product->view }}">

        <button type="submit" class="btn btn-primary"  >Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
