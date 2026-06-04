<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'role', 'bio', 'photo', 'order', 'is_active',
        'email', 'linkedin', 'facebook',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? asset('images/' . $this->photo)
            : asset('images/default-avatar.jpg');
    }
}
