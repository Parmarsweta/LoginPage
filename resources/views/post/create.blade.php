<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('post.store')}}" method="POST">
        @csrf
        <label for="">Title</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="">Author</label>
        <input type="text" name="author" id="author">
        <br>
        <label for="">content</label>
        <input type="text" name="content" id="content">
        <br>
        <label for="">image</label>
        <input type="file" name="image" id="image">
        <br>
        <input type="image" src="" alt="">
        <input type="submit" value="submit">
    </form>
</body>
</html>
