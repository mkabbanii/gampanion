<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Favorite extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'favorites';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'favorite_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user1()
    {
        return $this->belongsTo(User::class, 'user_id')
        ->select(array('id','name'));
    }

    public function favorite_user()
    {
        return $this->belongsTo(User::class, 'favorite_user_id');
    }
    public function favorite_user1()
    {
        return $this->belongsTo(User::class, 'favorite_user_id')
        ->select(array('id','name'));
    }
}
