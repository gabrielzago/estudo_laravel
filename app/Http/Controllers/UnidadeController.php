<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Empreendimento;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidade = Unidade::with('empreendimentos')->latest()->paginate(5);
        //$unidade = Unidade::latest()->paginate(5);

        return view('unidade.index', compact('unidade'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function empreendimento(Request $request, $empreendimento)
    {

        $unidade = Unidade::where("empreendimento_id", "=", $empreendimento)->latest()->paginate(5);

        return view('unidade.index', compact('unidade'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empreendimento = Empreendimento::orderBy('nome', 'ASC')->get();
        return view('unidade.create',compact('empreendimento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_apartamento' => 'required',
            'metragem' => 'required',
            'empreendimento_id' => 'required',
            'nome_torre' => 'required',
            'andar' => 'required',
        ]);

        Unidade::create($request->all());

        return redirect()->route('unidade.index')
            ->with('success', 'Nova unidade adicionado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        return view('unidade.show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        $empreendimento = Empreendimento::orderBy('nome', 'ASC')->get();
        return view('unidade.edit', compact('unidade','empreendimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidade $unidade)
    {
        $request->validate([
            'nome_apartamento' => 'required',
            'metragem' => 'required',
            'empreendimento_id' => 'required',
            'nome_torre' => 'required',
            'andar' => 'required',
        ]);
        $unidade->update($request->all());

        return redirect()->route('unidade.index')
            ->with('success', 'Unidade atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();

        return redirect()->route('unidade.index')
            ->with('success', 'Unidade excluída com sucesso');
    }

}
