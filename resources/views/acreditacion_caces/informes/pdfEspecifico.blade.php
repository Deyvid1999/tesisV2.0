<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        font-size: 12px;
    }

    h1 {
        text-align: center;
    }

    h2 {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body>
    <h1>Informe de Acreditación CACES</h1>

    <h2>Universidad: {{ $evaluacion->universidad->universidad }}</h2>
    <h2>Fecha de Evaluación: {{ $evaluacion->fecha_creacion }}</h2>
    @php
        $totalCriterios = count($indicadors) - 1;
    @endphp
    @foreach ($indicadors as $criterio)
        @if (!$loop->last)
            <div class="card">
                <h3 class="fw-normal text-pacifico text-uppercase">CRITERIO {{ $loop->index + 1 }}:
                    {{ $criterio->criterio }}</h3>
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
                            <h5>{{ $indicador->indicador }}</h5>
                            <table class="table table-hover align-middle text-uppercase pt-2 pb-2">
                                <thead class="table-pacifico">
                                    <tr>
                                        <th width=''>No</th>
                                        <th width=''>Elementos fundamentales</th>
                                        <th width='100px'>Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indicador->resDocentes as $resDocente)
                                        @if ($resDocente->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $resDocente->ElementoFundamental->elemento }}</td>
                                                <td>
                                                    @if ($resDocente->valoracion == 100)
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($resDocente->valoracion == 0)
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->resVinculacions as $resVinculacion)
                                        @if ($resVinculacion->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $resVinculacion->ElementoFundamental->elemento }}</td>
                                                <td>
                                                    @if ($resVinculacion->valoracion == 100)
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($resVinculacion->valoracion == 75)
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($resVinculacion->valoracion == 50)
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($resVinculacion->valoracion == 25)
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->resGestionCalidads as $resGestionCalidad)
                                        @if ($resGestionCalidad->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $resGestionCalidad->ElementoFundamental->elemento }}</td>
                                                <td>
                                                    @if ($resGestionCalidad->valoracion == 100)
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($resGestionCalidad->valoracion == 75)
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($resGestionCalidad->valoracion == 50)
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($resGestionCalidad->valoracion == 25)
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @endif
                @else
                    @foreach ($criterio->subcriterios as $subcriterio)
                        <h4>{{ $subcriterio->subcriterio }}</h4>
                        @foreach ($subcriterio->indicadores as $indicador)
                            <h5>{{ $indicador->indicador }}</h5>
                            <table class="table table-hover align-middle text-uppercase pt-2 pb-2">
                                <thead class="table-pacifico">
                                    <tr>
                                        <th width=''>No</th>
                                        <th width=''>Elementos fundamentales</th>
                                        <th width='100px'>Valoración</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indicador->resCondicionInstitucions as $resCondicionInstitucion)
                                        @if ($resCondicionInstitucion->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $resCondicionInstitucion->ElementoFundamental->elemento }}</td>
                                                <td>
                                                    @if ($resCondicionInstitucion->valoracion == 100)
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($resCondicionInstitucion->valoracion == 75)
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($resCondicionInstitucion->valoracion == 50)
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($resCondicionInstitucion->valoracion == 25)
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->resAcademicos as $resAcademico)
                                        @if ($resAcademico->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $resAcademico->ElementoFundamental->elemento }}</td>
                                                <td>
                                                    @if ($resAcademico->valoracion == 100)
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($resAcademico->valoracion == 75)
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($resAcademico->valoracion == 50)
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($resAcademico->valoracion == 25)
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->resInvestigacions as $resInvestigacion)
                                        @if ($resInvestigacion->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $resInvestigacion->ElementoFundamental->elemento }}</td>
                                                <td>
                                                    @if ($resInvestigacion->valoracion == 100)
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($resInvestigacion->valoracion == 75)
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($resInvestigacion->valoracion == 50)
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($resInvestigacion->valoracion == 25)
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_16 as $indicador_16)
                                        @if ($indicador_16->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>TPAFD: Tasa de personal académico con formación doctoral.</td>
                                                <td>
                                                    @if ($indicador_16->valoracion_16 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_16->valoracion_16 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_16->valoracion_16 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_16->valoracion_16 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_17 as $indicador_17)
                                        @if ($indicador_17->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>TPTC: Tasa del personal académico con dedicación a tiempo completo</td>
                                                <td>
                                                    @if ($indicador_17->valoracion_17 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_17->valoracion_17 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_17->valoracion_17 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_17->valoracion_17 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_19 as $indicador_19)
                                        @if ($indicador_19->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>	TDG2: Tasa de deserción institucional de oferta académica de grado al segundo año.</td>
                                                <td>
                                                    @if ($indicador_19->valoracion_19 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_19->valoracion_19 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_19->valoracion_19 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_19->valoracion_19 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_21 as $indicador_21)
                                        @if ($indicador_21->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>TTG: Tasa promedio de titulación institucional de grado.</td>
                                                <td>
                                                    @if ($indicador_21->valoracion_21 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_21->valoracion_21 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_21->valoracion_21 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_21->valoracion_21 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_22 as $indicador_22)
                                        @if ($indicador_22->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>TTP: Tasa promedio de titulación institucional de posgrado.</td>
                                                <td>
                                                    @if ($indicador_22->valoracion_22 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_22->valoracion_22 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_22->valoracion_22 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_22->valoracion_22 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_25 as $indicador_25)
                                        @if ($indicador_25->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>	IP: Porcentaje de proyectos concluidos o en ejecución con financiamiento externo o en redes respecto al total de proyectos de la UEP.</td>
                                                <td>
                                                    @if ($indicador_25->valoracion_25 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_25->valoracion_25 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_25->valoracion_25 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_25->valoracion_25 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($indicador->res_indicador_26 as $indicador_26)
                                        @if ($indicador_26->evaluacion->fecha_creacion == $evaluacion->fecha_creacion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>	IP: Índice de producción académica per cápita.</td>
                                                <td>
                                                    @if ($indicador_26->valoracion_26 == 'SATISFACTORIO')
                                                        <span style="color: green">SATISFACTORIO</span>
                                                    @elseif($indicador_26->valoracion_26 == 'CUASI SATISFACTORIO')
                                                        <span style="color: green">CUASI SATISFACTORIO</span>
                                                    @elseif($indicador_26->valoracion_26 == 'POCO SATISFACTORIO')
                                                        <span style="color: red">POCO SATISFACTORIO</span>
                                                    @elseif($indicador_26->valoracion_26 == 'DEFICIENTE')
                                                        <span style="color: red">DEFICIENTE</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @endforeach
                @endif
            </div>
        @endif
    @endforeach
</body>
