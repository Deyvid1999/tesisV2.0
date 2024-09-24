@extends('layouts.caces')
@section('sidebar')
    @include('layouts.sidebar_inicio')
@endsection
@section('content')
    <div class="pagetitle">
        <h3>UNIVERSIDADES</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Universidades</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header pb-2">
            <h6 class="fw-normal text-pacifico text-uppercase">Universidades</h6>
        </div>
        <div class="card-body mt-3">
            <div class="row justify-content-between">
                @can('admin')
                    <div class="col-md-3">
                        <a type="button" class="btn btn-outline-pacifico mb-4 btn-sm"
                            href="{{ route('universidades.create') }}">
                            NUEVO REGISTRO
                        </a>
                    </div>
                @endcan
                <div class="col-md-4">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Tabla -->
            <div class="table-responsive">
                <table id="universidad" class="table table-hover align-middle text-uppercase pt-2 pb-2">
                    <thead class="table-pacifico">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">UNIVERSIDAD</th>
                            <th scope="col">CAMPUS</th>
                            <th scope="col">SEDE</th>
                            <th scope="col">CIUDAD</th>
                            <th scope="col">INFORME</th>
                            <th scope="col">ACCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($universidades as $universidad)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $universidad->universidad }}
                                </td>
                                <td>
                                    {{ $universidad->campus }}
                                </td>
                                <td>
                                    {{ $universidad->sede }}
                                </td>
                                <td>
                                    {{ $universidad->ciudad }}
                                </td>
                                <td class="text-center">
                                    @isset($universidad)
                                        @if ($universidad->informe != '')
                                            <a class="text-black" title="Descargar"
                                                href="{{ asset('storage/app/public') . '/' . $universidad->informe }}"
                                                download="{{ 'Informe' }}"><i class="bi bi-file-pdf"
                                                    style="font-size: 15px"></i>
                                            </a>
                                        @else
                                            <i class="bi bi-x-circle-fill text-eliminar"></i> No disponible
                                        @endif
                                    @endisset
                                </td>
                                
                                <td style="width: 160px;">
                                    <div class="nav fs-6">
                                        @can('admin')
                                            <a type="button" class="nav-link text-actualizar" title="Editar"
                                                href="{{ route('universidades.edit', $universidad->id) }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @endcan
                                        @can('admin')
                                            <form action="{{ route('universidades.destroy', $universidad->id) }}"
                                                method="POST" class="d-inline formulario-eliminar">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-eliminar" title="Borrar"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        @endcan
                                        <a type="button" class="nav-link text-crear" title="Ingresar"
                                            href="{{ route('evaluaciones.index', $universidad->id) }}">
                                            <i class="bi bi-box-arrow-in-right"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Fin Tabla -->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                iconColor: '#ff3547',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonColor: '#ff3547',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
        // DATA TABLE
        var table = new DataTable('#universidad', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
        });
        document.getElementById('universidades').classList.remove('collapsed');
    </script>
@endsection
