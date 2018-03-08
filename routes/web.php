<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  use Illuminate\Http\Request;
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/myquery', function(){
        $categories = App\Category::all();
        $posts = App\Post::all();
        return view('myquery',compact('categories', 'posts'));
});
Route::get('/myquery2', function(){
        
        return view('myquery2');
});

Auth::routes();
Broadcast::routes(['middleware' => 'auth:admin']);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontendController@index');
Route::get('/post/{id}', 'FrontendController@show');
Route::post('/post/{id}', 'FrontendController@addcmnt');
Route::get('/categories', 'CategoryController@show');
Route::get('/category/{id}', 'CategoryController@posts');
Route::get('/form', function(){
        return view('inc.form');
});


//Route::get('/image', 'ImageController@index');

Route::middleware(['auth'])->prefix('admin')->group(function () {

        Route::get('/posts', 'PostController@index');
        Route::get('/post/create', 'PostController@create');
        Route::post('/post/create', 'PostController@store');
        Route::get('/post/edit/{id}', 'PostController@edit');
        Route::post('/post/edit/{id}', 'PostController@update');
        Route::get('/post/delete/{id}', 'PostController@delete');
        Route::post('/post/dltall', 'PostController@dltall');
        Route::get('/post/datatable', 'PostController@getRowNumData');
      
        Route::get('/categories', 'CategoryController@index');
        Route::post('/categories', 'CategoryController@store');
        Route::get('/categories/edit/{id}', 'CategoryController@edit');
        Route::post('/categories/edit/{id}', 'CategoryController@update');
        Route::get('/categories/delete/{id}', 'CategoryController@delete');
        Route::post('/categories/dltall', 'CategoryController@dltall');
       
        Route::get('/changepass', 'ChangePasswordController@index');
        Route::post('/changepass', 'ChangePasswordController@change');
        
        Route::get('/profile', 'UserController@profile');
        Route::post('/profile', 'UserController@update_avatar');
        
        Route::get('/timeline', 'TimelineController@index');
        Route::post('/timelinepost', 'TimelineController@store')->name('images.upload');

      

        Route::get('timeline/{t_id?}',function($t_id){
            $t = App\Timeline::find($t_id);
            return response()->json($t);
        });
        Route::post('timeline',function(Request $request){   
            $t = App\Timeline::create($request->input());
            return response()->json($t);
        });
        Route::put('timeline/{t_id?}',function(Request $request,$t_id){
            $t = App\Timeline::find($t_id);
            $t->content = $request->content;
            $t->save();
            return response()->json($t);
        });
        Route::delete('timeline/{t_id?}',function($t_id){
            $t = App\Timeline::destroy($t_id);
            return response()->json($t);
 

        });

});

Route::get('image', 'ImageController@index');
Route::get('/chat', 'ChatsController@index');
Route::get('/messages', 'ChatsController@fetchMessages');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

Route::get('/ajaxasp', function(){
        return view('asp2');
});