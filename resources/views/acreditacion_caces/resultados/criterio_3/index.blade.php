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
    </div>
    <!-- Reports -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_13">INDICADOR 13:
                            PROCESOS DE INGRESO, PERMANENCIA Y PROMOCIÓN</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_13"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_14">INDICADOR 14:
                            EVALUACIÓN INTEGRAL DEL PERSONAL ACADÉMICO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_14"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_15">INDICADOR 15:
                            PERFECCIONAMIENTO ACADÉMICO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_15"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_16">INDICADOR 16:
                            PERSONAL ACADÉMICO CON FORMACIÓN DOCTORAL</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_16"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_17">INDICADOR 17:
                            PERSONAL ACADÉMICO CON DEDICACIÓN A TIEMPO COMPLETO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_17"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_18">INDICADOR 18:
                            ASPIRANTES Y ESTUDIANTES</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_18"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_19">INDICADOR 19:
                            TASA DE DESERCIÓN INSTITUICONAL DE SEGUNDO AÑO-OFERTA ACADEMICA DE GRADO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_19"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_20">INDICADOR 20:
                            PROCESO DE TITULACIÓN</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_20"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_21">INDICADOR 21:
                            TASA DE TITULACIÓN INSTITUCIONAL-OFERTA ACADÉMICA DE GRADO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_21"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_22">INDICADOR 22:
                            TASA DE TITULACIÓN-OFERTA DE POSGRADO</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_22"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('criterio_3', $evaluacion->id) }} #indicador_23">INDICADOR 23:
                            SEGUIMIENTO A GRADUADOS</a></h5>

                    <!-- Line Chart -->
                    <div id="indicador_23"></div>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('personal_academico').classList.remove('collapsed');
    </script>
    <script>
        var indicador_13 = [
            @foreach ($elementos_fundamental_13 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_13"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_13,
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
        var indicador_14 = [
            @foreach ($elementos_fundamental_14 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_14"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_14,
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
        var indicador_15 = [
            @foreach ($elementos_fundamental_15 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_15"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_15,
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
        var indicador_16 = [
            @foreach ($elementos_fundamental_16 as $item)
                [{{ $item->id }}, {{ $item->tpafd_porcentaje }}],
            @endforeach
        ];
        console.log(indicador_16);
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_16"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_16,
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
        var indicador_17 = [
            @foreach ($elementos_fundamental_17 as $item)
                [{{ $item->id }}, {{ $item->tptc_porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_17"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_17,
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
        var indicador_18 = [
            @foreach ($elementos_fundamental_18 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_18"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_18,
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
        var indicador_19 = [
            @foreach ($elementos_fundamental_19 as $item)
                [{{ $item->id }}, {{ $item->tdg2_porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_19"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_19,
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
        var indicador_20 = [
            @foreach ($elementos_fundamental_20 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_20"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_20,
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
        var indicador_21 = [
            @foreach ($elementos_fundamental_21 as $item)
                [{{ $item->id }}, {{ $item->ttg_porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_21"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_21,
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
    <script>
        var indicador_22 = [
            @foreach ($elementos_fundamental_22 as $item)
                [{{ $item->id }}, {{ $item->ttp_porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_22"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_22,
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
        var indicador_23 = [
            @foreach ($elementos_fundamental_23 as $item)
                [{{ $item->id }}, {{ $item->porcentaje }}],
            @endforeach
        ];
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#indicador_23"), {
                series: [{
                    name: 'Porcentaje',
                    data: indicador_23,
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
@endsection
