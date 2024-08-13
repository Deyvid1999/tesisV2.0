<div>
    <div class="container text-center">        
        <img src="{{ asset('img/indicador17.png') }}"width="250" height="150" alt="indicador17" class="img-fluid mx-auto">
    </div>
    <form action="">
        <table class="table table-hover align-middle pt-2 pb-2">
            <thead class="table-pacifico text-uppercase">
                <tr class="table-light">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <button type="button" class="btn btn-actualizar" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Mayor o igual al 50% en todos sus periodos académicos.">
                            S
                        </button>                        
                        <button type="button" class="btn btn-eliminar" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Menor al 50% en alguno de sus periodos académicos">
                            D
                        </button>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Término</th>
                    <th style="width: 130px">Valor/porcentaje</th>
                    <th style="width: 230px">Valoración</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>PTC:</strong> Total del personal académico con dedicación a tiempo completo a nivel institucional vinculados en el periodo de evaluación
                    </td>
                    <td>
                        <input type="number" min="1" class="form-control form-control-sm" wire:model="ptc">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><strong>TP:</strong> Total del personal académico20 de la institución vinculados en el periodo de evaluación.
                    <td>
                        <input type="number" min="1" class="form-control form-control-sm" wire:model="tp">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><strong>TPTC:</strong> Tasa del personal académico con dedicación a tiempo completo</td>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input type="number" step="0.01" min="1" class="form-control resultado"
                                wire:model.defer="tptc" style="background-color: #fff" readonly>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>4</td>
                    <td><strong>TOTAL</strong></td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input type="number" step="0.01" class="form-control resultado"
                                wire:model.defer="tptc_porcentaje" style="background-color: #fff" readonly>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm"
                            onkeyup="this.value = this.value.toUpperCase();" wire:model.defer="valoracion_17"
                            placeholder="" style="background-color: #fff" readonly>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-sm-4">
                <div class="d-flex justify-content-end">
                    <button type="button" wire:click.prevent="guardarIndicador17()"
                        class="btn btn-primary pb-2 pt-2"><i class="fas fa-save"></i> GUARDAR</button>
                </div>
            </div>
        </div>
    </form>
</div>
