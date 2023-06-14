<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <a href="{{ url('/addProducts') }}">Add Product</a>
        <tr>
            <td>name</td>
            <td> </td>
            <td>image</td>
            <td>Edit</td>
            <td>delete</td>
        </tr>
        @foreach($product as $prod)
        <tr>
            <td>{{ $prod['name'] }}</td>
            <td> </td>
            <td><img style=" width: 150px; " src="{{ asset('images/'.$prod->image) }}" alt=""></td>
            <td><a href="{{ url('editProducts',$prod->id) }}">Edit</a></td>
            <td><a onclick="return confirm('Sure to Delete?')" href="{{ url('deleteProducts',$prod->id) }}">Delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>