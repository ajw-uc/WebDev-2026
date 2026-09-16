<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['follower_user_id', 'following_user_id'])]
class Follow extends Model
{
    //
}
