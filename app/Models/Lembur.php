<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembur extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lembur';
    protected $fillable = [
        'id',
        'user_id',
        'date',
        'time_start',
        'time_end',
        'duration',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}