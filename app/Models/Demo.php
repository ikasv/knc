<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table        =   'demo';

    protected $appends      =   ['profile_image_url', 'status_view'];

    protected $fillable     =   [
                                    'employee_id',
                                    'name',
                                    'email',
                                    'mobile',
                                    'profile_image',
                                    'joining_date',
                                    'status',
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
     
}
