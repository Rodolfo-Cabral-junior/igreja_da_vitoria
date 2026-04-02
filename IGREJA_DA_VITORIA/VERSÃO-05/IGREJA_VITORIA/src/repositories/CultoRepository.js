const JsonRepository = require("./JsonRepository");

class CultoRepository extends JsonRepository {
    constructor() {
        super("cultos.json");
    }
}

module.exports = CultoRepository;
