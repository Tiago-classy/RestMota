// Simple button click event
document.getElementById("exploreBtn").addEventListener("click", () => {
    alert("Explore exciting Indian games!");
});

// Contact form submission handler
document.getElementById("contactForm").addEventListener("submit", (e) => {
    e.preventDefault(); // Prevent page reload
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;
    alert(`Thank you, ${name}! We will get back to you at ${email}.`);
});
