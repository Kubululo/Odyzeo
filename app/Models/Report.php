<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    protected $fillable = [
        'name',
        'email',
        'message',
        'filename'
    ];
}
