<div class="row">
    <input type="hidden" name="universidad_id" value="{{ $universidad->id }}">
    <div class="col-sm-6 mb-3">
        <label for="fecha_inicial" class="form-label">Periodo inicial<samp class="text-eliminar">*</samp></label>
        <input type="date" class="form-control" name="fecha_inicial" id="fecha_inicial" required
            value="{{ isset($evaluacion->fecha_inicial) ? $evaluacion->fecha_inicial : old('fecha_inicial') }}">
    </div>
    <div class="col-sm-6 mb-3">
        <label for="fecha_final" class="form-label">Periodo final<samp class="text-eliminar">*</samp></label>
        <input type="date" class="form-control" name="fecha_final" id="fecha_final" required
            value="{{ isset($evaluacion->fecha_final) ? $evaluacion->fecha_final : old('fecha_final') }}">
    </div>
</div>
