<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id',
        'url',
        'description',
        'meta_description',
        'display_type',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
