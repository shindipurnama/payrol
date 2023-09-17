<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Izin extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'izin';
    protected $fillable = [
        'id',
        'user_id',
        'date',
        'date_from',
        'date_to',
        'duration',
        'notes',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}