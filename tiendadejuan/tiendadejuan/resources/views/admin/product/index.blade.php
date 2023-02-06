@extends('layout.admin')
@section('title', $viewData['title'])
@section('content')    
    <div class="card mb-4">
    <div class="card-header">
        Crear productos
    </div>
    <div class="card-body">

    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="name"  type="text" class="form-control">
                </div>
            </div>
            </div>
            <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="price" type="number" class="form-control">
                </div>
            </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div>
            @csrf
				<div class="mb-3">
				  	<label class="form-label">Adjunta una imagen:</label>
					<input type="file" class="form-control" name="image">
				</div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    </div>

    <div class="card">
    <div class="card-header">
        Panel de control de productos
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>

            @foreach($viewData['products'] as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>
                        <form action="{{ route('admin.product.edit', $product->getId()) }}" method="GET">
                            @method('PUT')
                            <button class="btn btn-outline-info">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.products.delete',$product->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach           

        </tbody>
        </table>
    </div>
    </div>
@endsection

