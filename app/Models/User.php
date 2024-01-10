<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends      =   ['profile_image_url', 'status_view'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'otp',
        'dealer_id',
        'profile_image',
        'password',
        'status'
    ];


    # Scope
    public function scopeActive($query){
        return $query->whereStatus(1);
    }
    # End Scope

    # Attributes
    public function getProfileImageUrlAttribute(){
        return asset('storage/users/profile-images/'.$this->profile_image);
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
