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
        <div class="form-text d-flex align-items-center gap-1 mt-2">
            <i class="bi bi-image" aria-hidden="true"></i>
            JPG, PNG, or WebP. Maximum file size is 2 MB.
        </div>
    </x-form.group>

    @isset ($post->image)
    <x-form.group>
        <div class="current-post-image d-flex flex-column flex-sm-row align-items-sm-center gap-3 mt-3 p-3 rounded-3">
            <button class="post-image-preview-trigger flex-shrink-0 d-block p-0 rounded-3 overflow-hidden" type="button" data-bs-toggle="modal" data-bs-target="#postImagePreviewModal" aria-label="View current post image in full size">
                <img class="post-image-thumbnail d-block" src="{{ asset('storage/' . $post->image) }}" alt="Current post image" loading="lazy">
                <span class="post-image-preview-hint d-inline-flex align-items-center gap-1 rounded-pill px-2 py-1" aria-hidden="true">
                    <i class="bi bi-arrows-fullscreen"></i>
                    View
                </span>
            </button>
            <div>
                <p class="fw-semibold mb-1">Current image</p>
                <p class="small text-body-secondary mb-2">Choose a new file above to replace this image.</p>
                <div class="form-check">
                    <input class="form-check-input" id="remove-image" type="checkbox" name="remove_image" value="1" @checked(old('remove_image'))>
                    <label class="form-check-label small text-danger" for="remove-image">Remove current image when saving</label>
                </div>
            </div>
        </div>
    </x-form.group>
    <div class="modal fade" id="postImagePreviewModal" tabindex="-1" aria-labelledby="postImagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content post-image-modal border-0 overflow-hidden shadow-lg">
                <div class="modal-header border-0">
                    <h2 class="modal-title h6 fw-semibold mb-0" id="postImagePreviewModalLabel">Current post image</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 text-center">
                    <img class="post-image-preview d-block mx-auto" src="{{ asset('storage/' . $post->image) }}" alt="Full-size preview of current post image">
                </div>
            </div>
        </div>
    </div>
    @endisset

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