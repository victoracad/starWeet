<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'bio',
        'website',
        'location',
        'avatar_image',
        'cover_image',
    ];
    protected $table = 'users_profiles';
        /**
         * Get the user that owns the userProfile
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    
}
