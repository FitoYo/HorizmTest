<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class RespuestaController extends Controller
{

    public function users()
    {
        $users = User::all();

        foreach($users as $user){
            $dividir=0;
            $sumar=0;
            foreach($user->posts as $post){
                $sumar = $sumar + $post->rating;
                $dividir++;

                unset($post->created_at);
                unset($post->updated_at);
                unset($post->rating);
            }
            $media = $sumar / $dividir;
            $user['media'] = $media;

            unset($user->created_at);
            unset($user->updated_at);
        }
        return $users->sortByDesc('media')->toJson();

    }

    public function postsTop()
    {
        $users = User::all();

        $respuesta=[];

        foreach($users as $user){

            $respuestaTop=[];

            $respuestaTop['id'] = $user->id;
            $respuestaTop['name'] = $user->name;
            $respuestaTop['post'] = $user->posts->sortByDesc('rating')->first();
            unset($respuestaTop['post']['created_at']);
            unset($respuestaTop['post']['updated_at']);
            unset($respuestaTop['post']['user_id']);

            $respuesta[] = $respuestaTop;
        }
        
        return json_encode($respuesta);

    }

    public function postsId($id)
    {

        $post = Post::join('users', 'users.id', '=', 'posts.user_id')->findOrFail($id);

        $post->id = $id;
        unset($post->user_id);
        unset($post->rating);
        unset($post->created_at);
        unset($post->updated_at);
        unset($post->email);
        unset($post->city);

        return $post->toJson();

    }

}
