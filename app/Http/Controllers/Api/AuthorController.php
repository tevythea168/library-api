<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json(Author::all());
    }

   public function store(Request $request)
{
    $authorData = $request->except('photo');

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('authors', 'public');
        $authorData['photo'] = $path;
    }

    $author = Author::create($authorData);

    return response()->json([
        'success' => true,
        'message' => 'Author created successfully',
        'data' => $author
    ], 201);
}

    public function show(string $id)
    {
        $author = Author::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Author retrieved successfully',
            'data' => $author
        ], 200);
    }

   public function update(Request $request, string $id)
{
    $author = Author::findOrFail($id);

    $authorData = $request->except('photo');

    if ($request->hasFile('photo')) {

        if ($author->photo) {
            Storage::disk('public')->delete($author->photo);
        }

        $path = $request->file('photo')
                        ->store('authors', 'public');

        $authorData['photo'] = $path;
    }

    $author->update($authorData);

    return response()->json([
        'success' => true,
        'message' => 'Author updated successfully',
        'data' => $author
    ], 200);
}

    public function destroy(string $id)
    {
        Author::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ], 200);
    }
}
