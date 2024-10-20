<li class="nav-item">
    <a class="nav-link collapsed" id="inicio" href="{{ route('evaluaciones.show', $evaluacion->uni_id) }}">
        <i class="bi bi-arrow-return-left"></i><span>Regresar</span>
    </a>
</li>
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
@can('admin')
<li class="nav-heading">Configuracion</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="criteria-assignments" href="{{ route('criteria.assignments.show',$evaluacion->id)}}">
        <i class="bi bi-file-text"></i><span>Asignar Criterios</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="indicador-assignments" href="{{ route('indicador.assignments.show',$evaluacion->id)}}">
        <i class="bi bi-file-text"></i><span>Asignar Indicadores</span>
    </a>
</li>
<li>
    <hr class="modulo-divider">
</li>
@endcan
<!-- ======= Sidebar ======= -->
<li class="nav-heading">Criterios</li>
@php
$icons=['building','book','people','lightbulb','link','trophy'];
@endphp
@foreach ($criterios as $criterio )
@php
$permissions = auth()->user()->getAllPermissions();

$hasPermission = false;
foreach ($permissions as $permission) {
foreach($criterio->indicadors as $indicador){
if (Str::startsWith($permission->name, "$evaluacion->id-$indicador->id")) {
$hasPermission = true;
break;
}
}
foreach($criterio->indicadorsSub as $indicador){
if (Str::startsWith($permission->name, "$evaluacion->id-$indicador->id")) {
$hasPermission = true;
break;
}
}
if($hasPermission){
break;
}
}
@endphp
@if (auth()->user()->can("admin")||auth()->user()->can("$evaluacion->id/$criterio->id")||$hasPermission)
<li class="nav-item">
    <a class="nav-link collapsed" id="criterio_{{$criterio->id}}" href="{{ route('criterio', [$evaluacion->id,$criterio->id]) }}">
        <i class="bi bi-{{$icons[$criterio->id-1]}}"></i><span>{{mb_convert_case($criterio->criterio,MB_CASE_TITLE, "UTF-8")}}</span>
    </a>
</li>
@endif
@endforeach
<!-- ======= Sidebar ======= -->
<li>
    <hr class="modulo-divider">
</li>
<li class="nav-heading">Informes</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="informes" href="{{ route('informes.criterios.index', $evaluacion->id) }}">
        <i class="bi bi-file-text"></i><span>Informes</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="informes_mejora" href="{{ route('informes.mejora', $evaluacion->id) }}">
        <i class="bi bi-lightbulb"></i><span>Oportunidad de Mejora</span>
    </a>
</li>
{{-- <li class="nav-heading">Livewire</li> --}}