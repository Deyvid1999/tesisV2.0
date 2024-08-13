<div class="row">
    <div class="col-sm-9 mb-3">
        <label for="universidad" class="form-label">Universidad<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="universidad" id="universidad" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->universidad) ? $universidad->universidad : old('universidad') }}">
    </div>
    <div class="col-sm-3 mb-3">
        <label class="form-label">Imagen</label>
        <input class="form-control" type="file" name="foto" id="foto"
            accept="image/jpg, image/jpeg, image/png">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="campus" class="form-label">Campus<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="campus" id="campus" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->campus) ? $universidad->campus : old('campus') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="sede" class="form-label">Sede<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="sede" id="sede" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->sede) ? $universidad->sede : old('sede') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="ciudad" class="form-label">Ciudad<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="ciudad" id="ciudad" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->ciudad) ? $universidad->ciudad : old('ciudad') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="facultad" class="form-label">Facultad<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="facultad" id="facultad" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->facultad) ? $universidad->facultad : old('facultad') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="departamento" class="form-label">Departamento<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="departamento" id="departamento" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->departamento) ? $universidad->departamento : old('departamento') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="fecha_evaluacion" class="form-label">Fecha de evaluación<samp class="text-eliminar">*</samp></label>
        <input type="date" class="form-control" name="fecha_evaluacion" id="fecha_evaluacion" required
            value="{{ isset($universidad->fecha_evaluacion) ? $universidad->fecha_evaluacion : old('fecha_evaluacion') }}">
    </div>
    <div class="col-sm-12 mb-3">
        <label for="evaluadores" class="form-label">Evaluador<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="evaluadores" id="evaluadores" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->evaluadores) ? $universidad->evaluadores : old('evaluadores') }}">
    </div>
    <div class="col-sm-12 mb-3">
        <label for="contraparte" class="form-label">Contraparte<samp class="text-eliminar">*</samp></label>
        <input type="text" class="form-control" name="contraparte" id="contraparte" required
            onkeyup="this.value = this.value.toUpperCase();"
            value="{{ isset($universidad->contraparte) ? $universidad->contraparte : old('contraparte') }}">
    </div>
    <div class="col-sm-12 mb-3">
        <div class="form-group">
            <label class="form-label">Informe
                @isset($universidad)
                    @if ($universidad->informe != '')
                        <a class="text-actualizar" title="Abrir"
                            href="{{ asset('storage/app/public') . '/' . $universidad->informe }}" target="_blank"><i
                                class="bi bi-check-circle-fill"></i>
                        </a>
                    @else
                        <i class="bi bi-x-circle-fill text-eliminar"></i>
                    @endif
                @endisset
            </label>
            <input class="form-control" type="file" name="informe" id="informe" accept=".pdf">
        </div>
    </div>
</div>
