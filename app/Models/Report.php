<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


/**
 * @mixin Builder
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $filename
 * @property string|null $message
 * @method static Report create(array $attributes = [])
 */
class Report extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * Fillable model attributes
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'message',
        'filename'
    ];
}
