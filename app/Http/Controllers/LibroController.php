<?php

namespace App\Http\Controllers;     

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile; 
use App\Models\Libro;
use App\Models\Categoria;
use App\Http\Requests\LibroRequest;
use App\Http\Requests\ValLibRequest; 

class LibroController extends Controller
{
    /*public function __construct(){
        $this -> middleware('auth'); 
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {  
        $libros = Libro::orderBy('id', 'asc') -> paginate(5); 
        return view('libros.index') -> with('libros', $libros); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroRequest $request)
    {
        $entrada = new Libro();
        $entrada -> codigo = $request -> get('codigo');
        $entrada -> nombre = $request -> get('nombre');
        $entrada -> resenia = $request -> get('resenia');
        $entrada -> isbn = $request -> get('isbn');
        $entrada -> cantidad = $request -> get('cantidad');
        $entrada -> precio = $request -> get('precio');
        if($archivo = $request -> file('imagen')){
            $nombre = $archivo -> getClientOriginalName();
            $archivo -> move('images/libros', $nombre);
            $entrada['imagen'] = $nombre;
        }
        $entrada -> save();

        $categoria = new Categoria();
        $categoria -> categoria = $request -> get('categoria');
        $categoria -> save();

        return redirect('/Books');

        /*$entrada = $request -> all();

        if($archivo = $request -> file('imagen')){
            $nombre = $archivo -> getClientOriginalName();
            $archivo -> move('images/libros', $nombre);
            $entrada['imagen'] = $nombre;
        }

        Libro::create($entrada);
        return redirect('/Books');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $libro = Libro::find($id);
        return view('libros.resenia', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        return view('libros.edit') -> with('libro', $libro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValLibRequest $request, $id) 
    {
        $entrada = $request -> all();

        if($archivo = $request -> file('imagen')){
            $nombre = $archivo -> getClientOriginalName();
            $archivo -> move('images/libros', $nombre);
            $entrada['imagen'] = $nombre;
        }

        $libro = Libro::find($id);
        $libro -> update($entrada);
        return redirect('Books') -> with('libro', $libro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro -> delete();
        return redirect('Books');
    }

}
