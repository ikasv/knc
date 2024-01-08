<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dealer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $appends      =   ['profile_image_url', 'status_view'];

    protected $fillable     =   [
                                    'sales_executive_id',
                                    'name',
                                    'email',
                                    'mobile',
                                    'profile_image',
                                    'business_id',
                                    'business_name',
                                    'business_email',
                                    'business_mobile',
                                    'business_gst_number',
                                    'business_address',
                                    'status',
                                    'password'
                                ];
    
    # Scope
        public function scopeActive($query){
            return $query->whereStatus(1);
        }
    # End Scope

    # Attributes
    public function getProfileImageUrlAttribute(){
        return asset('storage/demo/profile-images/'.$this->profile_image);
    }

    public function getStatusViewAttribute(){
        return $this->status ? "<div class='btn btn-sm btn-success'>Active</div>" : "<div class='btn btn-sm btn-danger'>Deactive</div>";
    }
    # End Attributes

    protected $hidden = [
        'password'
    ];
     
}
