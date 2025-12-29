// Toggle genérico para botões com a classe .toggle-btn
document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.toggle-btn');
    buttons.forEach(function(btn) {
        var orig = btn.getAttribute('data-orig-text') || btn.textContent;
        btn.setAttribute('data-orig-text', orig);

        btn.addEventListener('click', function() {
            var targetSelector = btn.getAttribute('data-target');
            var target = targetSelector ? document.querySelector(targetSelector) : btn.nextElementSibling;
            if (!target) return;

            var visible = target.classList.toggle('login-visible');
            target.classList.toggle('login-hidden', !visible);
            btn.setAttribute('aria-expanded', String(visible));

            var hideText = btn.getAttribute('data-hide-text');
            if (visible) {
                btn.textContent = hideText ? hideText : ('Ocultar ' + orig);
            } else {
                btn.textContent = orig;
            }
        });
    });
});
