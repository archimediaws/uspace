<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{

	public function __construct(){

		//restriction Auth
		$this->middleware('auth');

	}


	public function index()
	{
		$cards = auth()->user()->cards;
		$user =  Auth::user();
		$users = User::all();

//		dd($users);

//		return response()->json([
//			'success' => true,
//			'data' => $cards
//		]);

		return view('cards.index', compact('cards', 'user', 'users'));
	}

	public function create()
	{
		return view('cards.create');
	}


	public function show($id)
	{
		$card = auth()->user()->cards()->find($id);

		if (!$card) {
			return response()->json([
				'success' => false,
				'message' => 'Card with id ' . $id . ' not found'
			], 400);
		}

		return response()->json([
			'success' => true,
			'data' => $card->toArray()
		], 400);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'content' => 'required'
		]);

		$card = new Card();
		$card->title = $request->title;
		$card->contenu = $request->contenu;
		$card->user_id = auth()->id();

		if (auth()->user()->cards()->save($card))
			return response()->json([
				'success' => true,
				'data' => $card->toArray()
			]);
		else
			return response()->json([
				'success' => false,
				'message' => 'Card could not be added'
			], 500);
	}

	public function update(Request $request, $id)
	{
		$card = auth()->user()->cards()->find($id);

		if (!$card) {
			return response()->json([
				'success' => false,
				'message' => 'Card with id ' . $id . ' not found'
			], 400);
		}

		$updated = $card->fill($request->all())->save();

		if ($updated)
			return response()->json([
				'success' => true
			]);
		else
			return response()->json([
				'success' => false,
				'message' => 'Card could not be updated'
			], 500);
	}

	public function destroy($id)
	{
		$card = auth()->user()->cards()->find($id);

		if (!$card) {
			return response()->json([
				'success' => false,
				'message' => 'Card with id ' . $id . ' not found'
			], 400);
		}

		if ($card->delete()) {
			return response()->json([
				'success' => true
			]);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Card could not be deleted'
			], 500);
		}
	}



}
