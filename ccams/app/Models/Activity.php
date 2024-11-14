<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id'; // Set ac_id as the primary key
    public $incrementing = true; // Indicate it's an auto-incrementing key
    protected $keyType = 'int'; // Set the key type to integer

    protected $fillable = [
        'activity_name',
        'location',
        'date_time',
        'description',
        'participants',
        'poster',
        'category',
        'duration',
       // 'club_id' // Assuming you want to associate activities with clubs
    ];

    // This method ensures Laravel uses 'ac_id' for route model binding
    public function getRouteKeyName()
    {
        return 'activity_id';
    }
}
