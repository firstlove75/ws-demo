<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	private $category = null;

	public function __construct() {
		$this->category = new Category;
	}
	public function index()
	{
		$categories = Category::where('parent', 0)->get()->toArray();
		
		$html = '<ul class="list-category">';
		foreach ($categories as $category) {
			$html .= "<li>$category[name]</li>";
			$html .= $this->createSubListCategoryHtml($category['id'], $html);
			$html .= '</li>';
		}
		$html .= '</ul>';
		return view('welcome', ['content' => $html]);
	}

	public function add(Request $request)
	{
		$this->validateCategory($request);
        $name_cat = $request->input('name');
        $cat_parent = !empty($request->input('cat_list'))? $request->input('cat_list'): 0;
        $this->category->name = $name_cat;
        $this->category->parent = $cat_parent;
        $this->category->save();
        return redirect('category');
	}

	private function validateCategory(Request $request) 
	{
		$this->validate($request, [
            'name' => 'required'
        ]);
	}

	private function createSubListCategoryHtml($cat_id, &$html) 
	{
		//$html = '';
		$sub_cats = Category::where('parent', $cat_id)->get()->toArray();
		if (!empty($sub_cats)) {
			$html .= '<ul class="sub-cat">';
			foreach ($sub_cats as $sub_cat) {
				$html .= '<li class="sub-cat-item">'. $sub_cat['name'];
				$this->createSubListCategoryHtml($sub_cat['id'], $html);
				$html .= '</li>';
			}
			$html .= '</ul>';
		}
		// return $html;
	}
}