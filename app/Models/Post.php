<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'lrvl_posts';

    protected $primaryKey = 'id';

    protected $fillable = [

        'title',
        'content',
        'user_id'
    ];

    /**
     * Function filtering date of posts.
     *
     */
    public function scopePublished($query){

        $query->where('created_at', '<=', Carbon::now());
    }

}
