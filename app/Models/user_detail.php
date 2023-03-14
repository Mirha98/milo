<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_detail extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address',
        'photo',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
