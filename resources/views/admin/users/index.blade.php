@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped" id="user_table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Fecha verificación email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->email_verified_at }}</td>
                                            <td>
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
            $('#user_table').DataTable({
                language: {
                    processing: "Cargando...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Mostrar _MENU_ elementos",
                    info: "Mostrando _START_ a _END_ en _TOTAL_ elementos",
                    infoEmpty: "Mostrando elemento 0 a 0 de 0 elementos",
                    infoFiltered: "(filtrado por _MAX_ elementos en total)",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No hay elementos para mostrar",
                    emptyTable: "No hay datos disponibles en la tabla",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ":  permite ordenar la columna en orden ascendente",
                        sortDescending: ": habilitar para ordenar la columna en orden descendente"
                    }
                }
            });
        });
    </script>
@endsection
