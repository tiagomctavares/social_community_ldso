<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_card',
        'birth_date',
        'description',
        'politics',
        'img_name',
        'interests',
    ];

    protected $dates = [
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function votingLocation()
    {
        return $this->belongsTo(VotingLocation::class);
    }

    /*
     * Basic validation function - for now
     */

    public function rules_on_update($user)
    {

        return [
            'email' => 'required|email|unique:users,email,'.$user->id,
            'description' => 'string|max:1500',
            'politics' => 'string|max:300',
            'img' =>  'dimensions:width=200,height=200',
            'interests' => 'string|max:255',
        ];

    }

}
