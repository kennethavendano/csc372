<?php
include 'includes/header.php';
?>

<main>
  <h1 class="page-title">About Ichacaps</h1>

  <div class="service-details-page">
    <div class="service-details-container">
      <div class="service-image" aria-label="Map of Providence, Rhode Island">
        <iframe
          title="Providence, RI Map"
          src="https://www.google.com/maps?q=Providence%2C%20RI&output=embed"
          width="100%"
          height="360"
          style="border:0; border-radius: 12px;"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          allowfullscreen
        ></iframe>
      </div>

      <div class="service-details">
        <p><strong>Who am I?</strong></p>
        <p>
          I’m <strong>Ichacaps</strong> a Providence, Rhode Island photographer who loves capturing real moments.
          From the energy of sports to clean portraits and events, I’m all about turning your best moments into
          photos you’ll want to keep forever.
        </p>

        <p>
          If you book with me, we’ll talk through the vibe you want, pick a location, and I’ll make sure you feel
          comfortable in front of the camera.
        </p>

        <p><strong>Based in:</strong> Providence, RI</p>
        <p><strong>Available for:</strong> Sports • Portraits • Events</p>
        <p><strong>Service area:</strong> Rhode Island • Massachusetts • Connecticut</p>
      </div>
    </div>
  </div>

  <section class="quote-generator" aria-label="Caption inspiration">
    <h2 class="quote-generator__title">Caption inspiration</h2>
    <p id="quote-box" class="quote-generator__box" role="status" aria-live="polite">
      Loading inspiration...
    </p>
    <button id="new-quote-btn" class="quote-generator__btn" type="button">
      New quote
    </button>
  </section>
</main>

<?php include 'includes/footer.php'; ?>

