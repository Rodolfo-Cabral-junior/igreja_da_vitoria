const JsonRepository = require("./JsonRepository");

class ContactRepository extends JsonRepository {
    constructor() {
        super("contatos.json");
    }

    async getContactInfo() {
        return this.findAll();
    }
}

module.exports = ContactRepository;
