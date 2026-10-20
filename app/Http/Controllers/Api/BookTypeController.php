<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    public function index()
    {
        return BookType::all();
    }

    public function store(Request $request)
    {
        return BookType::create($request->all());
    }

    public function show(string $id)
    {
        return BookType::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $bookType = BookType::findOrFail($id);

        $bookType->update($request->all());

        return $bookType;
    }

    public function destroy(string $id)
    {
        BookType::destroy($id);

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
