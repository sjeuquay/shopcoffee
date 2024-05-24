/**
 * @schmev91
 * The toggle button should have the eye label just like the one used for equipment.show
 * @access toggle-linecamp | All the toggle buttons must have this class
 * @argument lineclamp-target-id | This attribute must be included in each button with the text-container id as value
 * The toggle button must have the class toggle-lineclamp
 */
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtnCollection =
        document.getElementsByClassName("toggle-lineclamp");

    function morph(text, iconClasses) {
        return function (btn) {
            btn.querySelector("i").className = iconClasses;
            btn.querySelector("span").innerHTML = text;
        };
    }
    const morphHide = morph("ẩn", "bi bi-eye-slash");
    const morphDisplay = morph("hiển thị", "bi bi-eye");

    const lineClampClass = "line-clamp-2";
    const requireAttr = "lineclamp-target-id";

    for (let btn of toggleBtnCollection) {
        const targetId = btn.getAttribute(requireAttr);
        const target = document.getElementById(targetId);
        if (!isClamped(target)) {
            btn.style.display = "none";
            continue;
        }

        btn.addEventListener("click", lineclampHandler(btn, target));
    }

    function lineclampHandler(btn, target) {
        return function () {
            if (isClamped(target)) morphHide(btn);
            else morphDisplay(btn);

            target.classList.toggle(lineClampClass);
        };
    }

    function isClamped(element) {
        return element.scrollHeight > element.clientHeight;
    }
});
