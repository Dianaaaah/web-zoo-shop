document.addEventListener("DOMContentLoaded", () => {

    const addBtn = document.querySelector(".add-to-cart");
    if (addBtn) {
        addBtn.addEventListener("click", () => {
            const productId = addBtn.dataset.id;
            fetch("add_to_cart.php", {
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body: "product_id=" + productId
            })
            .then(res => res.text())
            .then(text => document.getElementById("cart-message").innerText = text);
        });
    }

    document.querySelectorAll(".remove-from-cart").forEach(btn => {
        btn.addEventListener("click", () => {
            const productId = btn.dataset.id;
            fetch("remove_from_cart.php", {
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body: "product_id=" + productId
            })
            .then(res => res.text())
            .then(text => {
                document.getElementById("cart-message").innerText = text;
                btn.parentElement.style.display = "none";
            });
        });
    });


    const slides = document.querySelectorAll(".slide");
    let index = 0;

    if (slides.length > 0) {
        slides[index].classList.add("active");
        setInterval(() => {
            slides[index].classList.remove("active");
            index = (index + 1) % slides.length;
            slides[index].classList.add("active");
        }, 3000);
    }

});
