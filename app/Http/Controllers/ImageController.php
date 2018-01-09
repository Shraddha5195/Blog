<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

class ImageController extends Controller
{
	   public function index()
	   {
		 ob_get_clean();
	    
        //return Image::make('images/nature1.jpg')->response('png');
        $img = Image::make(public_path() . '/cat.jpg')->resize(300, 200);
        return $img->response();

        
    }
}

