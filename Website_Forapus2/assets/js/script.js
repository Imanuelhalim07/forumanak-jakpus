document.addEventListener("DOMContentLoaded", function () {
  // Toggle Menu untuk Navigasi Mobile
  const hamburger = document.querySelector(".hamburger");
  const navLinks = document.getElementById("navLinks");

  if (hamburger && navLinks) {
    hamburger.addEventListener("click", function () {
      navLinks.classList.toggle("active");
      hamburger.classList.toggle("active");
    });
  }

  // Smooth scroll untuk anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });

  // Validasi form sederhana dengan feedback visual
  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      const inputs = form.querySelectorAll(
        "input[required], textarea[required]"
      );
      let valid = true;
      inputs.forEach((input) => {
        if (!input.value.trim()) {
          valid = false;
          input.style.borderColor = "red";
          input.classList.add("shake");
          setTimeout(() => input.classList.remove("shake"), 500);
        } else {
          input.style.borderColor = "";
        }
      });
      if (!valid) {
        e.preventDefault();
        alert("Mohon lengkapi semua field yang wajib diisi.");
      }
    });
  });

  // Efek Hover dan Animasi pada Program Kerja
  const programItems = document.querySelectorAll(".program-item");
  programItems.forEach((item) => {
    item.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-10px) scale(1.05)";
      this.style.boxShadow = "0 8px 20px rgba(0, 0, 0, 0.2)";
    });

    item.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)";
      this.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.1)";
    });
  });

  // Efek Hover pada Tombol Sekunder
  const secondaryButtons = document.querySelectorAll(".button-secondary");
  secondaryButtons.forEach((button) => {
    button.addEventListener("mouseenter", function () {
      this.style.transform = "scale(1.1)";
      this.style.boxShadow = "0 6px 15px rgba(32, 178, 170, 0.7)";
    });
    button.addEventListener("mouseleave", function () {
      this.style.transform = "scale(1)";
      this.style.boxShadow = "none";
    });
  });

  // Efek Hover pada Link Navigasi
  const navLinksA = document.querySelectorAll(".nav-links a");
  navLinksA.forEach((link) => {
    link.addEventListener("mouseenter", function () {
      this.style.color = getComputedStyle(
        document.documentElement
      ).getPropertyValue("--secondary-orange");
    });
    link.addEventListener("mouseleave", function () {
      this.style.color = getComputedStyle(
        document.documentElement
      ).getPropertyValue("--gray-dark");
      if (this.classList.contains("active")) {
        this.style.color = getComputedStyle(
          document.documentElement
        ).getPropertyValue("--secondary-orange");
      }
    });
  });

  // Efek Zoom pada Gambar Galeri
  const galleryImages = document.querySelectorAll(".gallery img");
  galleryImages.forEach((img) => {
    img.addEventListener("mouseenter", function () {
      this.style.transform = "scale(1.1)";
      this.style.cursor = "pointer";
      this.style.boxShadow = "0 8px 20px rgba(0,0,0,0.3)";
    });
    img.addEventListener("mouseleave", function () {
      this.style.transform = "scale(1)";
      this.style.boxShadow = "none";
    });
  });
});
