<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Http\Requests\storePostRequest;
use App\Mail\PostCreated;
use App\Mail\PostStored;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mail::raw('plain text message', function ($message) {
        //     $message->to('stp22800@gmail.com', 'Stephen');
        //     $message->subject('Subject');
        // });

    // NOTIFICATION
        // $user = User::find(1);
        // $user->notify(new PostCreatedNotification());
        // Notification::send(User::find(1), new  PostCreatedNotification());

        // echo('noti send');
        // exit();

        $data = Post::where('user_id', auth()->id())->latest()->get();

        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePostRequest $request)
    {
        // $post = new Post();
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();

        // Post::create([
        //     'name' => $request->name,
        //     'description' => $request->description, 
        //     'category_id' => $request->category,
        // ]);

        $validated =$request->validated();
        $post = Post::create($validated + ['user_id'=>Auth::user()->id]);

        event(new PostCreatedEvent($post));

        return redirect('/posts')->with('status', config('aprogrammer.message.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $this->authorize('view', $post);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);

        $categories = Category::all();

        return view('edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePostRequest $request, Post $post)
    {   
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();

        // $post->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'category_id' => $request->category_id,
        // ]);

        $validated = $request->validated();
        $post->update($validated);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
