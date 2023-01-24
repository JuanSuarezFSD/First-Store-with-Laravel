@extends('layout.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row">
        @foreach ($viewData["products"] as $products)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
            <img src="{{$products["image"]}}" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="{{route('products.show', ['id' => $products['id']])}}"
                class="btn bg-primary text-white">{{$products["name"]}}</a>
            </div>
            </div>
        </div>
        @endforeach 
    </div>
  @endsection