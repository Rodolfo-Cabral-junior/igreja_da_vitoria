const JsonRepository = require("./JsonRepository");

class MinistryRepository extends JsonRepository {
    constructor() {
        super("ministerios.json");
    }
}

module.exports = MinistryRepository;
