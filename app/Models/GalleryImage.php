<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GalleryImage extends Model
{
    use HasFactory;

    protected $appends      =   [ 'full_url' ];

    protected $fillable = [
    	'type',
        'parent_id',
        'name'
    ];
    
    protected $visible = [
        'id',
    	'type',
        'parent_id',
        'name',
        'full_url'
    ];
   
    protected $hidden = [
    	'updated_at',
        'created_at'
    ];

    public function getFullUrlAttribute(){

        return  $this->type == 'category' ? asset('storage/category/gallery_images').'/'.$this->name : asset('storage/tour_packages/gallery_images').'/'.$this->name;
    }

    public function scopeType($query, $val){
        $query->whereType($val);
    }

}
