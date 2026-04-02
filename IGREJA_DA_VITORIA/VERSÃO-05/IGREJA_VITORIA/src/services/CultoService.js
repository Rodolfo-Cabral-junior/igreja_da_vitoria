const CultoRepository = require("../repositories/CultoRepository");
const Culto = require("../models/Culto");

class CultoService {
    constructor({ cultoRepository } = {}) {
        this.cultoRepository = cultoRepository || new CultoRepository();
    }

    async list() {
        const cultos = await this.cultoRepository.findAll();
        return cultos.map((culto) => new Culto(culto));
    }
}

module.exports = CultoService;
