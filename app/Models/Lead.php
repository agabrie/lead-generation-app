<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Lead extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use  Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address_line_1',
        'address_line_2',
        'city',
        'province',
        'country',
        'postal_code',
        'consent_email_marketing',
        'consent_ts_and_cs',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }
}
