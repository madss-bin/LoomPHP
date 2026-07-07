import { writable } from "../utils/store.js";

document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".term-tab");
  const panes = document.querySelectorAll(".term-pane");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const activeTab = tab.dataset.tab;

      tabs.forEach((t) => {
        if (t === tab) {
          t.classList.remove("border-transparent", "text-muted-foreground");
          t.classList.add("border-primary", "text-foreground");
        } else {
          t.classList.remove("border-primary", "text-foreground");
          t.classList.add("border-transparent", "text-muted-foreground");
        }
      });

      panes.forEach((pane) => {
        if (pane.id === `cmd-${activeTab}`) {
          pane.classList.remove("hidden");
        } else {
          pane.classList.add("hidden");
        }
      });
    });
  });

  const copyBtn = document.getElementById("copy-btn");
  if (copyBtn) {
    copyBtn.addEventListener("click", () => {
      const activePane = Array.from(panes).find(
        (pane) => !pane.classList.contains("hidden"),
      );
      if (!activePane) return;

      const lines = Array.from(activePane.querySelectorAll("div"));
      const textToCopy = lines
        .map((line) => {
          const rawText = line.textContent.trim();
          if (rawText.startsWith("$ ")) {
            return rawText.substring(2);
          }
          if (rawText.startsWith("#")) {
            return "";
          }
          return rawText;
        })
        .filter((t) => t !== "")
        .join("\n");

      navigator.clipboard
        .writeText(textToCopy)
        .then(() => {
          if (window.toast) {
            window.toast({
              title: "Copied!",
              description: "Command copied to clipboard.",
              category: "success",
              duration: 2000,
            });
          }

          const originalSvg = copyBtn.innerHTML;
          copyBtn.innerHTML = `<svg class="h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>`;
          setTimeout(() => {
            copyBtn.innerHTML = originalSvg;
          }, 1500);
        })
        .catch((err) => {
          console.error("Failed to copy text: ", err);
        });
    });
  }

  const demoSwitch = document.getElementById("demo-switch");
  const switchStateText = document.getElementById("switch-state-text");
  if (demoSwitch && switchStateText) {
    demoSwitch.addEventListener("change", () => {
      switchStateText.textContent = `State: ${
        demoSwitch.checked ? "On" : "Off"
      }`;
    });
  }

  const counterVal = document.getElementById("counter-val");
  const counterInc = document.getElementById("counter-inc");
  const counterDec = document.getElementById("counter-dec");

  if (counterVal && counterInc && counterDec) {
    const count = writable(0);

    count.subscribe((val) => {
      counterVal.textContent = val;
    });

    counterInc.addEventListener("click", () => {
      count.update((n) => n + 1);
    });

    counterDec.addEventListener("click", () => {
      count.update((n) => n - 1);
    });
  }

  const toastTrigger = document.getElementById("toast-trigger");
  if (toastTrigger) {
    toastTrigger.addEventListener("click", () => {
      if (window.toast) {
        window.toast({
          title: "Boilerplate Active",
          description: "Vite dev server is currently running with HMR enabled.",
          category: "success",
          duration: 3500,
          cancel: { label: "Dismiss" },
        });
      }
    });
  }
});
