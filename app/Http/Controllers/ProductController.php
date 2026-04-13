<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $service
    ) {}

    /**
     * List products (paginated)
     */
    public function index(Request $request)
    {
        $products = $this->service->paginate(
            $request->get('per_page', 10)
        );

        return view('products.index', compact('products'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store product
     */
    public function store(StoreProductRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Update product
     */
    public function update(int $id, StoreProductRequest $request)
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Change status (supports notes + proper request body)
     */
    public function changeStatus(Request $request, int $id)
    {
        $request->validate([
            'status' => 'required|string',
            'notes' => 'nullable|string|max:1000',
        ]);

        $this->service->changeStatus(
            $id,
            $request->status,
            $request->notes
        );

        return redirect()
            ->route('products.index')
            ->with('success', 'Product status updated successfully');
    }
}