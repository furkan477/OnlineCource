<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
        'role',
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

    public function contacts()
    {
        return $this->hasMany(Contact::class,"user_id","id");
    }

    public function cources()
    {
        return $this->hasMany(Cource::class,"user_id","id");
    }

    public function carts()
    {
        return $this->hasMany(Card::class,"user_id","id");
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,"user_id","id");
    }

    public function examresults()
    {
        return $this->hasMany(ExamResult::class,"user_id","id");
    }

    public function certifica()
    {
        return $this->hasMany(Certifica::class,"user_id","id");
    }
}
