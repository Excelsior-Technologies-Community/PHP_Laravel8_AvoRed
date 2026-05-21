<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('id', 'like', '%' . $request->search . '%');
        }

        $products = $query->orderBy('id', 'asc')->paginate(5);

        return view('products.index', compact('products'));
    }

    /**
     * Soft delete a product.
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product moved to trash successfully!');
    }

    /**
     * Display the trash page.
     */
    public function trash()
    {
        $products = Product::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('products.trash', compact('products'));
    }

    /**
     * Restore a soft-deleted product.
     */
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->back()->with('success', 'Product restored successfully!');
    }

    /**
     * Permanently delete a product.
     */
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->back()->with('success', 'Product permanently deleted!');
    }
}