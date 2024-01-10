<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SalesExecutive extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $table        =   'sales_executive';

    protected $appends      =   ['profile_image_url', 'status_view'];

    protected $fillable     =   [
                                    'employee_id',
                                    'name',
                                    'email',
                                    'mobile',
                                    'otp',
                                    'profile_image',
                                    'joining_date',
                                    'status',
                                    'password'
                                ];
    
    # Scope
    public function scopeApproved($query){
        return $query->whereStatus(1);
    }
    # End Scope

    # Attributes
    public function getCreatedAtAttribute($val){
        return date('d F, Y', strtotime($val));
    }
    
    public function getProfileImageUrlAttribute(){
        return asset('storage/sales-executive/profile-images/'.$this->profile_image);
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
