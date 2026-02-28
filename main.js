
/* Mobile Menu */
const menuToggle = document.getElementById('menuToggle');
const navMenu = document.getElementById('navMenu');
menuToggle.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

/* Footer Year */
document.getElementById('year').textContent = new Date().getFullYear();

/* Scroll Animations */
const animatedEls = document.querySelectorAll('.fade-up, .fade-left, .fade-right');
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    }
  });
}, { threshold: 0.15 });
animatedEls.forEach(el => observer.observe(el));

/* Contact Form Backend */
const contactForm = document.getElementById('contactForm');
const formStatus = document.getElementById('formStatus');
contactForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(contactForm);
  const res = await fetch('backend/save_lead.php', {
    method: 'POST',
    body: formData
  });
  const result = await res.json();
  if (result.success) {
    formStatus.style.display = 'block';
    contactForm.reset();
  } else {
    alert('Something went wrong. Please try again.');
  }
});

/* Razorpay Payment */
function startPayment(course, amount) {
  const options = {
    key: "RAZORPAY_KEY_ID_HERE",
    amount: amount * 100,
    currency: "INR",
    name: "Sarkar Traders",
    description: course,
    handler: function (response) {
      fetch('backend/save_payment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          payment_id: response.razorpay_payment_id,
          course: course,
          amount: amount
        })
      });
      alert('Payment successful! Our team will contact you shortly.');
    },
    theme: { color: "#2563eb" }
  };
  const rzp = new Razorpay(options);
  rzp.open();
}
