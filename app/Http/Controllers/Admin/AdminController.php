<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\GeneratedQrCode;
use App\Models\Product;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;

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

    # Genearte QR Codes
    public function generate_qr_codes($id){

      $generatedQrCodesAlreadyExist         = GeneratedQrCode::whereProductId($id)->count();

      if($generatedQrCodesAlreadyExist):
        return back()->with('back_msg', '<div class="alert alert-danger">Qr codes already generated</div>');
      endif;

      $data           =   [];
      $product        =  Product::select('id', 'sku', 'quantity')->active()->findOrFail($id);

      if($product):
        $product->makeHidden('icon_image_url', 'featured_image_url', 'banner_image_url', 'status_view', 'status_label');
      endif;

      $qr_code_id     = "";
      for($i = 1; $i <= $product->quantity; $i++):
        $qr_code_id   = $product->sku.'_'.$i;
        $data[]       = ['product_id' => $product->id, 'qr_code_id' => $qr_code_id];

        # Check Directory
        $dir_path     = "./public/qr-codes/$product->sku";
        if(!is_dir($dir_path)):
          mkdir($dir_path, 0755, true);
        endif;
        # End Check Directory

        QrCode::size(300)->generate($qr_code_id, "$dir_path/$qr_code_id.svg");
      endfor;
  
      GeneratedQrCode::insert($data);
      return back()->with('back_msg', '<div class="alert alert-success">Qr codes successfully generated</div>');
    }
    # End Genearte QR Codes
    
    # View Genearte QR Codes
    public function view_generate_qr_codes($id){
      $product        =  Product::select('id', 'name','sku', 'quantity')->with('qr_codes:id,product_id,qr_code_id,status')->active()->findOrFail($id);

      if($product):
        $product->total_qr_code      = count($product->qr_codes);
        $product->makeHidden(['icon_image_url', 'featured_image_url', 'banner_image_url', 'status_label', 'status_view']);
      endif;

      $dir_path                       =   "qr-codes/$product->sku";
      $files                          =   Storage::disk('_public_')->files($dir_path);

      $product->qr_code_files         =   $files;

      return view('admin.store.products.qr-code-view', compact('product'));
    }
    # End View Genearte QR Codes

    # Download Genearte QR Codes
    public function download_generate_qr_codes($id){
      $product        =  Product::select('id', 'name','sku', 'quantity')->with('qr_codes:id,product_id,qr_code_id,status')->active()->findOrFail($id);

      if($product):
        $product->total_qr_code      = count($product->qr_codes);
        $product->makeHidden(['icon_image_url', 'featured_image_url', 'banner_image_url', 'status_label', 'status_view']);
      endif;

      $dir_path                       =   "qr-codes/$product->sku";
      $files                          =   Storage::disk('_public_')->files($dir_path);

      $product->qr_code_files         =   $files;

      $zipFileName                    =  "$product->sku-". date('Y-m-d') .'.zip';

      return $this->createZip($zipFileName, $product->qr_code_files);
    }
    # End Download Genearte QR Codes

    # Delete Genearte QR Codes
    public function delete_generate_qr_codes($id){
      $product        =  Product::select('id', 'name','sku', 'quantity')->with('qr_codes:id,product_id,qr_code_id,status')->active()->findOrFail($id);

      if($product):
        $product->total_qr_code      = count($product->qr_codes);
        $product->makeHidden(['icon_image_url', 'featured_image_url', 'banner_image_url', 'status_label', 'status_view']);
      endif;

      $qr_code_id_arr                    =   data_get($product->qr_codes, '*.id');

      if(count($qr_code_id_arr)):
        GeneratedQrCode::destroy($qr_code_id_arr);
        File::deleteDirectory(public_path("qr-codes/$product->sku"));
      endif;

      return back()->with('back_msg', '<div class="alert alert-success">Qr codes removed successfully.</div>');
    }
    # End Delete Genearte QR Codes
    
    public function createZip( $zipFileName = 'sample.zip', $filesToZip)
    {
        $zip = new ZipArchive;
       
        if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) === TRUE) {
           
            foreach ($filesToZip as $file) {
                
                $zip->addFile(public_path($file), basename($file));
            }

            $zip->close();

            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        } else {
            return "Failed to create the zip file.";
        }
    }
}
