<?php

namespace App\Http\Controllers;

use App\Models\Empreendimento;
use App\Models\Estado;
use App\Models\Cidade;
use Illuminate\Http\Request;

class EmpreendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empreendimento = Empreendimento::with(['estado','cidade'])->get();

        //$empreendimento = Empreendimento::latest()->paginate(5);

        return view('empreendimento.index', compact('empreendimento'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::orderBy('nome', 'ASC')->get();

        return view('empreendimento.create', compact('estado'));
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
            'nome' => 'required',
            'cidade_id' => 'required',
            'estado_id' => 'required',
            'valor_m2' => 'required',
            'data_entrega' => 'required',
        ]);

        Empreendimento::create($request->all());

        return redirect()->route('empreendimento.index')
            ->with('success', 'Novo empreendimento adicionado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function show(Empreendimento $empreendimento)
    {
        return view('empreendimento.show', compact('empreendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Empreendimento $empreendimento)
    {
        $estado = Estado::orderBy('nome', 'ASC')->get();
        $cidade = Cidade::where('estado_id','=',$empreendimento->estado_id)->orderBy('nome', 'ASC')->get();
        return view('empreendimento.edit', compact('empreendimento','estado','cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empreendimento $empreendimento)
    {
        $request->validate([
            'nome' => 'required',
            'cidade_id' => 'required',
            'estado_id' => 'required',
            'valor_m2' => 'required',
            'data_entrega' => 'required',
        ]);
        $empreendimento->update($request->all());

        return redirect()->route('empreendimento.index')
            ->with('success', 'Empreendimento atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empreendimento $empreendimento)
    {
        $empreendimento->delete();

        return redirect()->route('empreendimento.index')
            ->with('success', 'Empreendimento excluído com sucesso');
    }
}
