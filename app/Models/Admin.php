<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'profile_photo',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Get profile photo URL
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo) {
            return asset('storage/profile-photos/admin/' . $this->profile_photo);
        }
        
        // Default avatar based on name initials
        $name = $this->name;
        $initials = '';
        $words = explode(' ', $name);
        
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper($word[0]);
                if (strlen($initials) >= 2) break;
            }
        }
        
        // Generate SVG avatar with initials
        $backgroundColor = $this->generateColorFromName($name);
        $textColor = '#FFFFFF';
        
        return 'data:image/svg+xml;base64,' . base64_encode(
            '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="' . $backgroundColor . '" />
                <text x="50" y="55" font-family="Arial, sans-serif" font-size="40" fill="' . $textColor . '" text-anchor="middle" dominant-baseline="central">' . $initials . '</text>
            </svg>'
        );
    }

    // Generate consistent color from name
    private function generateColorFromName($name)
    {
        $colors = [
            '#3B82F6', // Blue
            '#10B981', // Green
            '#8B5CF6', // Purple
            '#EF4444', // Red
            '#F59E0B', // Yellow
            '#EC4899', // Pink
            '#6366F1', // Indigo
            '#14B8A6', // Teal
        ];
        
        $hash = crc32($name);
        return $colors[$hash % count($colors)];
    }
}