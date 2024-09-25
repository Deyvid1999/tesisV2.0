@extends('layouts.caces')
@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('content')
<div class="pagetitle">
    <h3>ASIGNAR CRITERIOS</h3>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Asignar criterios</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-header pb-2">
        <h6 class="fw-normal text-pacifico text-uppercase">Lista Criterios</h6>
    </div>
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table id="universidad" class="table table-hover align-middle text-uppercase pt-2 pb-2">
                <thead class="table-pacifico">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">CRITERIO</th>
                        <th scope="col">RESPONSABLE</th>
                        <th scope="col">ASIGNAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($criterios as $criterio)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $criterio->criterio }}
                        </td>
                        <td>
                        <label>No Asignado</label>

                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#users" data-criterio-id="{{$criterio->id}}">ASIGNAR</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('acreditacion_caces.criteria-assignments.modal')
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#users').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var criterioId = button.data('criterio-id');

        var modal = $(this);
        modal.find('#criterioId').val(criterioId);
    });
</script>
@endsection