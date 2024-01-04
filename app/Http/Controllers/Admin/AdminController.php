<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Client\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
  
    public function remove_gallery_image(){
      $arr                = [];
      $id                 = request()->id;
      $gallery_image      = GalleryImage::findorFail($id);
      
      $arr                = $gallery_image->delete() ? ['status' => true, 'message' => "Record deleted successfully"]: ['status' => true, 'message' => "Some error occured"];

      return response()->json($arr);
    }
}
