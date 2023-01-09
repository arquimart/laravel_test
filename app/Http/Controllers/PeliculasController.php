<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    /**
     * Where to redirect after any peliculas action.
     *
     * @var string
     *
     */
    protected $redirectTo = "/peliculas";

    /**
     * retrieve all movies
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('Peliculas.index', compact('peliculas'));
    }
    /**
     * view to create a new movie
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Peliculas.create');
    }
    /**
     * store a new movie
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $pelicula = Pelicula::create($request->all());
        return redirect($this->redirectTo);
    }
    /**
     * view to edit a movie
     *
     * @param Pelicula $pelicula
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Pelicula $pelicula)
    {
        return view('Peliculas.edit', compact('pelicula'));
    }
    /**
     * update a movie
     *
     * @param Request $request
     * @param Pelicula $pelicula
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->update($request->all());
        return redirect($this->redirectTo)->with('success', 'Pelicula guardada con éxito');
    }
    /**
     * delete a movie
     *
     * @param Pelicula $pelicula
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Pelicula $pelicula){
        $pelicula->delete();
        return back()->with('success', 'Pelicula eliminada con éxito');
    }
}
