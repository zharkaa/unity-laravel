<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index() {
        try{

            $user = User::where('id', 1)->with('book')->first();

            return response()->json([
                'message' => 'success',
                'data' => $user,
            ], 200);

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update() {
        // update book
        try {
            $book = Book::where('id', 1)->first();
            $book->title = 'Updated Title';
            $book->save();

            return response()->json([
                'message' => 'success',
                'data' => $book,
            ], 200);

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // update book title using user request
    public function updateBookTitle(Request $request) {
        try {
            $book = Book::where('id', $request->id)->first();
            $book->title = $request->title;
            $book->save();

            return response()->json([
                'message' => 'success',
                'data' => $book,
            ], 200);

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
