<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use App\User;
use App\Role;
use App\Country;
use App\Image;
use App\Video;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = new Post;
        $comment = new Comment;
        $user = new User;
        $role = new Role;
        $country = new Country;
        $image = new Image;
        $video = new Video;
        $tag = new Tag;

        $r = $role->find(1)->users()->orderBy('name')->get();
        $r = $user->find(1)->roles ;

        $r = $country->find(1)->posts->toArray();
        $r = $user->find(1)->image();

        $r = $post->find(1)->image->toArray();
        $r = $image->find(1)->imageable;

        $r = $video->find(1)->comments;
        $r = $post->find(1)->comments->toArray();

        $r = $post->find(1)->tags;

        $r = $comment->find(1)->commentable;

        $r = $tag->find(1)->videos;

        $r = $user->find(1)->posts()->has('comments')->get();
        $r = $post->has('comments.user')->get();

        $r = $post->withCount('comments')->where('id','7')->get();

        $r = Post::withCount(['comments'=>function ($query) {
            $query->where('user_id','=', '4');
        }])->get()->toArray();

        $r = $user->with(['posts'=>function($query){
            $query->where('title','like','Esse eos%');
        }])->get();
        return $r[1]->posts->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
