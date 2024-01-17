<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends          =   [   'icon_image_url', 
                                        'featured_image_url', 
                                        'banner_image_url', 
                                        'status_label', 
                                        'status_view',
                                     	// 'sub_categories' 
                                    ];

    protected $fillable = [
        'name',
        'category_ids',
        'slug',
        'quantity',
        'icon',
        'featured_image',
        'banner_image',
        'short_description',
        'long_description',
        'show_on_menu',
        'show_on_home',
        'show_on_footer',
        'status',
        'meta_title',
        'meta_description',
      	'is_featured',
      	'is_popular',
        'sku',
        'dimensions',
        'finishing',
        'mrp',
        'sale_price',
        'packing',
        'points'
    ];
    
    protected function getNameAttribute($val){
        return str()->title($val);
    }
    
    # Scope
    public function scopeActive($query){
        return $query->where('status', 1);
	}

    # End Scope
    
    # Attributes
        public function getIconImageUrlAttribute(){
            return $this->icon != '' ? asset('storage/product/icons/'.$this->icon) : asset('assets/img/placeholder-image.png');
        }

        public function getFeaturedImageUrlAttribute(){
            return $this->featured_image != '' ? asset('storage/product/featured_images/'.$this->featured_image) : asset('assets/img/placeholder-image.png');
        }

        public function getBannerImageUrlAttribute(){
            return $this->banner_image != '' ? asset('storage/product/banner_images/'.$this->banner_image) : '';
        }

        public function getStatusLabelAttribute(){
            return $this->status ? 'Active' : 'Deactive';
        }

        public function getStatusViewAttribute(){
            return $this->status ? '<span class="btn btn-success btn-sm">Active</span>' : '<span class="btn btn-danger btn-sm">Deactive</div>';
        }
      
  
    # End Attributes

    protected $casts    =   [
                                'quantity'      => 'int'
                            ];

    public function qr_codes(){
        return $this->hasMany(GeneratedQrCode::class);
    }
}
