@extends('layouts.master')
@section('title','Category')
@section('content')

    <div class="container-fluid px-4">



        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit tag </h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" rows="5" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>

                    <h6>Status Mode</h6>
                        <div class="col-md-3 mb-3">
                            <label>shown</label>
                            <input type="checkbox" name="shown"/>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Cartegory</button>
                        </div>

                    </div>







            </div>






            </form>

        </div>
    </div>

    </div>

@endsection
