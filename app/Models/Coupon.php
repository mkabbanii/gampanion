<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Coupon extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'coupons';

    const IS_VALID_RADIO = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    protected $dates = [
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'points',
        'is_valid',
        'end_date',
        'quantity',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
