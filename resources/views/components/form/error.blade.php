@isset($name)
@error($name)
<div class="text-danger">
    {{ $message }}
</div>
@enderror
@endif