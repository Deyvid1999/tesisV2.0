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
                            @if ($total_criterio_6 >= 80)
                                <i class="bi bi-check-circle-fill text-actualizar" style="font-size: 40px"></i>
                            @else
                                <i class="bi bi-exclamation-circle-fill alerta" style="font-size: 40px"></i>
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <h2 style="font-size: 40px; color:{{ $total_criterio_6 >= 80 ? '#00c851' : '#ff3547' }}">
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
    </div>
    <!-- Reports -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_6', $evaluacion->id) }} #indicador_30">INDICADOR 30:
                            ASEGURAMIENTO DE LA CALIDAD INSTITUCIONAL</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_30"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_6', $evaluacion->id) }} #indicador_31">INDICADOR 31:
                            AUTOEVALUACIÓN INSTITUCIONAL</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_31"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_6', $evaluacion->id) }} #indicador_32">INDICADOR 32:
                            PLAN DE MEJORA INSTITUCIONAL</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_32"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('gestion_calidad').classList.remove('collapsed');
    </script>
    <script>
        var indicador_30 = [
            @foreach ($elementos_fundamental_30 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_30"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_30,
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
                colors: ['#520120'],
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
        var indicador_31 = [
            @foreach ($elementos_fundamental_31 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_31"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_31,
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
        var indicador_32 = [
            @foreach ($elementos_fundamental_32 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_32"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_32,
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
@endsection
