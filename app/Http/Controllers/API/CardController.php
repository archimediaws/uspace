<?php

namespace App\Http\Controllers\API;

use App\Card;
use App\Http\Resources\Card as CardResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
	public $users;
	private $apiflag = true;

	public function __construct(){
//		//restriction Auth
//		$this->middleware('auth');
		$this->users = User::all();
	}



	/**
	 * Display a listing of the resource.
	 * @var $flag indicate data from API Route
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
    public function index()
    {
	    $cards = Card::get();
	    $user = Auth::user();
		$users =  $this->users;
		$apiflag = $this->apiflag;

//	    return CardResource::collection($cards);

	    return view('cards.index', compact('cards','user', 'users', 'apiflag'));
    }

	public function apiAllcards()
	{
		$cards = Card::get();
//		$user = Auth::user();
//		$users =  $this->users;
//		$apiflag = $this->apiflag;

		return CardResource::collection($cards);

//	    return view('cards.index', compact('cards','user', 'users', 'apiflag'));
	}


	/**
	 * Display list of cards auth user
	 */

	public function getCardsByUser()
	{
	    $cards = auth()->user()->cards;
		$user = Auth::user();
		$users = $this->users;
		$apiflag = false;
//	    return response()->json([
//		    'success' => true,
//		    'data' => $cards
//	    ]);

		return view('cards.index', compact('cards', 'user', 'users', 'apiflag'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return CardResource
	 */
    public function store(Request $request)
    {
	    //
	    $card = new Card;
	    $card->user_id = $request->user_id;
	    $card->title = $request->title;
	    $card->contenu = $request->contenu;
	    $card->save();
	    return new CardResource($card);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return CardResource
	 */
    public function show($id)
    {
	    $card = Card::findOrFail($id);
	    return new CardResource($card);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return CardResource
	 */
    public function update(Request $request, $id)
    {
	    $card = Card::findOrFail($id);
	    $card->title = $request->title;;
	    $card->contenu = $request->contenu;
	    $card->save();
	    return new cardResource($card);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return CardResource
	 */
    public function destroy($id)
    {
	    $card = Card::findOrFail($id);
	    $card->delete();
	    return new CardResource($card);
    }
}
