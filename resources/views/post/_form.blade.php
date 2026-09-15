@csrf
<x-form.group>
    <x-form.textarea id="content" name="content" rows="5" label="Post Content" :value="$post->content ?? ''" placeholder="What's on your mind?" />
</x-form.group>
<x-form.group>
    <input type="file" class="form-control" aria-label="Post image" name="image" placeholder="Upload an image (optional)">
</x-form.group>
