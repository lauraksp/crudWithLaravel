<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $client = Client::all();
        return ClientResource::collection($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        /*Os :: são do PHP e estão chamando metodo estatico de uma 
        det. classe sem precisar fazer a instância de um obj da classe.*/
        $client = Client::create($request->all()); 
        return new ClientResource($client); // retorna um - qual nome? arquivo? - com os novos clientes.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        //O -> é do PHP, utilizado p acessar propriedades ou métodos de um obj.//
        //Duvida que surgiu : existem objetos public, private ou protected?//
        /*O metodo update acessa as propriedades da variavel $client que serao 
        carregadas pelo metodo all no request.*/
        $client->update($request->all());
        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        /*Metodo delete acessa infos de $client
        fazendo det alteracao e retorna o code 204
        qe significa solicitacao bem sucedida e n precisa sair da pag.*/
        $client->delete();
        return response(null, 204);
    }
}
