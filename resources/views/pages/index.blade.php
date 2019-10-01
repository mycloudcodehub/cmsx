@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Create New Page</h3>
                    <div class="ml-auto">
                        <a href="{{route('page.create')}}" class="btn btn-outline-primary ">Create New Page</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{session('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
                     
                    @foreach ($pages as $page)
                    <div class="media overflow-hidden mh-25">
                        <div class="media-body">
                        <h3><a href="{{route('page.show',$page->id)}}">{{ $page->title}}</a></h3>
                            {!! $page->body!!}
                        </div>
                    </div>
                    <hr/>  
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{$pages->links()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
