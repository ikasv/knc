<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
   
    protected $appends  =   ['fav_icon_url'];

    protected $fillable = [
        'site_name',
        'header_line',
        'top_header_text',
        'footer_text',
        'logo',
        'fav_icon',
        'address',
        'socialLinks',
        'disclaimer',
        'custom_css',
        'custom_js'
    ];

    public function getFavIconUrlAttribute(){
      	return asset("storage/site/$this->fav_icon");
    }
  
  	protected $casts 		= [
    								'socialLinks' 		=> 	'object'
    						];
}