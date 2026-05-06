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
});