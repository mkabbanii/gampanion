<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Order extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'orders';

    protected $dates = [
        'approved_at',
        'rejected_at',
        'proposed_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'game_id',
        'user_id',
        'status_id',
        'amount_deducted_from_user',
        'amount_earned_by_provider',
        'note',
        'gampanion_id',
        'quantity',
        'approved_at',
        'rejected_at',
        'proposed_time',
        'request_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    //protected $hidden = ['amount_earned_by_provider']; 

    protected $columns = array('id','amount_deducted_from_user','game_id', 'user_id','status_id','amount_earned_by_provider','note','gampanion_id','quantity','approved_at', 'rejected_at', 'proposed_time', 'request_note', 'created_at','updated_at', 'deleted_at');
    public function scopeExclude($query,$value = array()) 
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function gampanion()
    {
        return $this->belongsTo(Gampanion::class, 'gampanion_id');
    }

    public function getApprovedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setApprovedAtAttribute($value)
    {
        $this->attributes['approved_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRejectedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRejectedAtAttribute($value)
    {
        $this->attributes['rejected_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProposedTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setProposedTimeAttribute($value)
    {
        $this->attributes['proposed_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
