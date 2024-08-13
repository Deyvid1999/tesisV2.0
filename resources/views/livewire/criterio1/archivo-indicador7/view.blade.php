<div>
    @foreach ($fuentesInformaciones as $fuenteInformacion)
        <tr>
            <td colspan="6">
                {{-- ACORDION PARA FUENTES --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_sfi_{{ $fuenteInformacion->id }}">
                        <button class="accordion-button collapsed pt-1 pb-1" style="background: #f8d7da; color: black"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse_sfi_{{ $fuenteInformacion->id }}" aria-expanded="false"
                            aria-controls="collapse_sfi_{{ $fuenteInformacion->id }}">
                            <div style="width: 7%">
                                {{ 'F. I. 7.' . $loop->iteration }}
                            </div>
                            <div style="width: 93%">
                                {{ $fuenteInformacion->documento }}
                            </div>
                        </button>
                    </h2>
                    <div id="collapse_sfi_{{ $fuenteInformacion->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading_sfi_{{ $fuenteInformacion->id }}" data-bs-parent="#caces">
                        <div class="accordion-body">
                            @livewire('criterio1.fuente7', ['id_indicador' => $indicador->id, 'id_evaluacion' => $evaluacion->id, 'id_fuente' => $fuenteInformacion->id])
                        </div>
                    </div>
                </div>
                {{-- FIN ACORDION PARA ELEMENTOS FUNDAMENTALES --}}
            </td>
        </tr>
    @endforeach
</div>