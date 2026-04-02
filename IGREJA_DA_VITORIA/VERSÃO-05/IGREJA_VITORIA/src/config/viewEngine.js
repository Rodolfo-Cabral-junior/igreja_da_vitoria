const path = require("path");

function configureViewEngine(app) {
    app.set("view engine", "ejs");
    app.set("views", path.join(__dirname, "../views/templates"));
}

module.exports = configureViewEngine;
