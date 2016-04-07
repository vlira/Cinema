<?php

namespace Cinema\Http\Controllers;

/*Importar librerías*/
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use Cinema\User;
use Cinema\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{
    /*Generamos un constructor para usar un beforefilter, que es un filtro que se ejecuta antes de cualquier acción dentro de nuestro controlador*/
    public function __construct(){
        $this->beforefilter('@find',['only' => ['edit','update','destroy']]);
    }


    /*Generamos un mètodo para nuestro constructor, envía los atributos del usuario*/
    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(1);
        return view('usuario.index',compact('users'));

        /* Permite ver los usuarios eliminados
        $users = User::onlyTrashed()->paginate(1);
        return view('usuario.index',compact('users'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        /*
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
        */
        /*Forma sencilla*/
        User::create($request->all());

        Session::flash('message','Usuario Agregado Correctamente');
        return Redirect::to('/usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        Se sustituye
        $user = User::find($id);
        por e
        $this->user 
        en la variable $user
        ['user'=>$user]
        */
        return view('usuario.edit',['user'=>$this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserUpdateRequest $request)
    {
        /*
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        */

        $this->user->fill($request->all());
        $this->user->save();
        Session::flash('message','Usuario Editado Correctamente');
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $user = User::find($id);
        $user->delete();
        */
        $this->user->delete();
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
}
