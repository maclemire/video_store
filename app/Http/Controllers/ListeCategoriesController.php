<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListeCategories;
use App\Http\Requests\UpdateCategoryRequest;

class ListeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ListeCategories::orderBy('created_at', 'DESC')->get();
        // $categories = ListeCategories::all();
        return view('pages.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:20|min:1'
        ]);
        $data = [
            'name' => $request->name,
            'created_at' => now()
        ];
        ListeCategories::create($data);
        return back()->with('status', 'Catégorie ajoutée');
    }

    public function destroy($id)
    {
        $category = ListeCategories::find($id);
        if (!$category) {
            abort(404);
        }
        $category->delete();
        return back()->with('status', "La catégorie a bien été supprimée");
    }

    public function edit(ListeCategories $category)
    {
        return view('pages.editCategory', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, ListeCategories $category)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:20|min:1'
        ]);

        $category->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);


        return redirect()
            ->route('categories.home')
            ->with('status', 'La catégorie a bien été éditée');
    }

}