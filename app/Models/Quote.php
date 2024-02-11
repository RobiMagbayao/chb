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
        'address',
        'type_of_roof',
        'gutter_size',
        'with_gutter_length',
        'gutter_guard',
        'window_qty',
        'solar_qty',
        'with_algae',
        'type_of_area',
        'area_size',
        'price',
        'comments',
        'status',
    ];
}
