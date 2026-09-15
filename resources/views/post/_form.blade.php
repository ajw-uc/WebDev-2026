@csrf
<x-form.group>
    <x-form.textarea id="content" name="content" rows="5" label="Post Content" :value="$post->content ?? ''" placeholder="What's on your mind?" />
</x-form.group>
<x-form.group>
    <input type="file" class="form-control" aria-label="Post image" name="image" accept="image/jpeg,image/png,image/webp">
    <small class="form-text text-muted">JPG, PNG, atau WebP. max 2 MB.</small>
    @if (isset($post) && $post->image)
        <div class="mt-3">
            <button class="post-image-preview-trigger" type="button" data-bs-toggle="modal" data-bs-target="#postImagePreviewModal">
                <img class="post-image-thumbnail" src="{{ asset('storage/' . $post->image) }}" alt="Current post image" loading="lazy">
            </button>
            <div class="modal fade" id="postImagePreviewModal" tabindex="-1" aria-labelledby="postImagePreviewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="postImagePreviewModalLabel">Current post image</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img class="post-image-preview" src="{{ asset('storage/' . $post->image) }}" alt="Larger preview of current post image">
                        </div>
                    </div>
                </div>
            </div>
            <label class="d-block mt-2">
                <input type="checkbox" name="remove_image" value="1">
                Hapus gambar saat menyimpan
            </label>
        </div>
    @endif
</x-form.group>
