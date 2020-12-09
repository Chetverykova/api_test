<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'author_id');
    }

    public static function getActiveUsers()
    {
        $users = User::where('active', '=', 1)
                ->with([
                    'posts' => function ($query) {
                        $query->where('deleted_at','=', null);
                        //6.3 sort posts by comments amount
                        $query->withCount('comments')->orderBy('comments_count', 'desc');
                        $query->with(['image']);
                        return $query;
                    }
                ])->get();
        
        return $users;
    }

    //7.1 SQL option
    public static function getUsersSQLComents($user_id)
    {
        $comments = DB::select('SELECT * FROM comments LEFT JOIN posts ON posts.id = comments.post_id 
        WHERE posts.image_id IS NOT NULL AND commentator_id = ? ORDER BY comments.created_at DESC', 
        array($user_id));

        return $comments;
    }

    //7.1 Query Builder option, 7.2 Eager Loading, Lazy Loading
    public static function getUsersQueryBuilderComents($user_id)
    {
        $comments = Comment::where('commentator_id', '=', $user_id)
        ->orderBy('created_at', 'desc')
        ->get();

        $comments->load([
            'post' => function ($query) {
                $query->where('image_id', '!=', null);
                return $query->with(['image']);
            }
        ]);

        return $comments;
    }
}
