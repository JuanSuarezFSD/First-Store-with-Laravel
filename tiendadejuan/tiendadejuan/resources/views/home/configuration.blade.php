@extends('layout.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <form action="{{route('home.session')}}" method="POST">
        @csrf
        <div class="row">
            
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Font:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                <select name="font">
                    @if (Session::has('font'))
                        <option selected hidden>{{Session::get('font')}}</option>                        
                    @endif

                    <option value="Arial, Helvetica, sans-serif">Arial</option>
                    <option value="Impact">Impact</option>
                    <option value="Verdana">Verdana</option>
                </select>
                </div>
            
            </div>
            
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Header Color:</label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    @if (Session::has('headerColor'))
                    <input name="headerColor" type="color" value="{{Session::get('headerColor')}}">
                    @else
                    <input name="headerColor" type="color" value="#130303">
                    @endif
                
                </div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
@endsection