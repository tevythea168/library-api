<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function store(Request $request)
    {
        return Author::create($request->all());
    }

    public function show(string $id)
    {
        return Author::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);

        $author->update($request->all());

        return $author;
    }

    public function destroy(string $id)
    {
        Author::destroy($id);

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
