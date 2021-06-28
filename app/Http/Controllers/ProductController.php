<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xfly\Model\Product;
use App\Xfly\Model\Service;
use App\Xfly\Model\Company;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $total_pages = 10;
    private $details_page = 4;

    public function index()
    {
        $products = Product::paginate($this->total_pages);

        return view('Products.welcome', compact('products'));
    }

    public function create()
    {
        return view('Products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        if ($product = Product::create($request->validated())) {
            $image = $request->file('image');

            $imageName = 'nullImage.png';

            if ($image != null) {
                $imageName = Str::random(15);
                $imageName = "{$imageName}.{$image->getClientOriginalExtension()}";
                Storage::disk('products_images')->put($imageName, File::get($image->getRealPath()));
            }

            $product->update([
                'image' => $imageName,
            ]);

            $products = Product::paginate($this->total_pages);

            return redirect('/products')->with('products');
        }

        return 'Erro ao cadastrar o Produto!';
    }

    public function details(Product $product)
    {
        $client = Company::where('id', $product->company_id)->get();
        $services = Service::orderByRaw('purchase_date DESC')->where('product_id', $product->id)->paginate($this->details_page);

        return view('Products.details', compact('product', 'client', 'services'));
    }

    public function edit(Product $product)
    {
        $companies = Company::all();
        $company_id = Company::where('id', $product->company_id)->get();

        return view('Products.edit', compact('product', 'companies', 'company_id'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $oldImage = $product->image;

        $product->update($request->validated());

        $image = $request->file('image');

        if ($oldImage == 'nullImage.png') {
            $imageName = 'nullImage.png';
        } else {
            $imageName = $oldImage;
        }

        if ($image != null) {
            if ($image) {
                if ($oldImage != 'nullImage.png') {
                    Storage::disk('products_images')->delete($oldImage);
                }

                $imageName = Str::random(15);
                $imageName = "{$imageName}.{$image->getClientOriginalExtension()}";
                Storage::disk('products_images')->put($imageName, File::get($image->getRealPath()));
            }
        }

        $product->update([
            'image' => $imageName,
        ]);

        $client = Company::where('id', $product->company_id)->get();
        $services = Service::orderByRaw('purchase_date DESC')->where('product_id', $product->id)->paginate($this->details_page);

        return view('Products.details', compact('product', 'client', 'services'));
    }

    public function destroy(Request $request)
    {
        if ($request->confirm == 1) {
            Product::where('id', $request->id)->delete();
        }

        $products = Product::paginate($this->total_pages);

        return redirect('/products')->with('products');
    }

    public function showRestore()
    {
        $products = Product::onlyTrashed()->get();

        return view('Products.restore', compact('products'));
    }

    public function restore($id)
    {
        Product::onlyTrashed()->where('id', $id)->restore();
        $products = Product::paginate($this->total_pages);

        return redirect('/products')->with('products');
    }
}
