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
    <form action="{{ url('storeProducts') }}" method = "post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label><br><br>
        <input type="text" name = "name" id = "name" placeholder="enter name"><br><br><br><br>
        <label for="image">Image</label><br><br>
        <input type="file" name="image"><br><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>