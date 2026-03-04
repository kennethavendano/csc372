const http = require("http");
const fs = require("fs");
const path = require("path");

const PORT = 3000;

function getContentType(filePath) {
  const ext = path.extname(filePath).toLowerCase();
  if (ext === ".html") return "text/html; charset=utf-8";
  if (ext === ".css") return "text/css; charset=utf-8";
  if (ext === ".js") return "text/javascript; charset=utf-8";
  if (ext === ".png") return "image/png";
  if (ext === ".jpg" || ext === ".jpeg") return "image/jpeg";
  if (ext === ".svg") return "image/svg+xml";
  return "application/octet-stream";
}

function serveStaticFile(res, filePath, statusCode) {
  fs.readFile(filePath, (err, data) => {
    if (err) {
      res.writeHead(500, { "Content-Type": "text/plain; charset=utf-8" });
      res.end("500 - Server Error");
      return;
    }
    res.writeHead(statusCode, { "Content-Type": getContentType(filePath) });
    res.end(data);
  });
}

function normUrl(url) {
  let clean = url.split("?")[0].toLowerCase();
  if (clean.length > 1 && clean.endsWith("/")) clean = clean.slice(0, -1);
  return clean;
}

const server = http.createServer((req, res) => {
  const publicDir = path.join(__dirname, "public");
  const urlPath = normaUrl(req.url);

  const routes = {
    "/": "index.html",
    "/portfolio": "portfolio.html",
    "/services": "services.html",
    "/about": "about.html",
    "/book": "book.html"
  };

  if (routes[urlPath]) {
    const pagePath = path.join(publicDir, routes[urlPath]);
    return fs.access(pagePath, fs.constants.F_OK, (err) => {
      if (err) return serveStaticFile(res, path.join(publicDir, "404.html"), 404);
      serveStaticFile(res, pagePath, 200);
    });
  }

  const safePath = path.normize(urlPath).replace(/^(\.\.[\/\\])+/, "");
  const filePath = path.join(publicDir, safePath);

  fs.access(filePath, fs.constants.F_OK, (err) => {
    if (err) return serveStaticFile(res, path.join(publicDir, "404.html"), 404);
    serveStaticFile(res, filePath, 200);
  });
});

server.listen(PORT);

console.log("Server running at http://localhost:" + PORT);