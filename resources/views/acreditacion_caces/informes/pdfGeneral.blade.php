<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Informe de Autoevaluación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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

        .resultados {
            margin-top: 20px;
        }

        .observaciones {
            margin-top: 20px;
        }

        .firmas {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Informe de Autoevaluación</h1>

    <h2>Universidad: {{ $evaluacion->universidad->universidad }}</h2>
    <h2>Fecha de Autoevaluación : {{ $evaluacion->fecha_creacion }}</h2>

    <table>
        <tr>
            <th>Criterio de Acreditación</th>
            <th>Porcentaje de Acreditación</th>
            <th>Resultado</th>
        </tr>
        <tr>
            <td>CONDICIONES INSTITUCIONALES</td>
            <td>80%</td>
            <td>{{ $total_criterio }}%</td>
        </tr>
        <tr>
            <td>DOCENCIA</td>
            <td>80%</td>
            <td>{{ $total_criterio_2 }}%</td>
        </tr>
        <tr>
            <td>CONDICIONES DEL PERSONAL ACADÉMICO, APOYO ACADÉMICO Y ESTUDIANTES</td>
            <td>80%</td>
            <td>{{ $total_criterio_3 }}%</td>
        </tr>
        <tr>
            <td>INVESTIGACIÓN E INNOVACIÓN</td>
            <td>80%</td>
            <td>{{ $total_criterio_4 }}%</td>
        </tr>
        <tr>
            <td>VINCULACIÓN CON LA SOCIEDAD</td>
            <td>80%</td>
            <td>{{ $total_criterio_5 }}%</td>
        </tr>
        <tr>
            <td>SISTEMA DE GESTIÓN DE LA CALIDAD</td>
            <td>80%</td>
            <td>{{ $total_criterio }}%</td>
        </tr>
        <!-- Repite esta estructura para las otras áreas -->
    </table>
    <div class="resultados">
        <h2>Puntaje Total de Autoevaluación</h2>
        <p>El puntaje total de autoevaluación obtenido es
            {{ round(($total_criterio + $total_criterio_2 + $total_criterio_3 + $total_criterio_4 + $total_criterio_5 + $total_criterio) / 6 ,2) }}% sobre 100%.</p>
    </div>

    <div class="resultados">
        <h2>Comentarios y Observaciones</h2>
        <p>En el proceso de autoevaluación, se observó un compromiso significativo por parte de la universidad en el
            fortalecimiento de sus condiciones institucionales. Sin embargo, se identificaron áreas de mejora en la
            infraestructura física de algunas instalaciones académicas, particularmente en el mantenimiento de
            laboratorios. Se recomienda que la universidad priorice inversiones en este aspecto para asegurar un entorno
            de aprendizaje adecuado.</p>
    </div>

    <div class="resultados">
        <h2>Conclusiones</h2>
        <p>Basándonos en los resultados de la autoevaluación, se determina que la universidad ha logrado un alto nivel de
            acreditación en áreas clave como las condiciones institucionales y la vinculación con la sociedad. Esto
            refleja un compromiso sólido con la excelencia académica y el servicio a la comunidad.</p>
    </div>

    <div class="firmas">
        <h2>Firma del Evaluador</h2>
        <p>{{ $evaluacion->universidad->evaluadores }}</p>
    </div>
</body>

</html>
