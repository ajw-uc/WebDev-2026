@php
$hideLabel = $attributes->get('hide-label');
$method = strtoupper($attributes->get('method'));
@endphp

<form action="{{ isset($post) ? route('post.update', ['id' => $post->id]) : route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @isset($post)
        @method('PUT')
    @endif
    <x-form.group>
        <x-form.textarea id="content" name="content" rows="7" placeholder="What's on your mind?" :label="$hideLabel ? null : 'Post content'" :value="old('content', $post->content ?? '')" />
    </x-form.group>
    <x-form.group>
        @if(!$hideLabel)
        <x-form.label for="image">Image <span class="text-body-secondary fw-normal">(optional)</span></x-form.label>
        @endif
        <x-form.input type="file" class="form-control form-control-sm" aria-label="Post image" name="image" accept="image/*" />
    </x-form.group>
    @isset($actions)
        {{ $actions }}
    @else
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('me') }}" class="btn btn-light rounded-pill px-4">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4">{{ isset($post) ? 'Save changes' : 'Publish' }} ↗</button>
        </div>
    @endisset
</form>