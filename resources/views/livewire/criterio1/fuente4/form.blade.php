    <div class="row">        
        <div class="col-sm-12 mb-3">
            @if ($this->archivo != '')
                <a class="text-actualizar" title="Abrir" href="{{ asset('storage/app/public') . '/' . $this->archivo }}"
                    target="_blank"><i class="bi bi-check-circle-fill"></i>
                </a>
            @else
                <i class="bi bi-x-circle-fill text-eliminar"></i>
            @endif
            <label class="form-label">Fuente de información</label>
            <input wire:model.defer="archivo" type="file" class="form-control form-control">
            @error('archivo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-sm-12 mb-3">
            <label class="form-label">Observaciones / Nombre del archivo<samp class="text-eliminar">*</samp></label>
            <textarea class="comentario form-control" rows="3" wire:model.defer="observacion" placeholder="Comentario"></textarea>
            @error('observacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
