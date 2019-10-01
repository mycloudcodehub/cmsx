@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="mr-auto">
                        <a href="{{route('page.index')}}" class="btn btn-outline-primary btn-sm">Go back</a> 
                        </div>
                        <h3>{{$page->title}}</h3>
                        <div class="ml-auto">
                            <a href="{{route('page.edit',$page->id)}}" class="btn btn-outline-success btn-sm">Edit</a>
                            
                            {{-- <a href="{{route('page.destroy',$page->id)}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a> --}}
                            <form action="{{route('page.destroy',$page->id)}}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-outline-danger btn-sm"  onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $page->body!!} 
                </div>

            </div>    
        </div>
    </div>
</div>
@endsection
