<?php 
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Yajra\Datatables\Datatables;
use DB;


use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::all(); 
        //$posts->toJson();
        
        return view('admin.posts.index', compact('posts'));
    }


    public function getRowNumData(Request $request)
    {   
        DB::statement(DB::raw('set @rownum=0'));
        $posts = Post::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'title',
                'body',
                'categories',
                'created_at',                
            ]);

        $datatables = DataTables()->of($posts)
        ->rawColumns(['check', 'action', 'body'])
        
        ->addColumn("check", function($post){
            return '<input type="checkbox" name="selected_cat_id[]" value="' .$post->id. '" >';
        })

        ->addColumn("action", function($post){
            return '<a class="btn btn-primary btn-xs" href="'. url('admin/post/edit/' . $post->id) .'">Edit</a>
                    <a class="btn btn-danger btn-xs" href="'. url('admin/post/delete/' . $post->id) .'">Delete</a>';
        })

        ->addColumn("category_names", function($post){
            foreach($post->category() as $category)
                {
                    $category_name[] = $category->name;
                }
            return $category_name;                
        })
        ->editColumn('body', function($post) {
            return str_limit($post->body, 15);
        });
        
        // if ($keyword = $request->get('search')['value']) {
        //     $datatables->filterColumn('rownum', 'whereRaw', '@rownum + 1 like ?', ["%{$keyword}%"]);
        // }       
        return $datatables->make(true);
    }
    public function getMultiFilterSelect()
    {
        return view('datatables.eloquent.multi-filter-select');
    }

    public function getMultiFilterSelectData()
    {
        $posts = Post::select(['id', 'title', 'body','created_at']);

        return DataTables::of($posts)->make(true);
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if(!empty($request->input('categories')))
        {
            $post->categories = implode(",", $request->input('categories'));
        }
        
              
        // START
        if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $imageName = "no_image.png";
        }   
        else
        {
            $errors= array();
            $file_ext = $request->file('file')->getClientOriginalExtension(); 
            $expensions= array("jpeg","jpg","png");
            if(in_array($file_ext,$expensions)=== false)
            {
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            if(empty($errors)==true)
            {
                $imageName = time() . '.' . $file_ext;
            }
            else
            {
                print_r($errors);
                $imageName = "no_image.png";
            }
        }
        if($imageName != "no_image.png")
        { 
         $request->file('file')->move(base_path() . '/public/images/', $imageName);
        }       
        // END
        $post->imageName = $imageName;
        $post->save();
        
        $post->find($post->id);
        $post->cat()->attach($request->input('categories'));
        return redirect('admin/posts')->with('success', 'Post Created');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }  

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required', 
            'body'=>'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if(!empty($request->input('categories')))
        {
            $post->categories = implode(",", $request->input('categories'));
        }
        if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $imageName = $post->imageName;
        }  
        else{  
            $imageName = time(). '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(base_path() . '/public/images/', $imageName);
        }
        $post->imageName = $imageName;
        $post->save();               
        return redirect('admin/posts')->with('success', 'Post Edited');
    }
    
    public function delete($id)
    {
        $post = Post::find($id);
        $post->find($id);
        $post->cat()->detach();
        $post->delete();
        
        return redirect('admin/posts');
    }

    public function dltall(Request $request)
    {
        if(!$request->has('selected_cat_id') || empty($request->input('selected_cat_id'))) {
            return back()->withError("Selection required!");
        }
        //$id = $request->input('selected_cat_id');
                    
        $post = Post::whereIn('id', $request->input('selected_cat_id'));
        $post->delete();

        return back()->withMessage("Deleted successfully!");
    } 



}
