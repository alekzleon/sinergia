<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'age', 'city', 'occupation',
        'availability', 'skills', 'motivation', 'status',
    ];

    protected $casts = [
        'availability' => 'array',
        'skills'       => 'array',
    ];

    // Statuses: pending, reviewing, accepted, rejected
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
