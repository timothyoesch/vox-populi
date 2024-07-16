<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user can access the panel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        if (env("APP_ENV") === "local") {
            return true;
        } else {
            $allowedUserDomains = env("ALLOWED_USER_DOMAINS", "");
            $allowedUserDomains = explode(",", $allowedUserDomains);
            $userDomain = explode("@", $this->email)[1];
            return in_array($userDomain, $allowedUserDomains);
        }
    }
}
