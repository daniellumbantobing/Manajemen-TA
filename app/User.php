<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }
    
    public function forum(){
        return $this->hasMany(Forum::class);
    }
    
    public function form(){
        return $this->hasMany(Form::class);
    }

    public function komentar(){
        return $this->hasMany(Komentar::class);
    }
     public function document(){
        return $this->hasMany(Documents::class);
    }
    public function kelompoks(){
    return $this->hasMany(Kelompok::class);
    }
}
