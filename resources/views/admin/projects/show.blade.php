@extends('layouts.app')

@section('content')
<div class="container my-5">

    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna alla lista</a>
    <hr>
    <h1>{{$project->title}}</h1>
    <div class="row g-5">
        <div class="col-12">
            <p>
                <strong>Descrizione:</strong><br>{{$project->description}}
            </p>
        </div>
        
        <div class="col-4">
            <p>
                <strong>Tipo:</strong><br>{!! $project->getTypeBadge() !!}
            </p>
        </div>

        <div class="col-4">
            <p>
                <strong>Slug:</strong><br>{{$project->slug}}
            </p>
        </div>
        
        
        
        <div class="col-4">
            <p>
                <strong>Url:</strong><br>{{$project->url}}
            </p>
        </div>
        
        
        
    </div>
</div>
@endsection