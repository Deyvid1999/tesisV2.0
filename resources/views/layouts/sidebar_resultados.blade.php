<li>
    <hr class="modulo-divider">
</li>
<li class="nav-heading">Inicio</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="indicadores" href="{{ route('indicadores.index', $evaluacion->id) }}">
        <i class="bi bi-bar-chart"></i><span>Indicadores</span>
    </a>
</li>
<li>
    <hr class="modulo-divider">
</li>
<!-- ======= Sidebar ======= -->
<li class="nav-heading">Resultados</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="condiciones_institucionales"
        href="{{ route('condiciones.institucionales.resultado', $evaluacion->id) }}">
        <i class="bi bi-building"></i><span>Condiciones Institucionales</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="docencia" href="{{ route('docencia.resultado', $evaluacion->id) }}">
        <i class="bi bi-book"></i><span>Docencia</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="personal_academico"
        href="{{ route('personal.academico.resultado', $evaluacion->id) }}">
        <i class="bi bi-people"></i><span>Condiciones del Personal Académico, Apoyo Académico y Estudiantes</span>
    </a>
</li>
<li class="nav-item">    
        <a class="nav-link collapsed" id="investigacion" href="{{ route('investigacion.resultado', $evaluacion->id) }}">
        <i class="bi bi-lightbulb"></i><span>Investigación e Innovación</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="vinculacion" href="{{ route('vinculacion.resultado', $evaluacion->id) }}">
        <i class="bi bi-link"></i><span>Vinculación con la Sociedad</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="gestion_calidad" href="{{ route('gestion.calidad.resultado', $evaluacion->id) }}">
        <i class="bi bi-trophy"></i><span>Sistema de Gestión de la Calidad</span>
    </a>
</li>
<li>
    <hr class="modulo-divider">
</li>
<!-- ======= Sidebar ======= -->
<li class="nav-heading">Informes</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="informes" href="{{ route('informes.criterios.index', $evaluacion->id) }}">
        <i class="bi bi-file-text"></i><span>Informes</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="" href="#">
        <i class="bi bi-lightbulb"></i><span>Oportunidad de Mejora</span>
    </a>
</li>