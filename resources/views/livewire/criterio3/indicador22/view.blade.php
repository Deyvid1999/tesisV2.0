<div>
    <div class="container text-center">
        <img src="{{ asset('img/indicador22.png') }}"width="250" height="150" alt="indicador16" class="img-fluid mx-auto">
    </div>
    <table class="table table-hover align-middle pt-2 pb-2">
        <thead class="table-pacifico text-uppercase">
            <tr>
                <th>No</th>
                <th>Término</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>TTP:</strong> Tasa promedio de titulación institucional de posgrado.
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td><strong>n:</strong> Número de cohortes iniciadas en el periodo de evaluación.</td>
            </tr>
            <tr>
                <td>3</td>
                <td><strong>NEPT<sub>i</sub>:</strong> Número de estudiantes de posgrado matriculado en el programa y
                    que se titularon en el plazo establecido y hasta un año adicional en la ésima cohorte.
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td><strong>TEC<sub>i</sub>:</strong> Total de estudiantes de posgrado matriculado en las cohortes
                    definidas.
                </td>
            </tr>
        </tbody>
    </table>
    <div style="display: flex; justify-content: center">
        <form action="">
            <table class="table table-hover align-middle pt-2 pb-2" style="width: 600px">
                <thead class="table-pacifico text-uppercase">
                    <tr class="table-light">
                        <th colspan="4"></th>
                        <th>
                            <button type="button" class="btn btn-actualizar" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Mayor o igual al 85%">
                                S
                            </button>
                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Mayor o igual a 56% y menor al 85%">
                                CS
                            </button>
                            <button type="button" class="btn" style="background-color: #FF8000; color: #fff" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Mayor o igual al 28% y menor al 56%.">
                                PS
                            </button>
                            <button type="button" class="btn btn-eliminar" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Menor al 28%.">
                                D
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4" style="width: 130px">Valor/porcentaje</th>
                        <th style="width: 230px">Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <strong>n:</strong></td>
                        <td colspan="3">
                            {{-- <input type="number" min="1" max="6" class="form-control form-control-sm" wire:model="n"> --}}
                            <select id="" class="form-select form-select-sm" wire:model="n">
                                <option selected>Seleccionar...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </td>
                    </tr>
                    @if ($n == 1 || $n == 2 || $n == 3 || $n == 4 || $n == 5 || $n == 6)
                        <tr>
                            <td><strong>NEPT<sub>1</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="nept_1">
                            </td>
                            <td><strong>TEC<sub>1</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="tec_1">
                            </td>
                        </tr>
                    @endif
                    @if ($n == 2 || $n == 3 || $n == 4 || $n == 5 || $n == 6)
                        <tr>
                            <td><strong>NEPT<sub>2</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="nept_2">
                            </td>
                            <td><strong>TEC<sub>2</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="tec_2">
                            </td>
                        </tr>
                    @endif
                    @if ($n == 3 || $n == 4 || $n == 5 || $n == 6)
                        <tr>
                            <td><strong>NEPT<sub>3</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="nept_3">
                            </td>
                            <td><strong>TEC<sub>3</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="tec_3">
                            </td>
                        </tr>
                    @endif
                    @if ($n == 4 || $n == 5 || $n == 6)
                        <tr>
                            <td><strong>NEPT<sub>4</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="nept_4">
                            </td>
                            <td><strong>TEC<sub>4</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="tec_4">
                            </td>
                        </tr>
                    @endif
                    @if ($n == 5 || $n == 6)
                        <tr>
                            <td><strong>NEPT<sub>5</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="nept_5">
                            </td>
                            <td><strong>TEC<sub>5</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="tec_5">
                            </td>
                        </tr>
                    @endif
                    @if ($n == 6)
                        <tr>
                            <td><strong>NEPT<sub>6</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="nept_6">
                            </td>
                            <td><strong>TEC<sub>6</sub>:</strong></td>
                            <td>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="tec_6">
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td><strong>TTP:</strong></td>
                        <td colspan="3">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="basic-addon1">%</span>
                                <input type="number" step="0.01" min="1" class="form-control resultado"
                                    wire:model.defer="ttp" style="background-color: #fff" readonly>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td><strong>TOTAL:</strong></td>
                        <td colspan="3">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="basic-addon1">%</span>
                                <input type="number" step="0.01" class="form-control resultado"
                                    wire:model.defer="ttp_porcentaje" style="background-color: #fff" readonly>
                            </div>
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-sm"
                                onkeyup="this.value = this.value.toUpperCase();" wire:model.defer="valoracion_22"
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
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-end">
                        <button type="button" wire:click.prevent="guardarIndicador22()"
                            class="btn btn-primary pb-2 pt-2"><i class="fas fa-save"></i> GUARDAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
