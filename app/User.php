<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public function replies(){
        return $this->hasMany(ChatReply::class);
    }

    public function friends(){
        return $this->hasMany(Friends::class);
    }

    /**
     * Friendship user was invited to.
     */

    public function friendsOf(){
        return $this->belongsToMany(User::class, Friends::class, 'friend_id', 'user_id');
    }

    /**
     * Friendship user asked for
     */
    public function friendsOfMine(){
        return $this->belongsToMany(User::class, Friends::class, 'user_id', 'friend_id');
    }

    public function friendRequests(){
        return $this->hasMany(FriendRequest::class, 'to_user_id');
    }

    public function getFriendsAttribute()
    {
        return $this->friendsOfMine->merge($this->friendsOf);
    }

    public function getFriendsPaginatedAttribute(){
        return $this->friends()->paginate(10);
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
