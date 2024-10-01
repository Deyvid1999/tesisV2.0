<div class="overflow-auto">
    @foreach ($universidades as $universidad)
    <input class="form-check-input" type="radio" id="{{$universidad->id}}" name="universidad_id" value="{{$universidad->id}}"><label class="form-check-label" for="">{{$universidad->universidad}}-{{$universidad->campus}}</label>
    <br />
    @endforeach
</div>