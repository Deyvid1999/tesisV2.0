@extends('layouts.caces')
@section('sidebar')
    @include('layouts.sidebar')
@endsection


<style>
    .alerta {
        animation-name: example-text;
        animation-duration: 1s;
        animation-iteration-count: infinite;
        color: red;
    }

    @keyframes example-text {
        0% {
            color: red;
        }

        50% {
            color: white;
        }

        100% {
            color: red;
        }
    }
</style>

@section('content')
    <div class="pagetitle">
        <h3>AUTOEVALUACIÓN {{ date('Y') }}</h3>
        <h3>El puntaje total de autoevaluación obtenido es
            @if (round(
                    ($total_criterio_1 +
                        $total_criterio_2 +
                        $total_criterio_3 +
                        $total_criterio_4 +
                        $total_criterio_5 +
                        $total_criterio_6) /
                        6,
                    2) >= 80)
                <samp style="color: green">
                    {{ round(($total_criterio_1 + $total_criterio_2 + $total_criterio_3 + $total_criterio_4 + $total_criterio_5 + $total_criterio_6) / 6, 2) }}%
                </samp>
            @else
                <span style="color: red">
                    {{ round(($total_criterio_1 + $total_criterio_2 + $total_criterio_3 + $total_criterio_4 + $total_criterio_5 + $total_criterio_6) / 6, 2) }}%
                </span>
            @endif
        </h3>
    </div>
    <div class="row justify-content-center">
        <div class="card pt-5 pb-3" style="width: 100%">
            <div class="row">
                <div class="col-md-4 text-center">
                    @isset($evaluacion->universidad->foto)
                        @if ($evaluacion->universidad->foto != '')
                            <img src="{{ asset('storage/app/public') . '/' . $evaluacion->universidad->foto }}" alt="foto"
                                width="auto" height="140px" title='foto'>
                        @endif
                    @else
                        <i class="bi bi-person-square" height="50px"></i>
                    @endisset
                    <div class="pagetitle pt-3">
                        <h3 class="text-uppercase">{{ $evaluacion->universidad->universidad }}</h3>
                        <p class="fs-6 text-uppercase">{{ $evaluacion->universidad->codigo_unico }}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text text-uppercase"><strong>Universidad:</strong>
                                    {{ $evaluacion->universidad->universidad }}</p>
                                <p class="card-text text-uppercase"><strong>Campus:</strong>
                                    {{ $evaluacion->universidad->campus }}</p>
                                <p class="card-text text-uppercase"><strong>Sede:</strong>
                                    <span class="text-uppercase">{{ $evaluacion->universidad->sede }}</span>
                                </p>
                                <p class="card-text text-uppercase"><strong>Ciudad:</strong>
                                    {{ $evaluacion->universidad->ciudad }}</p>
                                <p class="card-text text-uppercase"><strong>Fecha de evaluacion:</strong>
                                    {{ $evaluacion->universidad->fecha_evaluacion }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text text-uppercase"><strong>Facultad:</strong>
                                    {{ $evaluacion->universidad->facultad }}</p>
                                <p class="card-text text-uppercase"><strong>Departamento:</strong>
                                    {{ $evaluacion->universidad->departamento }}</p>
                                <p class="card-text text-uppercase"><strong>Evaluador:</strong>
                                    {{ $evaluacion->universidad->evaluadores }}</p>
                                <p class="card-text text-uppercase"><strong>Contraparte:</strong>
                                    {{ $evaluacion->universidad->contraparte }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        @can('criterio_1')
            <div class="col-sm-4">
                <div class="card mb-3">
                    <a href="{{ route('condiciones.institucionales.resultado', $evaluacion->id) }}">
                        <div class="card-header text-white" style="background-color: #008A94">CONDICIONES INSTITUCIONALES</div>
                    </a>
                    <div class="card-body pt-3" style="margin-top: 20px;">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                @if ($total_criterio_1 >= 80)
                                    <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                                @else
                                    <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <h2 style="font-size: 40px; color:{{ $total_criterio_1 >= 80 ? '#00c851' : '#ff3547' }}">
                                    {{ $total_criterio_1 }}%</h2>
                                <p>Puntaje eje de evaluación: <span class="text-danger">16.667 -> 100%</span></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $total_criterio_1 }}%; background-color: {{ $total_criterio_1 >= 80 ? '#00c851' : '#ff3547' }};"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $total_criterio_1 }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('criterio_2')
            <div class="col-sm-4">
                <div class="card mb-3">
                    <a href="{{ route('docencia.resultado', $evaluacion->id) }}">
                        <div class="card-header text-white" style="background-color: #AD2E0D">DOCENCIA</div>
                    </a>
                    <div class="card-body pt-3" style="margin-top: 20px;">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                @if ($total_criterio_2 >= 80)
                                    <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                                @else
                                    <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <h2 style="font-size: 40px; color:{{ $total_criterio_2 >= 80 ? '#00c851' : '#ff3547' }}">
                                    {{ $total_criterio_2 }}%</h2>
                                <p>Puntaje eje de evaluación: <span class="text-danger">16.667 -> 100%</span></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $total_criterio_2 }}%; background-color: {{ $total_criterio_2 >= 80 ? '#00c851' : '#ff3547' }};"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $total_criterio_2 }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('criterio_3')
            <div class="col-sm-4">
                <div class="card mb-3">
                    <a href="{{ route('personal.academico.resultado', $evaluacion->id) }}">
                        <div class="card-header text-white" style="background-color: #287C27">ACADÉMICO, APOYO ACADÉMICO Y
                            ESTUDIANTES</div>
                    </a>
                    <div class="card-body pt-3" style="margin-top: 20px;">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                @if ($total_criterio_3 >= 80)
                                    <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                                @else
                                    <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <h2 style="font-size: 40px; color:{{ $total_criterio_3 >= 80 ? '#00c851' : '#ff3547' }}">
                                    {{ $total_criterio_3 }}%</h2>
                                <p>Puntaje eje de evaluación: <span class="text-danger">16.667 -> 100%</span></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $total_criterio_3 }}%; background-color: {{ $total_criterio_3 >= 80 ? '#00c851' : '#ff3547' }};"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $total_criterio_3 }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('criterio_4')
            <div class="col-sm-4">
                <div class="card mb-3">
                    <a href="{{ route('investigacion.resultado', $evaluacion->id) }}">
                        <div class="card-header text-white" style="background-color: #7A287C">INVESTIGACIÓN E INNOVACIÓN</div>
                    </a>
                    <div class="card-body pt-3" style="margin-top: 20px;">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                @if ($total_criterio_4 >= 80)
                                    <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                                @else
                                    <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <h2 style="font-size: 40px; color:{{ $total_criterio_4 >= 80 ? '#00c851' : '#ff3547' }}">
                                    {{ $total_criterio_4 }}%</h2>
                                <p>Puntaje eje de evaluación: <span class="text-danger">16.667 -> 100%</span></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $total_criterio_4 }}%; background-color: {{ $total_criterio_4 >= 80 ? '#00c851' : '#ff3547' }};"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $total_criterio_4 }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('criterio_5')
            <div class="col-sm-4">
                <div class="card mb-3">
                    <a href="{{ route('vinculacion.resultado', $evaluacion->id) }}">
                        <div class="card-header text-white" style="background-color: #967a02">VINCULACIÓN CON LA SOCIEDAD
                        </div>
                    </a>
                    <div class="card-body pt-3" style="margin-top: 20px;">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                @if ($total_criterio_5 >= 80)
                                    <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                                @else
                                    <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <h2 style="font-size: 40px; color:{{ $total_criterio_5 >= 80 ? '#00c851' : '#ff3547' }}">
                                    {{ $total_criterio_5 }}%</h2>
                                <p>Puntaje eje de evaluación: <span class="text-danger">16.667 -> 100%</span></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $total_criterio_5 }}%; background-color: {{ $total_criterio_5 >= 80 ? '#00c851' : '#ff3547' }};"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $total_criterio_5 }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('criterio_6')
            <div class="col-sm-4">
                <div class="card mb-3">
                    <a href="{{ route('gestion.calidad.resultado', $evaluacion->id) }}">
                        <div class="card-header text-white" style="background-color: #39389E">SISTEMA DE GESTIÓN DE LA CALIDAD
                        </div>
                    </a>
                    <div class="card-body pt-3" style="margin-top: 20px;">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                @if ($total_criterio_6 >= 80)
                                    <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                                @else
                                    <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <h2 style="font-size: 40px;  color:{{ $total_criterio_6 >= 80 ? '#00c851' : '#ff3547' }}">
                                    {{ $total_criterio_6 }}%</h2>
                                <p>Puntaje eje de evaluación: <span class="text-danger">16.667 -> 100%</span></p>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $total_criterio_6 }}%; background-color: {{ $total_criterio_6 >= 80 ? '#00c851' : '#ff3547' }};"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $total_criterio_6 }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>

@endsection
@section('scripts')
    <script>
        document.getElementById('indicadores').classList.remove('collapsed');
    </script>
@endsection
