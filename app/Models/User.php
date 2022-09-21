<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Repository;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'login',
        'photo_src'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }




    /**
     **
     ** Friends
     **
     * */

    public function friendsMeRequest() {
        return $this
            ->belongsToMany(User::class, 'friends', 'first_id', 'second_id')
            ->wherePivot('type', '=', 0);
    }

    public function friendsTheyRequest() {
        return $this
            ->belongsToMany(User::class, 'friends', 'second_id', 'first_id')
            ->wherePivot('type', '=', 0);
    }

    public function friends() {

        return $this->friendsMeRequest->merge($this->friendsTheyRequest);

    }

    public function requestsFromOthers() {
        $first = $this
            ->belongsToMany(User::class, 'friends', 'first_id', 'second_id')
            ->wherePivot('type', '=', 1)->get();

        $second = $this
            ->belongsToMany(User::class, 'friends', 'second_id', 'first_id')
            ->wherePivot('type', '=', -1)->get();

        return $first->merge($second);

    }

    public function requestsFromMe() {

        $first = $this
            ->belongsToMany(User::class, 'friends', 'first_id', 'second_id')
            ->wherePivot('type', '=', -1)->get();

        $second = $this
            ->belongsToMany(User::class, 'friends', 'second_id', 'first_id')
            ->wherePivot('type', '=', 1)->get();

        return $first->merge($second);
    }

    public function requestsProfile() {
        return [
            $this->requestsFromOthers(),
            $this->requestsFromMe()
        ];
    }

    public function relationCheck(User $user) {
        if($this->friends()->contains($user)) {
            return 0;
        }else if($this->requestsFromOthers()->contains($user)) {
            return 1;
        }else if($this->requestsFromMe()->contains($user)) {
            return -1;
        }

        return -2;
    }


    // UPDATE `friends` SET `type`='2' WHERE `first_id` = 1 AND `second_id` = 2 AND `type` = 0

//    public function updateRelation(User $user, $relation) {
//        $oldRelation = User::find(Auth::id())->relationCheck($user);
//
//        if($oldRelation == )
//        DB::update("UPDATE `friends` SET `type`='?' WHERE `first_id` = ? AND `second_id` = ? AND `type` = ?", [
//            $relation,
//
//        ]);
//    }

    public function shortcodes() {
        return $this->hasMany(Shortcode::class);
    }

    public function repositories() {
        return $this->hasMany(Repository::class);
    }

    public function isOnline() {
        if(Carbon::now() > Carbon::parse($this->last_seen)->addMinutes(2)) return false;
        return true;
    }

    public function getPhoto() {
        if($this->photo_src === null) {
            return Storage::disk('avatars')->url('user.png');
        }
        return Storage::disk('avatars')->url($this->photo_src);
    }

}
