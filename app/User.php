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

    // Search data manipulation
    public function toSearchableArray(){

        $array = [
            'id' => ucwords($this->id),
            'name' => $this->name,
        ];

        return $array;
    }

    public function channels(){
        return $this->hasMany(Channel::class, 'owner_id');
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }


    public function replies(){
        return $this->hasMany(ChatReply::class);
    }
    /*
    public function friends(){
        return $this->belongsToMany(User::class, Friends::class);
    }*/

    public function isFriend($id){
        return (bool) $this->getFriendsAttribute()->where('id', $id)->count();
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

    /**
     * Friendship requests user sent
     */

    public function sentRequests(){
        return $this->belongsToMany(User::class, FriendRequest::class, 'user_id', 'to_user_id');
    }

    /**
     * Friendship requests user received
     */
    public function receivedRequests(){
        return $this->belongsToMany(User::class, FriendRequest::class, 'to_user_id', 'user_id');
    }

    public function getFriendsAttribute()
    {
        return $this->friendsOfMine->merge($this->friendsOf);
    }

    public function getFriendRequestsAttribute()
    {
        return $this->sentRequests->merge($this->receivedRequests);
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
