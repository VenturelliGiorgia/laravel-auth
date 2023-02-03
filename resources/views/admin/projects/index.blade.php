@extends("layouts.app")

@section('content')
<div class="d-flex justify-content-between mt-3">

<h1> Lista fumetti</h1>
    <a href="{{ route('projects.create') }}"><button class="btn btn-info text-white"> Aggiungi</button></a>
</div>

<table class="table table-striped">
    <thead>
        <tr class="text-center">
            <th>Immagine</th>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Link Github</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>
                <div class="text-center">
                    <img style="width:50px" src="{{ asset('/storage/' . $project->cover_img) }}" alt=""></td>
                </div>
            <td>{{$project->name }}</td>
            <td>{{ Str::limit($project->description, 50) }}</td>
            {{-- <td> {{ $project->cover_img }}</td> --}}
             <td>{{ $project->github_link }}</td>
            <td>
                <a href="{{ route('projects.show', $project->id) }}" >
                    <button class="btn btn-info text-white">Show</button>
                </a>
            </td>
            <td>
                <a href="{{ route('projects.edit', $project->id) }}">
                    <button class="btn btn-info text-white">Edit</button>
                </a>
            </td>
            <td>    
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-form d-inline-block">
                    @csrf()
                    @method('delete')
                    <button class="btn btn-danger">Deleta</button>
                </form>
            </td>
        </tr>
        @endforeach  
    </tbody>
</table>


@endsection
