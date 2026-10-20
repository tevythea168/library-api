<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookAuthor;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    public function index()
    {
        return BookAuthor::all();
    }

    public function store(Request $request)
    {
        return BookAuthor::create($request->all());
    }

    public function show(string $id)
    {
        return BookAuthor::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $bookAuthor = BookAuthor::findOrFail($id);

        $bookAuthor->update($request->all());

        return $bookAuthor;
    }

    public function destroy(string $id)
    {
        BookAuthor::destroy($id);

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
