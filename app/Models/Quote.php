<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $table = 'quotes';
    protected $fillable = [
        'user_id',
        'quote_date',
        'service_type',
        'property_address',
        'type_of_roof',
        'gutter_size',
        'gutter_length',
        'with_gutter_guard',
        'window_qty',
        'solar_qty',
        'with_algae',
        'type_of_area',
        'area_size',
        'photo',
        'quote',
        'comment',
        'status',
        'with_personal_info'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
