<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    // Define the table name if it's different from the pluralized version of the model name
    protected $table = 'clubs';

    // Define the primary key if it's not 'id'
    protected $primaryKey = 'clubID';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'clubName',
        'clubDescription',
        'participantTotal',
        'clubCategory'
    ];

    // If your primary key is not an auto-incrementing integer, you can set these attributes
    public $incrementing = true;
    protected $keyType = 'int';
}
