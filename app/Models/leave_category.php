<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_category extends Model
{
    use HasFactory;
    protected $table = 'leave_categories';
    protected $fillable = [
        'name',
    ];

    public function leave_application(){
        return $this->hasOne(leave_application::class,'category_id');
    }
}
