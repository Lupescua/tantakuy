<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'competition_id',
        'title',
        'images',
        'meta_description',
    ];

    protected $casts = [
        'images' => 'array', // Store images as JSON
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function votes()
    {
        return $this->hasMany(SubmissionVote::class, 'submission_id');
    }
}
