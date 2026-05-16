// BuildCares main JS

// Counter animation
function animateCounters() {
    document.querySelectorAll('.stat-number').forEach(el => {
        const text = el.textContent;
        const num = parseFloat(text.replace(/[^0-9.]/g, ''));
        if (!num) return;

        let start = 0;
        const duration = 2000;
        const step = 16;
        const increment = num / (duration / step);

        const timer = setInterval(() => {
            start += increment;
            if (start >= num) {
                start = num;
                clearInterval(timer);
            }
            el.childNodes[0].textContent = Math.floor(start);
        }, step);
    });
}

// Trigger counter animation when stats are visible
const statsEl = document.querySelector('.stat-number');
if (statsEl) {
    const statsObserver = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            animateCounters();
            statsObserver.disconnect();
        }
    }, { threshold: 0.5 });
    statsObserver.observe(statsEl);
}
