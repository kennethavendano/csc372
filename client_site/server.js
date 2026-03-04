const path = require("path");
const express = require("express");
const exphbs = require("express-handlebars");

const app = express();
const PORT = process.env.PORT || 3000;


app.engine("handlebars", exphbs.engine({ defaultLayout: "main" }));
app.set("view engine", "handlebars");

app.use(express.static(path.join(__dirname, "public")));


app.get("/", (req, res) => {
  res.render("home", {
    pageTitle: "Home",
    message: "Welcome to Ichacaps Sports Photography"
  });
});

app.get("/portfolio", (req, res) => {
  res.render("portfolio", {
    pageTitle: "Portfolio",
    galleryCount: 6
  });
});

app.get("/services", (req, res) => {
  res.render("services", {
    pageTitle: "Services",
    promo: "Professional photography packages available."
  });
});

app.get("/about", (req, res) => {
  res.render("about", {
    pageTitle: "About",
    bio: "Sports photographer capturing action moments."
  });
});

app.get("/book", (req, res) => {
  res.render("book", {
    pageTitle: "Book",
    bookingNote: "Fill out the form and we will contact you soon."
  });
});


app.use((req, res) => {
  res.status(404).render("404", {
    pageTitle: "404 - Page Not Found"
  });
});

app.use((err, req, res, next) => {
  console.error(err);
  res.status(500).render("500", {
    pageTitle: "500 - Server Error"
  });
});

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});