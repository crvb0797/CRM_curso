@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Proyectos</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            {{-- Alerta de creación de usuario --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Nuevo Proyecto <i
                                    class="fa-solid fa-plus"></i></a>

                            <table class="table table-bordered table-hover table-striped" id="project_table">
                                <thead>
                                    <tr>
                                        <th>Proyecto</th>
                                        <th>escripción</th>
                                        <th>Fecha Limite</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->deadline }}</td>
                                            <td>{{ $project->status}}</td>
                                            <td>{{ $project->user->name}}</td>
                                            <td>{{ $project->client->contact_name}}</td>
                                            <td>
                                                {{-- Editar usuario --}}
                                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                    class="btn btn-primary">Editar <i class="fa-solid fa-user-pen"></i></a>
                                                    
                                                {{-- Eliminar usuario --}}
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                    id="delete_form" method="POST"
                                                    onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-danger" value="Eliminar">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#project_table').DataTable();
        });
    </script>
@endsection
