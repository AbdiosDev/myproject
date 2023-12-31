<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;



class ControllerProducto extends Controller
{
    public function index(){
        //echo "mi controlador";
        //exit();
        //die();
        $menu=1;
        return view('inicio.inicio_index',compact('menu'));
    }

    public function adminProductos(){
/*
        SELECT categorias.cat_nombre,productos. * from productos
        INNER JOIN categorias on  productos.categoria_id=categorias.id
        WHERE productos.pro_estado<>'eliminar'
        ORDER BY productos.id DESC;
*/

        $listado=DB::table('productos')
        ->select('categorias.cat_nombre','productos.*')
        ->join('categorias','productos.categoria_id','=','categorias.id')        
        ->where('productos.pro_estado','<>','eliminar')
        ->orderBy('productos.id','DESC')->get();

        //print_r($listado);
        //var_dump($listado);
        //die();

        $menu=2;
        return view('productos.producto_index',compact('menu','listado'));

    }

    public function nuevoProducto(){
        $categorias=DB::table('categorias')
        ->where('categorias.cat_estado','=','activo')->get();
        $menu=2;
        return view('productos.nuevoProducto',compact('menu','categorias'));

    }

    public function nuevoRegistroProducto(Request $request){
        $obj=new Producto();
        $obj->pro_nombre=mb_strtoupper($request->post('nombre'),'utf-8');
        $obj->pro_descripcion=mb_strtoupper($request->post('descripcion'),'utf-8');
        $obj->pro_stock=$request->post('stock');
        $obj->pro_item=$request->post('item');
        $obj->pro_fecha=date('Y-m-d');
        $obj->pro_estado='activo';
        $obj->categoria_id=$request->post('categoria_id');
        
        if($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombreimagen=Str::slug(date('ymdHs')).".".$imagen->guessExtension();
            $ruta=public_path('imagen_producto/');
            $imagen->move($ruta,$nombreimagen);
        }

        $obj->pro_imagen=$nombreimagen;
        $obj->save;

    }
}
