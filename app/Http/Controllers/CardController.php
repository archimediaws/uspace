<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
	public function index()
	{
		$cards = auth()->user()->cards;

		return response()->json([
			'success' => true,
			'data' => $cards
		]);
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
