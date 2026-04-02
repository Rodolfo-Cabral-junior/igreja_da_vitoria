const ContactService = require("../services/ContactService");

class ContactController {
    constructor({ contactService } = {}) {
        this.contactService = contactService || new ContactService();
        this.create = this.create.bind(this);
    }

    async create(req, res) {
        try {
            await this.contactService.create(req.body);
            return res.redirect("/?sucesso=contato-enviado");
        } catch (error) {
            return res.status(400).send(`Erro ao enviar mensagem: ${error.message}`);
        }
    }
}

module.exports = new ContactController();
