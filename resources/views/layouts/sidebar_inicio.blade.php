@can('admin')
<li class="nav-heading">CONFIGURACIÓN</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="porcentaje_criterio" href="{{ route('porcentaje.criterios.index') }}">
        <i class="bi bi-percent"></i><span>Porcentajes criterios</span>
    </a>
</li>
<li>
    <hr class="modulo-divider">
</li>
@endcan
<li class="nav-heading">UNIVERSIDADES</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="universidades" href="{{ route('universidades.index') }}">
        <i class="bi bi-grid"></i><span>Universidades</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" id="new_user" href="{{ route('register') }}">
        <i class="bi bi-person"></i><span>Registrar usuarios</span>
    </a>
</li>