<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automations extends Model
{
    use HasFactory;

    protected $table = 'automations';
    protected $fillable = [
        'squad',
        'service',
        'environment',
        'total_feature',
        'total_scenario',
        'total_success',
        'total_pending',
        'total_failed',
        'sucess_rate',
        'duration',
        'url_report'
    ];
}
