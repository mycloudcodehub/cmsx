@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h3>Create New Page</h3>
                        <div class="ml-auto">
                        <a href="{{route('page.index')}}" class="btn btn-outline-primary btn-lg">Go back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('page.update',$page->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title"><h5>Title</h5></label>
                        <input type="text" name="title" class="form-control" value="{{old('title',$page->title)}}"/>
                        </div>
                        <div class="form-group">                        
                            <label for="Page Body"><h5>Page  Body</h5></label>
                            <textarea id="summernote" name="body" rows="10" class="form-control">{!! $page->body !!}</textarea>
                        </div>
                        <div class="form-group">                        
                            <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>

            </div>    
        </div>
    </div>
</div>
@endsection
