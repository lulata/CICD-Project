<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required',
        ]);

        Note::create($request->all());

        return response()->json(['message' => 'Stored.']);
    }

    public function show($note)
    {
        return response()->json(Note::find($note));
    }

    public function update(Request $request, $note)
    {
        $request->validate([
            'data' => 'required',
        ]);

        $note = Note::find($note);

        if(is_null($note)) {
            return response()->json(['message' => 'Not Found.'], 404);
        }

        $note->update($request->all());

        return response()->json(['message' => 'Updated.']);
    }

    public function destroy($note)
    {
        $note = Note::find($note);

        if(is_null($note)) {
            return response()->json(['message' => 'Not Found.'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Deleted.']);
    }}
