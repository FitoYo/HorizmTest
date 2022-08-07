<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{
    public function index()
    {
 
        $recuperoPosts = Http::get('https://jsonplaceholder.typicode.com/posts');

        $posts = $recuperoPosts->object();

        $i = 0;
        foreach($posts as $post){
            
            if($i < 50){
                $i++;

                $existePost = Post::where('user_id', $post->userId)->where('title', $post->title)->first();

                if($existePost){
                    $numeroTitle = str_word_count($post->title);
                
                    $numeroBody = str_word_count($post->body);
    
                    $rating = $numeroBody + ($numeroTitle * 2);

                    $existePost->body = $post->body;
                    $existePost->rating = $rating;

                    $existePost->save();

                }else{
                    $numeroTitle = str_word_count($post->title);
                
                    $numeroBody = str_word_count($post->body);
    
                    $rating = $numeroBody + ($numeroTitle * 2);
                    
                    $postGuardar = new Post;
                    
                    $postGuardar->id = $post->id;
                    $postGuardar->user_id = $post->userId;
                    $postGuardar->title = $post->title;
                    $postGuardar->body = $post->body;
                    $postGuardar->rating = $rating;
    
                    $postGuardar->save();
                }           
            }
        }

        $recuperoUsers = Http::get('https://jsonplaceholder.typicode.com/users');

        $usersAPI = $recuperoUsers->object();

        foreach($usersAPI as $userAPI){

            $tienePost = Post::where('user_id',$userAPI->id)->first();
      
            if($tienePost){
                
                $user = new User;
                
                $user->id = $userAPI->id;
                $user->name = $userAPI->name;
                $user->email = $userAPI->email;
                $user->city = $userAPI->address->city;

                $user->save();

            }
        }
       
        return view('index'); //, compact('users')

    }
}
