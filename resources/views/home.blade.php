@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
              <div class="card-header">{{ __('CRUD APP') }}</div>
                <div class="card-body">
                   <form action="{{route('home')}}" method="post">
                    @csrf
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4">Name</label>
                            <div class="col-md-8">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="category_name" placeholder="Category name">
                                {{-- @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror --}}
                            </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4">Description</label>
                            <div class="col-md-8">
                                <input id="description" class="form-control @error('description') is-invalid @enderror" type="text" name="description" placeholder="Description">
                            </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4">Price</label>
                            <div class="col-md-8">
                                <input id="price" class="form-control @error('price') is-invalid @enderror" type="text" name="price" placeholder="Price">
                            </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4"></label>
                            <div class="col-md-8">
                                <input class="form-control btn-success" type="submit" name="btn">
                            </div>
                      </div>
                   </form>
                   @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
              <div class="card-header">{{ __('CRUD APP') }}</div>
                    @if (session('update'))
                        <div class="alert alert-success" role="alert">
                            {{ session('update') }}
                        </div>
                    @endif
                    @if (session('deleted'))
                        <div class="alert alert-success" role="alert">
                            {{ session('deleted') }}
                        </div>
                    @endif
                <div class="card-body">
                   <table class="table">
                       <tr>
                           <th>SL</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Price</th>
                           <th>Action</th>
                       </tr>
                       @foreach($products as $product)
                       <tr>
                           <td>{{$product->name}}</td>
                           <td>{{$product->name}}</td>
                           <td>{{$product->description}}</td>
                           <td>{{$product->price}}</td>
                           <td>
                               <a href="{{route('edit',$product->id)}}" class="btn btn-info">Edit</a>
                               <a href="{{route('delete',$product->id)}}" class="btn btn-danger">Delete</>
                           </td>
                       </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
