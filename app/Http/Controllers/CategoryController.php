<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use DB;
class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function index()
    {
        $categories = Category::orderBy('name')->paginate();
        return view('admin.categories.index', compact('categories'));
    }
    public function show()
    {
        $categories = Category::all();
        return view('categories.show', compact('categories'));
    }

    public function posts($id)
    {
        $posts = Post::whereRaw("find_in_set('".$id."',categories)")->get();
        return view('categories.posts', compact('posts'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();
        return redirect('admin/categories')->with('success', 'Category Added');

    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect('admin/categories')->with('success', 'Category Edited');
    }

    public function delete(Request $request, $id)
    
    {
        $category = Category::find($id);
       

        $posts = DB::table("posts")
           ->select("categories")
           ->whereRaw("find_in_set('".$id."',categories)")
           ->get();
           return $posts;
        //$category->delete();
        return redirect('admin/categories');
    }

    public function dltall(Request $request)
    {
        if(!$request->has('selected_cat_id') || empty($request->input('selected_cat_id'))) {
            return back()->withError("Selection required!");
        }

        Category::whereIn('id', $request->input('selected_cat_id'))->delete();

        return back()->withMessage("Deleted successfully!");
    }
    
}
