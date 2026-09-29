@php
$showLabel = $label ?? true;
@endphp

@csrf
<x-form.group>
    <x-form.textarea id="content" class="post-content-input" name="content" rows="6" maxlength="255" :label="$showLabel ? 'Post content' : null" :value="$post->content ?? ''" placeholder="What's on your mind?" />
</x-form.group>
<x-form.group>
    <x-form.input id="image" type="file" :label="$showLabel ? 'Post image' : null" name="image" accept="image/jpeg,image/png,image/webp" />
    <div class="form-text d-flex align-items-center gap-1 mt-2">
        <i class="bi bi-image" aria-hidden="true"></i>
        JPG, PNG, or WebP. Maximum file size is 2 MB.
    </div>
    @if (isset($post) && $post->image)
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
    @endif
</x-form.group>
