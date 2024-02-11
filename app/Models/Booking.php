<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'quote_id',
        'booking_date',
        'service_type',
        'address',
        'type_of_roof',
        'gutter_size',
        'window_qty',
        'solar_qty',
        'with_algae',
        'type_of_area',
        'area_size',
        'photos',
        'price',
        'comments',
        'status',
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
