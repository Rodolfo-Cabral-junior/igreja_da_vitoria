const express = require("express");
const webRoutes = require("./webRoutes");
const apiRoutes = require("./apiRoutes");

const router = express.Router();

router.use(webRoutes);
router.use("/api", apiRoutes);

module.exports = router;
