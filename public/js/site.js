const WHATSAPP_NUMBER = "6281139013411";

function contactUrl(model) {
  const message = model
    ? "Halo, saya ingin menanyakan terkait harga " + model
    : "Halo, saya ingin mendapatkan informasi harga, promo, dan konsultasi motor listrik VinFast JB Sriwijaya.";
  return "https://wa.me/" + WHATSAPP_NUMBER + "?text=" + encodeURIComponent(message);
}

document.querySelectorAll(".contact-link").forEach(link => {
  link.href = contactUrl(link.dataset.model || "");
  link.target = "_blank";
  link.rel = "noopener noreferrer";
});

const year = document.getElementById("year");
if (year) year.textContent = new Date().getFullYear();

const menuBtn = document.getElementById("menuBtn");
const navLinks = document.getElementById("navLinks");
if (menuBtn && navLinks) {
  menuBtn.addEventListener("click", () => {
    navLinks.classList.toggle("open");
    menuBtn.textContent = navLinks.classList.contains("open") ? "×" : "☰";
  });
  navLinks.querySelectorAll("a").forEach(a => a.addEventListener("click", () => {
    navLinks.classList.remove("open");
    menuBtn.textContent = "☰";
  }));
}

document.querySelectorAll(".model-card").forEach(card => {
  const picker = card.querySelector(".color-picker");
  const image = card.querySelector(".model-image img");
  if (!picker || !image) return;

  const model = picker.dataset.colorModel;
  const buttons = picker.querySelectorAll(".color-option");

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      if (button.dataset.src) image.src = button.dataset.src;
      image.alt = "VinFast " + model + " warna " + button.dataset.label;
      picker.querySelector(".selected-color").textContent = button.dataset.label;
      buttons.forEach(item => item.setAttribute("aria-pressed", String(item === button)));
    });
  });
});
