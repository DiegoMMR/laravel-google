<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class ClientesController extends Controller
{

    protected $rules = [
        'nombre' => 'required|max:255',
        'email' => 'required|email',
        'direccion' => 'required|max:255',
        'telefono' => 'required|numeric',
        'ubicacion' => 'required|max:255'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(15);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
        $validator = Validator::make($req, $this->rules);

        if ($validator->fails()) {
            return redirect()->route('clientes.create')
                ->withErrors($validator)
                ->withInput();
        }

        Cliente::create($req);
        //toastr()->success('Cliente Creado Exitosamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $req = $request->all();
        $validator = Validator::make($req, $this->rules);

        if ($validator->fails()) {
            return redirect()->route('clientes.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $cliente = Cliente::find($id);

        $cliente->update($req);
        //toastr()->success('Cliente Actualizado');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function clima($id)
    {
        $cliente = Cliente::find($id);

        //dd($cliente);

        $client = new Client();
        $api_url = Config('wheather.api_url');
        $api_key = Config('wheather.api_key');

        $url = $api_url . '?q=' . $cliente->ubicacion . '&APPID=' . $api_key . '&lang=sp';
        //dd($url);

        $response = $client->get($url);

        $clima = json_decode((string) $response->getBody());
        //dd($clima);

        return view('clientes.clima', compact('clima', 'cliente'));

    }
}
