<div>
    <section>
        <div class="card">            
            <div class="card-body mt-3">
                <div class="row justify-content-between">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-outline-pacifico mb-4 btn-sm" data-bs-toggle="modal"
                            data-bs-target="#crear_fuente_{{ $fuente_id }}">NUEVO REGISTRO</button>
                    </div>

                    <div class="col-md-6">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-uppercase pt-2 pb-2">
                        <thead class="table-pacifico">
                            <tr>
                                <th>No</th>
                                <th>Observación</th>
                                <th style="width: 100px">Archivo</th>
                                <th style="width: 230px">Responsable</th>
                                <th style="width: 130px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($arch_academicos->count() == 0)
                                <tr>
                                    <td colspan="26" class="text-center text-muted fw-light pb-5 pt-5">
                                        <div>
                                            <i class="bi bi-clipboard-x" style="font-size: 3.5em"></i>
                                            <p class="fs-4">No hay resultados para mostrar.</p>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($arch_academicos as $arch_academico)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $arch_academico->observacion }}
                                        </td>                                        
                                        <td>
                                            @isset($arch_academico)
                                                @if ($arch_academico->archivo != '')
                                                    <a class="text-actualizar" title="Descargar" target="_blank"
                                                        href="{{ asset('storage') . '/' . $arch_academico->archivo }}"><i class="fas fa-eye"></i> Ver
                                                    </a>
                                                @else
                                                    <i class="bi bi-x-circle-fill text-eliminar"></i> No disponible
                                                @endif
                                            @endisset
                                        </td>
                                        <td>
                                            {{ $arch_academico->user->name }}
                                        </td>
                                        <td style="width: 160px;">
                                            <div class="nav">
                                                <a type="button" class="nav-link text-actualizar" title="Editar"
                                                    data-bs-toggle="modal" data-bs-target="#editar_fuente_{{ $fuente_id }}"
                                                    wire:click="edit({{ $arch_academico->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" class="nav-link text-eliminar" title="Borrar"
                                                    data-bs-toggle="modal" data-bs-target="#borrar_fuente_{{ $fuente_id }}"
                                                    wire:click="deleteConfirmation({{ $arch_academico->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Fin Tabla -->
            </div>
        </div>
    </section>
    {{-- MODALES --}}
    @include('livewire.criterio3.fuente15.modal')
</div>


@push('scripts')
    <script>
        document.addEventListener('close-modal', event => {
            $('#crear_fuente_{{ $fuente_id }}').modal('hide');
            $('#editar_fuente_{{ $fuente_id }}').modal('hide');
            $('#borrar_fuente_{{ $fuente_id }}').modal('hide');
        });
    </script>
@endpush

