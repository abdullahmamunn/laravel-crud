@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card">
              <div class="card-header">{{ __('Edit data') }}</div>
                <div class="card-body">
                   <form action="{{route('update-data',$singleData->id)}}" method="post">
                    @csrf
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4">Name</label>
                            <div class="col-md-8">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="category_name" value="{{$singleData->name}}">
                                {{-- @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror --}}
                            </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4">Description</label>
                            <div class="col-md-8">
                                <input id="description" class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{$singleData->description}}">
                            </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-form-label col-md-4">Price</label>
                            <div class="col-md-8">
                                <input id="price" class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{$singleData->price}}">
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
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
