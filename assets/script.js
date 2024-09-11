// ATURAN ANIMASI PADA SAAT DI SCROLL
document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll(".fade-in");

  function handleIntersection(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      } else {
        entry.target.classList.remove("visible");
      }
    });
  }

  // Create an Intersection Observer instance
  const observer = new IntersectionObserver(handleIntersection, {
    root: null, 
    rootMargin: "0px",
    threshold: 0.1, 
  });

  // Observe each section
  sections.forEach((section) => {
    observer.observe(section);
  });
});
// -------------------------------------------------------

//SAAT NAVBAR AKTIF WARNA BERUBAH BIRU

document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

  window.addEventListener("scroll", () => {
    let scrollPosition = window.scrollY || document.documentElement.scrollTop;

    sections.forEach((section) => {
      let sectionTop = section.offsetTop - 60; // Mengurangi dengan tinggi navbar jika fixed
      let sectionHeight = section.offsetHeight;
      let sectionId = section.getAttribute("id");

      if (
        scrollPosition >= sectionTop &&
        scrollPosition < sectionTop + sectionHeight
      ) {
        navLinks.forEach((link) => {
          link.classList.remove("active");
          let targetLink = document.querySelector(
            `.navbar-nav .nav-link[href="#${sectionId}"]`
          );
          if (targetLink) {
            targetLink.classList.add("active");
          }
        });
      }
    });
  });
});
