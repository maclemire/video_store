<?php

namespace App\Http\Controllers;

use App\Models\Actors;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateActorsRequest;

class ActorsController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:2|string',
        ]);
        $data = [
            'name' => $request->name,
            'video_id' => $id
        ];
        Actors::create($data);

        return back()->with('status', 'Acteur ajouté');
    }

    public function destroy($id)
    {
        $actor = Actors::find($id);

        if (!$actor) {
            abort(404);
        }
        $actor->delete();

        return back()->with('status', "L'acteur a bien été supprimé");
    }

    public function edit(Actors $actors)
    {
        return view('pages.editActors', compact('actors'));
    }

    public function update(UpdateActorsRequest $request, Actors $actors)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:100|min:1'
        ]);

        $actors->update([
            'name' => $request->name,
        ]);


        return back()->with('status', "L'acteur a bien été modifié");
    }
}
