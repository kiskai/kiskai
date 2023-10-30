 // Smooth scrolling effect when clicking on navigation links
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll('a[href^="#"]');
        
        for (const link of navLinks) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                const target = document.querySelector(this.getAttribute("href"));
                target.scrollIntoView({ behavior: "smooth" });

                // Remove zoom effect class from bg div
                const bg = document.querySelector(".rotate-container");
                bg.classList.remove("zoom-effect");

                // Apply zoom effect to column divs in mySkills section
                if (target.id === "mySkills") {
                    const columns = document.querySelectorAll(".caption");
                    columns.forEach(column => {
                        column.classList.add("zoom-effect");
                    });
                }
            });
        }
    });
    
    // Apply zoom effect to the bg div when the page loads
    window.onload = function () {
        const hash = window.location.hash;
        if (hash === "#mySkills") {
            const bg = document.querySelector(".rotate-container");
            bg.classList.add("zoom-effect");
            
            const columns = document.querySelectorAll(".caption");
            columns.forEach(column => {
                column.classList.add("zoom-effect");
            });
        }
    };