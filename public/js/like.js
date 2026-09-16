document.querySelectorAll('[data-like-form]').forEach((form) => {
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const button = form.querySelector('button');
        const icon = form.querySelector('[data-like-icon]');
        const count = form.querySelector('[data-like-count]');
        const wasLiked = button.classList.contains('is-liked');
        const previousCount = Number(count.textContent);
        const optimisticLiked = !wasLiked;

        button.disabled = true;
        button.classList.toggle('is-liked', optimisticLiked);
        button.setAttribute('aria-pressed', optimisticLiked ? 'true' : 'false');
        button.setAttribute('aria-label', `${optimisticLiked ? 'Unlike' : 'Like'} post`);
        icon.textContent = optimisticLiked ? '♥' : '♡';
        count.textContent = previousCount + (optimisticLiked ? 1 : -1);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: new FormData(form),
            });

            if (!response.ok) {
                throw new Error('Like request failed.');
            }

            const result = await response.json();
            button.classList.toggle('is-liked', result.liked);
            button.setAttribute('aria-pressed', result.liked ? 'true' : 'false');
            button.setAttribute('aria-label', `${result.liked ? 'Unlike' : 'Like'} post`);
            icon.textContent = result.liked ? '♥' : '♡';
            count.textContent = result.likes_count;
        } catch (error) {
            button.classList.toggle('is-liked', wasLiked);
            button.setAttribute('aria-pressed', wasLiked ? 'true' : 'false');
            button.setAttribute('aria-label', `${wasLiked ? 'Unlike' : 'Like'} post`);
            icon.textContent = wasLiked ? '♥' : '♡';
            count.textContent = previousCount;
        } finally {
            button.disabled = false;
        }
    });
});
