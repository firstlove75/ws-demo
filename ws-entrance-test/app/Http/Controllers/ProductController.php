<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	private $product = null;

	public function __construct()
	{
		$this->product = new Product;
	}

	public function index()
	{
		$products = Product::all();
		return view('welcome', ['products' => $products]);
	}

	public function add(Request $request)
	{
		$this->validateProduct($request);
        $name_prod = $request->input('name');
        $category_prod = !empty($request->input('cat_list'))? $request->input('cat_list'): 0;
        $desc = $request->input('description');

        // Process upload image file
        $prod_image = $request->image;
        $upload_info = $prod_image->move(public_path('/upload/image/'), $prod_image->getClientOriginalName());

        $this->product->name = $name_prod;
        $this->product->category_id = !empty($category_prod)? $category_prod: 0;
        $this->product->description = !empty($desc)? $desc: '';
        $this->product->image = !empty($prod_image->getClientOriginalName())? $prod_image->getClientOriginalName(): '';
        $this->product->save();
        return redirect('product');
	}

	private function validateProduct(Request $request)
	{
		$this->validate($request, [
            'name' => 'required'
        ]);
	}
}