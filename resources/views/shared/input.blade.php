@php
  $type ??= 'text';
  $class ??= null;
  $name ??= '';
  $valeur ??= '';
  $label ??= ucfirst($name);
  $placeholder ??= '';

@endphp

<div @class(['form-group', $class, 'mt-2'])>
  <label class="label-form" for="{{ $name }}">{{ $label }}</label>
  @if($type == 'text')
    <input type="{{ $type }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name, $valeur) }}"/>
  @else
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" cols="30" rows="10">{{ old($name, $valeur) }}</textarea>
  @endif
  @error($name)
    <div class="invalid-feedback">
      <span class="text-danger">{{ $message }}</span>
    </div>
  @enderror
</div>