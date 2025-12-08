document.addEventListener('DOMContentLoaded', function () {
    const main = document.getElementById('mainImage');
    const thumbs = document.querySelectorAll('.thumb-btn');

    thumbs.forEach(btn => {
        btn.addEventListener('click', function () {
            const full = this.getAttribute('data-full');
            if (full) main.src = full;
        });
    });
});
