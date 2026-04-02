const express = require("express");
const EventController = require("../controllers/EventController");
const CultosController = require("../controllers/CultosController");

const router = express.Router();

router.get("/eventos", EventController.list);
router.post("/eventos", EventController.create);
router.get("/cultos", CultosController.list);

module.exports = router;
