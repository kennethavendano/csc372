/*
    Kenneth Avendano
    2/8/26
*/

document.addEventListener("DOMContentLoaded", () => {
  // Portfolio filtering (works on pages that include `.filter-btn` + `.gallery-item`)
  const filterButtons = Array.from(document.querySelectorAll(".filter-btn"));
  const galleryItems = Array.from(document.querySelectorAll(".gallery-item"));

  if (filterButtons.length && galleryItems.length) {
    const applyFilter = (filter) => {
      galleryItems.forEach((item) => {
        const category = item.getAttribute("data-category");
        const shouldShow = filter === "all" || category === filter;
        item.style.display = shouldShow ? "" : "none";
      });
    };

    filterButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const filter = btn.getAttribute("data-filter") || "all";

        filterButtons.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        applyFilter(filter);
      });
    });

    // Ensure the initial active button filter is applied on load.
    const initiallyActive =
      filterButtons.find((b) => b.classList.contains("active")) || filterButtons[0];
    applyFilter(initiallyActive?.getAttribute("data-filter") || "all");
  }

  // Quote generator (works on pages with #quote-box + #new-quote-btn)
  const quoteBox = document.getElementById("quote-box");
  const quoteButton = document.getElementById("new-quote-btn");

  if (quoteBox && quoteButton) {
    async function loadQuote() {
      quoteBox.textContent = "Loading inspiration...";

      try {
        const response = await fetch(
          "https://zenquotes.io/api/random"
        );

        if (!response.ok) {
          throw new Error("Quote request failed");
        }

        const data = await response.json();

        // ZenQuotes returns an array like: [{ q: "...", a: "Author" }]
        const quote = Array.isArray(data) ? data[0] : null;
        const content = quote?.q;
        const author = quote?.a;

        if (!content || !author) {
          throw new Error("Unexpected quote format");
        }

        quoteBox.innerHTML = `"${content}"<br><br>— ${author}`;
      } catch (error) {
        console.error(error);
        quoteBox.textContent = "Unable to load inspiration right now.";
      }
    }

    quoteButton.addEventListener("click", loadQuote);
    loadQuote();
  }
});