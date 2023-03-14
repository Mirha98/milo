<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_application extends Model
{
    use HasFactory;
    protected $table = 'leave_applications';
    protected $fillable = [
            'user_id',
            'category_id',
            'name',
            'description',
            'file',
            'start_date',
            'end_date',
            'duration',
            'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function leave_category(){
        return $this->belongsTo(leave_category::class,'category_id');
    }
}
