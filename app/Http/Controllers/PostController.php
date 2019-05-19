<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
	private $flag = false;
	public function __construct(){

		//restriction Auth
		$this->middleware('auth');

	}


	public function allposts(){

		$posts = Post::all();
		$user =  Auth::user();
		$users = User::all();
		$flag = true;

		return view('posts.index', compact('posts', 'users', 'user', 'flag'));
	}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $posts = auth()->user()->posts;
	    $user =  Auth::user();
	    $users = User::all();
	    $flag = $this->flag;

	    return view('posts.index', compact('posts', 'user', 'users', 'flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
		$post = Post::all();
		$cat = Category::all();
	    return view( 'posts.create' , compact('post','cat'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function edit($id)
	{
		$post = auth()->user()->posts()->find($id);
		$cat = Category::all();

		return view('posts.edit', compact('post', 'cat'));
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, [
		    'title' => 'required',
		    'alias' => 'required',
		    'contenu' => 'required'

	    ]);

	    $post = new Post();
	    $post->title = $request->title;
	    $post->contenu = $request->contenu;
	    $post->alias = $request->alias;
	    $post->category_id = $request->category_id;
	    $post->user_id = auth()->id();

//	    $random = random_int(0, 99);
//
//	    $fimg_id = "$id-$random";$id = $post->user_id;
//	    $post->setFimg_IdAttribute($fimg_id);

//	    $post->fimg = $request->fimg;

	    if (auth()->user()->posts()->save($post))

		    return redirect()->back()->with('success', 'Votre article a bien été créé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $post = auth()->user()->posts()->find($id);

	    if (!$post) {
		    return response()->json([
			    'success' => false,
			    'message' => 'Post with id ' . $id . ' not found'
		    ], 400);
	    }

	    return response()->json([
		    'success' => true,
		    'data' => $post->toArray()
	    ], 400);
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
	    $post = auth()->user()->posts()->find( $id );

	    $this->validate( $request, [
		    'title'   => 'required',
		    'alias' => 'required',
		    'contenu' => 'required',
		    'category_id'=>'required'
	    ] );


	    if ( ! $post ) {
		    return response()->json( [
			    'success' => false,
			    'message' => 'post with id ' . $id . ' not found'
		    ], 400 );
	    }

	    $updated = $post->fill( $request->all() )->save();

	    if ( $updated ) {

		    return redirect()->back()->with( 'success', 'Cet article a été modifié !' );
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $post = auth()->user()->posts()->find($id);

	    if (!$post) {
//		    return response()->json([
//			    'success' => false,
//			    'message' => 'post with id ' . $id . ' not found'
//		    ], 400);

		    return redirect()->back()->with( 'success', 'Cet article n\'existe pas !' );
	    }

	    if ($post->delete()) {

		    return redirect()->back()->with( 'success', 'Cet article a été supprimé !' );
	    }
    }
}
