<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use ZipArchive;
use ZipStream\ZipStream;
use Illuminate\Support\Facades\Response;


class ProductController extends Controller
{
    // Display products with checkboxes
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Download selected PDFs
    public function downloadPDFs(Request $request)
{
    $selectedIds = $request->input('selected_ids', []);

    if (empty($selectedIds)) {
        return redirect()->back()->with('error', 'No products selected.');
    }

    $products = Product::whereIn('id', $selectedIds)->get();

    if ($products->count() === 1) {
        // Download single PDF
        $product = $products->first();
        return response()->download(storage_path('app/public/' . $product->pdf_path));
    } else {
        // Download multiple PDFs as a ZIP file
        $zip = new ZipStream('products.zip');

        foreach ($products as $product) {
            $zip->addFileFromPath(basename($product->pdf_path), storage_path('app/public/' . $product->pdf_path));
        }

        $zip->finish();
    }
}
}
