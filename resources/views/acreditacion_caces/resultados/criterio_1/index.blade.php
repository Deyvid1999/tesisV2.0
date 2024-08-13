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
                <div class="card-header text-white" style="background-color: #008A94">{{ $criterio->criterio }}</div>
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
    </div>
    <!-- Reports -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_1">INDICADOR 1:
                            PLANIFICACIÓN INSTITUCIONAL</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_1"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_2">INDICADOR 2:
                            BIENESTAR UNIVERSITARIO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_2"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_3">INDICADOR 3:
                            INTERNACIONALIZACIÓN Y MOVILIDAD </a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_3"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_4">INDICADOR 4:
                            INFRAESTRUCTURA FÍSICA Y TECNOLÓGICA</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_4"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_5">INDICADOR 5:
                            GESTIÓN DE BIBLIOTECAS</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_5"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_6">INDICADOR 6:
                            GESTIÓN DOCUMENTAL Y DE ARCHIVO </a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_6"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_7">INDICADOR 7:
                            IGUALDAD DE OPORUNIDADES E INTERCULTURALIDAD</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_7"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_8">INDICADOR 8:
                            COGOBIERNO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_8"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_1', $evaluacion->id) }} #indicador_9">INDICADOR 9:
                            ÉTICA Y TRANSPARENCIA </a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_9"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var resul = [
            @foreach ($elementos_criterio_1 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                    name: 'Porcentaje',
                    data: resul,
                }, ],
                chart: {
                    height: 300,
                    type: 'area',
                    toolbar: {
                        show: true
                    },
                },
                markers: {
                    size: 4
                },
                colors: ['#008A94'],
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

        document.getElementById('condiciones_institucionales').classList.remove('collapsed');
    </script>
    <script>
        var indicador_1 = [
            @foreach ($elementos_fundamental_1 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        var categoria_1 = [
            @foreach ($elementos_fundamental_1 as $item)
                'E. F. {{ $loop->index + 1 }}',
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_1"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_1,
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
                    // type: 'numeric',
                    categories: categoria_1,
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
        var indicador_2 = [
            @foreach ($elementos_fundamental_2 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];        
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_2"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_2,
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
        var indicador_3 = [
            @foreach ($elementos_fundamental_3 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_3"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_3,
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
        var indicador_4 = [
            @foreach ($elementos_fundamental_4 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_4"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_4,
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
                colors: ['#B57114'],
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
        var indicador_5 = [
            @foreach ($elementos_fundamental_5 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_5"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_5,
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
                colors: ['#962B09'],
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
        var indicador_6 = [
            @foreach ($elementos_fundamental_6 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_6"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_6,
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
                colors: ['#EF6024'],
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
        var indicador_7 = [
            @foreach ($elementos_fundamental_7 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_7"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_7,
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
                colors: ['#F0941F'],
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
        var indicador_8 = [
            @foreach ($elementos_fundamental_8 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_8"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_8,
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
                colors: ['#90A19D'],
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
        var indicador_9 = [
            @foreach ($elementos_fundamental_9 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_9"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_9,
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
                colors: ['#363432'],
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
