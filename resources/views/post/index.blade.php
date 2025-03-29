<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Content</th>
        <th>image</th>
        <th>Date</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $posts->title }}</td>
        <td></td>
        <td>{{ $posts->content }}</td>
        <td>{{ $posts->image }}</td>
        <td>{{ $posts->created_at  }}</td>
    </tr>
    @endforeach
    </table>
</body>
</html>
