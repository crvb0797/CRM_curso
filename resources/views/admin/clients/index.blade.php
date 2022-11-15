@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Clientes</h1>
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

                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-3">Nuevo Cliente <i
                                    class="fa-solid fa-user-plus"></i></a>

                            <table class="table table-bordered table-hover table-striped" id="client_table">
                                <thead>
                                    <tr>
                                        <th>Nombre del cleinte</th>
                                        <th>Email del cliente</th>
                                        <th>Teléfono del cliente</th>
                                        <th>Nombre de la empresa</th>
                                        <th>Dirección de la empresa</th>
                                        <th>Teléfono de la empresa</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->contact_name }}</td>
                                            <td>{{ $client->contact_email }}</td>
                                            <td>{{ $client->contact_phone_number }}</td>
                                            <td>{{ $client->company_name}}</td>
                                            <td>{{ $client->company_address}}</td>
                                            <td>{{ $client->company_phone_number}}</td>
                                            <td>
                                                {{-- Editar usuario --}}
                                                <a href="{{ route('admin.clients.edit', $client->id) }}"
                                                    class="btn btn-primary">Editar <i class="fa-solid fa-user-pen"></i></a>
                                                    
                                                {{-- Eliminar usuario --}}
                                                <form action="{{ route('admin.clients.destroy', $client->id) }}"
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
            $('#client_table').DataTable();
        });
    </script>
@endsection
