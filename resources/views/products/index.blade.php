<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download PDFs</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Products</h1>
    <form action="{{ route('download.pdfs') }}" method="POST">
        @csrf
        <button type="button" id="select-all">Select All</button>
        <button type="submit">Download Selected PDFs</button>
        <br><br>
        <table border="1">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected_ids[]" value="{{ $product->id }}">
                        </td>
                        <td>{{ $product->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>

    <script>
        // Select All Checkboxes
        $('#select-all').click(function() {
            $('input[type="checkbox"]').prop('checked', this.checked);
        });
    </script>
</body>
</html>
