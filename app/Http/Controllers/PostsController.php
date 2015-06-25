<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

/*     HTTP Response Codes     */
define('STATUS_OK', 200);
define('STATUS_CREATED', 201);
define('STATUS_NOT_FOUND', 404);
define('STATUS_UNPROC_ENTITY', 422);

class PostsController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
        $content = Post::all();
        $status = 200;
        return(new Response($content, STATUS_OK));
    }

    /**
     * Create a new post.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'author'    => 'required|max:255',
            'email'     => 'required|email',
            'subject'   => 'required|max:255',
            'body'      => 'required'
        ]);

        if ($v->fails()) {
            return(new Response(null, STATUS_UNPROC_ENTITY));
        }

        $newPost = Post::create([
            'author'    => $request->author,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'body'      => $request->body
        ]);
        return(new Response($newPost, STATUS_CREATED));
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $content = Post::find($id);
        if (is_null($content)) {
            return(new Response($content, STATUS_NOT_FOUND));
        } else {
            return(new Response($content, STATUS_OK));
        }
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return(new Response($post, STATUS_NOT_FOUND));
        } else {
            if ($request->has('author')) $post->author = $request->author;
            if ($request->has('email'))  $post->email = $request->email;
            if ($request->has('subject')) $post->subject = $request->subject;
            if ($request->has('body')) $post->body = $request->body;
            $post->save();
            return(new Response($post, STATUS_OK));
        }
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return(new Response($post, STATUS_NOT_FOUND));
        } else {
            $post->delete();
            return(new Response($post, STATUS_OK));
        }
    }
}
