<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $games = Game::all(); //eloquent
        return view('game.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1º generar el objeto
        $game = new Game($request->all());
        
        //2º 'intentar' guardar
        try {
            $result = $game->save();
            //3º si lo he guardado volver a 'añgun sitio': index, create
            $afterInsert = session('afterInsert', 'show games');
            $target = 'game';
            if ($afterInsert != 'show games') {
                $target = 'game/create';
            }
            return redirect($target)->with(['message'=>'The game has been saved']);
        } catch (\Exception $e) {
            //4º si no lo he  guardado volver a la pagina  anterior con sus datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The game has not been saved']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        return view('game.show', ['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        return view('game.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        try{
            $result = $movie->update($request->all());
            return redirect('game')->with(['message'=>'The game has been updated']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The game has not been updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        try {
            $game->delete();
            return redirect('game')->with(['message' => 'The game has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The game has not been deleted.']);
        }
    }
    function view(Request $request, $id) {
        $game  = Game::find($id);
        if ($game == null) {
            return abort(404);
        }
    }
}
