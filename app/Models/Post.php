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
    protected $fillable = [
        'content',
        'user_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'abstract',
    ];

    /**
     * Get the abstract, that is a shorter string of content.
     *
     * @return string
     */
    public function getAbstractAttribute ()
    {
        return substr($this->content, 0, 30) . '...';
    }

    /**
     * Get the diff for created at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        $value = new Carbon($value);
        $value = Carbon::now()->diffForHumans($value);
        return $value;
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * The users that belong to the post.
     */
    public function interactions()
    {
        return $this->belongsToMany('App\Models\User', 'interactions')->withPivot('reaction');
    }

    /**
     * Scope to get the post that doesnt have interactions
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithoutInteractions($query)
    {
        return $query->doesntHave('interactions');
    }

}
