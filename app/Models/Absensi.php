<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensi extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'absensi';
    protected $fillable = [
        'id',
        'user_id',
        'date',
        'time_in',
        'time_out',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}