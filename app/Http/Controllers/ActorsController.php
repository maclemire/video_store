<?php

namespace App\Http\Controllers;

use App\Models\Actors;
use Illuminate\Http\Request;

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

    public function destroy(Actors $id)
    {
        $actor = Actors::find($id);

        if (!$actor) {
            abort(404);
        }
        $actor->each->delete();

        return back()->with('status', "l'acteur a bien été supprimé");
    }
}
