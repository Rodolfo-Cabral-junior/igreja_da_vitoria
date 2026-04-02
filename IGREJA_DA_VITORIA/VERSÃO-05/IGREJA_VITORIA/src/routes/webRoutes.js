const express = require("express");
const HomeController = require("../controllers/HomeController");
const PrayerController = require("../controllers/PrayerController");
const ContactController = require("../controllers/ContactController");

const router = express.Router();

router.get("/", HomeController.index);
router.get("/index.html", (req, res) => res.redirect("/"));
router.post("/pedidos-oracao", PrayerController.create);
router.post("/contato", ContactController.create);

module.exports = router;
