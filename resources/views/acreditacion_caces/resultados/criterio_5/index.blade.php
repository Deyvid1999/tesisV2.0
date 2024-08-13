@extends('layouts.caces')
@section('sidebar')
    @include('layouts.sidebar_resultados')
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
        <h3>{{ $evaluacion->universidad->universidad }}</h3>
    </div>
    <h6>RESULTADOS DE EVALUACIÓN CACES 2023 PARA EL CRITERIO: {{ $criterio->criterio }}</h6>
    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-header text-white" style="background-color: #39389E">{{ $criterio->criterio }}</div>
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
    </div>
    <!-- Reports -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_5', $evaluacion->id) }} #indicador_27">INDICADOR 27:
                            GESTIÓN DE LA VINCULACIÓN CON LA SOCIEDAD</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_27"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_5', $evaluacion->id) }} #indicador_28">INDICADOR 28:
                            ARTICULACIÓN DE LA VINCULACIÓN CON LA SOCIEDAD CON LA DOCENCIA E INVESTIGACIÓN</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_28"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_5', $evaluacion->id) }} #indicador_29">INDICADOR 29:
                            PROYECTOS DE VINCULACIÓN CON LA SOCIEDAD</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_29"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('vinculacion').classList.remove('collapsed');
    </script>
    <script>
        var indicador_27 = [
            @foreach ($elementos_fundamental_27 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_27"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_27,
                }, ],
                chart: {
                    height: 250,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                },
                markers: {
                    size: 4
                },
                colors: ['#08403E'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0.8,
                        opacityFrom: 0.8,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 1
                },
                xaxis: {
                    type: 'numeric',
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                }
            }).render();

        });
    </script>
    <script>
        var indicador_28 = [
            @foreach ($elementos_fundamental_28 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_28"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_28,
                }, ],
                chart: {
                    height: 250,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                },
                markers: {
                    size: 4
                },
                colors: ['#706513'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0.8,
                        opacityFrom: 0.8,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 1
                },
                xaxis: {
                    type: 'numeric',
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                }
            }).render();

        });
    </script>
    <script>
        var indicador_29 = [
            @foreach ($elementos_fundamental_29 as $item)
                [{{ $item->id }}, {{ $item->ipv_porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_29"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_29,
                }, ],
                chart: {
                    height: 250,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                },
                markers: {
                    size: 4
                },
                colors: ['#06503E'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0.8,
                        opacityFrom: 0.8,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 1
                },
                xaxis: {
                    type: 'numeric',
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                }
            }).render();

        });
    </script>
@endsection
