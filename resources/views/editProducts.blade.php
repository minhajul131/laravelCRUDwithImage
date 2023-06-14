<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('updateProducts',$product->id) }}" method = "post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label><br><br>
        <input type="text" name = "name" id = "name" placeholder="enter name" value="{{ $product->name }}"><br><br><br><br>
        <label for="Current Image">Current Image</label><br><br>
        <img style=" width: 150px; " src="{{ asset('images/'.$product->image) }}" alt=""><br><br>
        <label for="image"> New Image</label><br><br>
        <input type="file" name="image"><br><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>