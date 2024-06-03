@php
  $class ??= null;
  $name ??= '';
  $valeur ??= '';
  $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class, 'mt-2'])>
  <label class="label-form" for="{{ $name }}">{{ $label }}</label>
  <select name="{{ $name }}[]" id="{{ $name }}" multiple class="form-control  @error($name) is-invalid @enderror"">
    @foreach ($options as $k => $v)
        <option value="{{$k}}">{{$v}}</option>
    @endforeach
  </select>
  @error($name)
    <div class="invalid-feedback">
      <span class="text-danger">{{ $message }}</span>
    </div>
  @enderror
</div>