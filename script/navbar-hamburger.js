document.addEventListener("DOMContentLoaded", () => {
    const mediaQuery = window.matchMedia("(min-width: 768px)");

    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector("#nav-links");
    const dropdowns = document.querySelectorAll("#nav-links .dropdown");

    if (hamburger && navLinks) {
        // TOGGLE NAV
        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navLinks.classList.toggle("active");
            dropdowns.forEach(d => d.classList.remove("open"));
        });

        // DROPDOWN CLICK
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener("mouseenter", () => {
                if (!mediaQuery.matches) return;
                dropdown.classList.add("open");
            });

            dropdown.addEventListener("mouseleave", () => {
                if (!mediaQuery.matches) return;
                dropdown.classList.remove("open");
            });

            dropdown.addEventListener("click", function (e) {
                // ignore clicks inside dropdown menu
                if (e.target.closest(".menu")) return;

                e.preventDefault();
                dropdown.classList.toggle("open");
                // close other open dropdown menus
                dropdowns.forEach(d => {
                    if (d !== dropdown) d.classList.remove("open");
                });
            });
        });

        document.querySelectorAll(".menu a").forEach(link => {
            link.addEventListener("click", () => {
                dropdowns.forEach(d => d.classList.remove("open"));
                navLinks.classList.remove("active");
            });
        });

        document.addEventListener("click", (e) => {
            if (!e.target.closest("#nav-links")) {
                dropdowns.forEach(d => d.classList.remove("open"));
            }
        });
    }
});