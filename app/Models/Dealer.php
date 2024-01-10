<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dealer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $appends      =   ['profile_image_url', 'status_view'];

    protected $fillable     =   [
                                    'sales_executive_id',
                                    'name',
                                    'email',
                                    'mobile',
                                    'otp',
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
        $status_view                            =   '';
        
        switch($this->status):
            case 1:
                $status_view                            =   "<div class='btn btn-sm btn-success'>Approved</div>";
            break;
            
            case 2:
                $status_view                            =   "<div class='btn btn-sm btn-danger'>Rejcted</div>";
            break;

            default:
                $status_view                            =   "<div class='btn btn-sm btn-warning'>Pending</div>";
            break;
        endswitch;

        return $status_view;
    }
    # End Attributes

    protected $hidden = [
        'password'
    ];
     
}
