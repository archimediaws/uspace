<?php

namespace App\Http\Controllers\API;

use App\Card;
use App\Http\Resources\Card as CardResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
    public function index()
    {
	    $cards = Card::get();
	    return CardResource::collection($cards);
    }


	/**
	 * Display list of cards auth user
	 */

	public function getCardsByUser()
	{
	    $cards = auth()->user()->cards;

	    return response()->json([
		    'success' => true,
		    'data' => $cards
	    ]);


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
