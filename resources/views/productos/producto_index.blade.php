@extends('plantilla')
@section('contenido')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> ADMINISTRACION DE PRODUCTOS</h4>
              </div>
              <div class="card-body">
                <a href="/nuevoProducto" class="btn btn-success">NUEVO REGISTRO</a>
                <a href="" class="btn btn-danger">REPORTE PDF</a>
                <a href="" class="btn btn-info">REPORTE EXCEL</a>
                <div class="table-responsive">
                  <table class="table" style="font-size:12px">
                    <thead class=" text-primary">
                        <tr>
                            <th>#</th>
                            <th>IMAGEN</th>
                            <th>ITEMS</th>
                            <th>CATEGORIA</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>STOCK</th>
                            <th>FECHA DE REG</th>
                            <th>ESTADO</th>
                            <th>ACCION</th>
                        </tr>
                     
                    </thead>
                    <tbody>
                        <?php $cont=1; foreach ($listado as $value){?>
                        <tr>
                            <td><?php echo $cont++ ?></td>
                            <td><?php echo $value->pro_imagen ?></td>
                            <td></td>
                            <td><?php echo $value->cat_nombre ?></td>
                            <td><?php echo $value->pro_nombre ?></td>
                            <td><?php echo $value->pro_descripcion ?></td>
                            <td><?php echo $value->pro_stock ?></td>
                            <td><?php echo $value->pro_fecha ?></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-primary">Editar</a>
                                <a href="" class="btn btn-primary">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        


@endsection