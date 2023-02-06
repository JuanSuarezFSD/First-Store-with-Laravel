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

        <form  action="{{ route('admin.products.update', $viewData['product']->getId()) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="name"  type="text" class="form-control" value="{{$viewData['product']['name']}}">
                </div>
            </div>
            </div>
            <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="price" type="number" class="form-control" value="{{$viewData['product']['price']}}">
                </div>
            </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" name="description" rows="3">{{$viewData['product']['name']}}</textarea>
        </div>
        <div>
            @csrf
				<div class="mb-3">
				  	<label class="form-label">Adjunta una imagen:</label>
					<input type="file" class="form-control" name="image">
				</div>
        <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        <a href="{{route('admin.products.index')}}" class="btn bg-secondary text-white">Volver</a>
    </div>
    </div>
@endsection
    