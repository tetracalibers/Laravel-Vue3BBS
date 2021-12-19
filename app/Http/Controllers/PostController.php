<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bbs.index');
    }

    public function sendExistingComments() {
        header("Access-Control-Allow-Origin: *");  //CORS
        header("Access-Control-Allow-Headers: Origin, X-Requested-With");

        $comments = Post::all()->sortByDesc('id');
        $senddata = [];

        foreach ($comments as $comment) {
            $senddata[] = [
                'id' => $comment->id,
                'comment' => $comment->comment,
                'date' => $comment->created_at->format('Y/m/d H:i:s')
            ];
        }

        return $senddata;
    }

    public function contribute(Request $request)
    {
        header("Access-Control-Allow-Origin: *");  //CORS
        header("Access-Control-Allow-Headers: Origin, X-Requested-With");

        $post = new Post();

        $newPost = $request->all();
        $post->comment = $newPost['comment'];

        $post->save();

        $sendData = [
            'id' => $post->id,
            'comment' => $post->comment,
            'date' => $post->created_at->format('Y/m/d H:i:s')
        ];

        return $sendData;
    }
}
