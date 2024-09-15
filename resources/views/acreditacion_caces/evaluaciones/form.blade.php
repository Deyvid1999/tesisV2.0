<div class="row">
    <input type="hidden" name="uni_id" value="{{ $universidad->id }}">
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
    <div class="col-sm-6 mb-3">
        <label for="departamento" class="form-label">Departamento<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="departamento" id="departamento" required
            value="{{ isset($evaluacion->departamento) ? $evaluacion->departamento : old('departamento') }}">
    </div>
    <div class="col-sm-6 mb-3">
        <label for="facultad" class="form-label">Facultad<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="facultad" id="facultad" required
            value="{{ isset($evaluacion->facultad) ? $evaluacion->facultad : old('facultad') }}">
    </div>
</div>
