<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    use Illuminate\Support\Facades\Log;

public function index(Request $request)
{
    Log::info('Request Data:', $request->all()); // Debugging line

    $query = Order::query();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('start_date') && $request->filled('end_date')) {
        Log::info('Filtering between:', [$request->start_date, $request->end_date]); // Debugging line
        $query->whereBetween('order_date', [$request->start_date, $request->end_date]);
    }

    $orders = $query->paginate(10);

    return view('orders.index', compact('orders'));
}

}

