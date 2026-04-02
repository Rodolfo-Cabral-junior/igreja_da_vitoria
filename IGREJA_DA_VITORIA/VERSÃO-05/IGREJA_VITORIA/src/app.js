const express = require("express");
const path = require("path");
const configureViewEngine = require("./config/viewEngine");
const routes = require("./routes");

const app = express();

configureViewEngine(app);

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "public")));

app.use(routes);

module.exports = app;
