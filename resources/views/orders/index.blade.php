<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Orders List</h2>

        <form method="GET" action="{{ route('orders.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label>Status:</label>
                    <select name="status" class="form-control">
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="canceled">Canceled</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Date Range:</label>
                    <input type="text" name="daterange" class="form-control" id="daterange">
                    <input type="hidden" name="start_date" id="start_date">
                    <input type="hidden" name="end_date" id="end_date">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->order_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end) {
                $('#start_date').val(start.format('YYYY-MM-DD'));
                $('#end_date').val(end.format('YYYY-MM-DD'));
            });
        });
    </script>
</body>
</html>
