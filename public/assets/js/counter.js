// 🔹 Анимация цифр только при первом показе блока
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".number");
    let started = false;

    function animateCounters() {
        if (started) return; // чтобы не запускалось снова

        counters.forEach(counter => {
            let target = +counter.getAttribute("data-target");
            let count = 0;
            let speed = target / 200; // скорость

            function updateCounter() {
                count += speed;
                if (count < target) {
                    counter.textContent = Math.floor(count);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            }
            updateCounter();
        });

        started = true;
    }

    // 🔹 Отслеживаем появление секции .stats на экране
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            animateCounters();
            observer.disconnect();
        }
    }, { threshold: 0.4 });

    const statsSection = document.querySelector(".stats");
    if (statsSection) observer.observe(statsSection);
});
