@extends('layouts.master')
@section('title','Add post')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-heard">
                <h4>Add Posts
                    <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/add-post')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Tags</label>
                        <input type="text" name="tags" data-provide="tag">
                    </div>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Hidden</label>
                                <input type="checkbox" name="status"/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="md-3">
                                <button type="submit" class="btn btn-primary float-end">Save Post</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
