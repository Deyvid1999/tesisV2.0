@extends('layouts.caces')
@section('sidebar')
    @include('layouts.sidebar_porcentajes')
@endsection
@section('content')
    <div class="pagetitle">
        <h3>PORCENTAJES DE LOS ELEMENTOS FUNDAMENTALES</h3>
    </div>


    <!-- Tabla -->
    <form action="{{ route('porcentaje.elementos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-md-3">
                <button type="submit" class="btn btn-crear mb-4"><i class="bi bi-check-circle"></i>
                    GUARDAR</button>
            </div>
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
        @foreach ($criterios as $criterio)
            @if (!$loop->last)
                <div class="card">
                    <div class="card-header pb-2">
                        <h6 class="fw-normal text-pacifico text-uppercase">{{ $criterio->criterio }} <span
                                class="text-danger">{{ $criterio->porcentaje }}</span></h6>
                    </div>
                    <div class="card-body mt-3">
                        @if ($criterio->subcriterios->isEmpty())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                No hay subcriterios registrados para este criterio.
                            </div>
                            @if ($criterio->indicadores->isEmpty())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    No hay indicadores registrados para este criterio.
                                </div>
                            @else
                                @foreach ($criterio->indicadores as $indicador)
                                    <h6>{{ $indicador->indicador }} <span
                                            class="text-danger">{{ $indicador->porcentaje }}</span></h6>
                                    <table class="table table-hover align-middle text-uppercase pt-2 pb-2">
                                        <thead class="table-pacifico">
                                            <tr>
                                                <th width=''>No</th>
                                                <th width=''>Elementos fundamentales</th>
                                                <th width='100px'>Porcentaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalElementos = count($indicador->elementosFundamentales);
                                            @endphp
                                            @foreach ($indicador->elementosFundamentales as $elementoFundamental)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $elementoFundamental->elemento }}</td>
                                                    <td><input
                                                            class="form-control form-control-sm {{ empty($elementoFundamental->porcentaje) ? 'alert-danger' : '' }} {{ $elementoFundamental->porcentaje != round($indicador->porcentaje / $totalElementos, 3) ? 'text-danger' : '' }}"
                                                            type="number" min=0 max=100 step="0.001"
                                                            name="{{ $elementoFundamental->id }}[porcentaje]"
                                                            value="{{ round($indicador->porcentaje / $totalElementos, 3) }}">
                                                        {{-- value="{{ isset($subcriterio->porcentaje) ? $subcriterio->porcentaje : round($criterio->porcentaje / $totalSubcriterios, 3) }}" --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @endif
                        @else
                            @foreach ($criterio->subcriterios as $subcriterio)
                                <h6>{{ $subcriterio->subcriterio }} <span
                                        class="text-danger">{{ $subcriterio->porcentaje }}</span></h6>
                                @foreach ($subcriterio->indicadores as $indicador)
                                    <h6>{{ $indicador->indicador }} <span
                                            class="text-danger">{{ $indicador->porcentaje }}</span></h6>
                                    <table class="table table-hover align-middle text-uppercase pt-2 pb-2">
                                        <thead class="table-pacifico">
                                            <tr>
                                                <th width=''>No</th>
                                                <th width=''>Elementos fundamentales</th>
                                                <th width='100px'>Porcentaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalElementos = count($indicador->elementosFundamentales);
                                            @endphp
                                            @foreach ($indicador->elementosFundamentales as $elementoFundamental)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $elementoFundamental->elemento }}</td>
                                                    <td><input
                                                            class="form-control form-control-sm {{ empty($elementoFundamental->porcentaje) ? 'alert-danger' : '' }} {{ $elementoFundamental->porcentaje != round($indicador->porcentaje / $totalElementos, 3) ? 'text-danger' : '' }}"
                                                            type="number" min=0 max=100 step="0.001"
                                                            name="{{ $elementoFundamental->id }}[porcentaje]"
                                                            value="{{ round($indicador->porcentaje / $totalElementos, 3) }}">
                                                        {{-- value="{{ isset($subcriterio->porcentaje) ? $subcriterio->porcentaje : round($criterio->porcentaje / $totalSubcriterios, 3) }}" --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </form>
    <!-- Fin Tabla -->

@endsection
@section('scripts')
    <script>
        document.getElementById('porcentaje_elementos').classList.remove('collapsed');
    </script>
@endsection
