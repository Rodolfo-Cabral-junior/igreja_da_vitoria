const CultoService = require("../services/CultoService");

class CultosController {
    constructor({ cultoService } = {}) {
        this.cultoService = cultoService || new CultoService();
        this.list = this.list.bind(this);
    }

    async list(req, res) {
        const cultos = await this.cultoService.list();
        return res.json(cultos);
    }
}

module.exports = new CultosController();
