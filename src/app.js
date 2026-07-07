import "./app.css";
import "basecoat-css/all";
import "./utils/theme-command";

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("[data-component]").forEach((el) => {
    el.dispatchEvent(new CustomEvent("component:init", { bubbles: true }));
  });
});

window.toast = (msg) => {
  const toaster = document.getElementById("toaster");
  if (!toaster) return;
  const config =
    typeof msg === "string"
      ? { title: msg, category: "success", duration: 4000, cancel: { label: "Dismiss" } }
      : msg;
  const el = toaster.toast(config);
  if (el) makeToastDraggable(el);
  return el;
};

function makeToastDraggable(el) {
  let startX = 0, currentX = 0, dragging = false, pid = null;

  const targetIsInteractive = (e) =>
    e.target.closest("button, a, input, [data-toast-action], [data-toast-cancel]");

  const onDown = (e) => {
    if (e.button !== 0 || targetIsInteractive(e)) return;
    startX = e.clientX;
    currentX = 0;
    dragging = false;
    pid = e.pointerId;
    el.style.transition = "none";
  };

  const onMove = (e) => {
    if (startX === 0 || e.pointerId !== pid) return;
    const dx = e.clientX - startX;
    if (!dragging) {
      if (Math.abs(dx) < 5) return;
      dragging = true;
    }
    currentX = dx;
    el.style.transform = `translateX(${currentX}px)`;
    el.style.opacity = Math.max(0, 1 - Math.abs(currentX) / 250);
  };

  const onUp = (e) => {
    if (startX === 0 || e.pointerId !== pid) return;
    if (dragging) {
      if (Math.abs(currentX) > 80) {
        const dir = currentX > 0 ? 1 : -1;
        el.style.transition = "transform 0.2s ease, opacity 0.2s ease";
        el.style.transform = `translateX(${dir * 150}%)`;
        el.style.opacity = "0";
        setTimeout(() => el.close(), 200);
      } else {
        el.style.transition =
          "transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.3s ease";
        el.style.transform = "";
        el.style.opacity = "";
        setTimeout(() => { el.style.transition = ""; }, 350);
      }
    }
    startX = 0;
    currentX = 0;
    dragging = false;
    pid = null;
  };

  el.addEventListener("pointerdown", onDown);
  document.addEventListener("pointermove", onMove);
  document.addEventListener("pointerup", onUp);
}
