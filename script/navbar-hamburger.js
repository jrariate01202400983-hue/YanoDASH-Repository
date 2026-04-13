document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector("#nav-links");

    if (hamburger && navLinks) {
        // TOGGLE NAV
        hamburger.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });

        // DROPDOWN CLICK
        document.querySelectorAll("#nav-links .dropdown").forEach(dropdown => {
            dropdown.addEventListener("click", function (e) {
                // ignore clicks inside dropdown menu
                if (e.target.closest(".dropdown-contents")) return;

                e.preventDefault();
                this.classList.toggle("open");
                // close other open dropdown menus
                document.querySelectorAll("#nav-links .dropdown").forEach(d => {
                    if (d !== this) d.classList.remove("open");
                });
            });
        });

        // CLOSE MENU (ONLY NON-DROPDOWN LINKS)
        document.querySelectorAll("#nav-links a").forEach(link => {
            link.addEventListener("click", (e) => {
                if (link.closest(".dropdown")) return;
                navLinks.classList.remove("active");
            });
        });

        
    }
});