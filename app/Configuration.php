<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Configuration extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'key',
    ];
}
