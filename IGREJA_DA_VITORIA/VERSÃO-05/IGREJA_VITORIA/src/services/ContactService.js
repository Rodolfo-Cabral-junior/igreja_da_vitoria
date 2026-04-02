const ContactMessageRepository = require("../repositories/ContactMessageRepository");
const MensagemContato = require("../models/MensagemContato");

class ContactService {
    constructor({ contactMessageRepository } = {}) {
        this.contactMessageRepository = contactMessageRepository || new ContactMessageRepository();
    }

    async create(dto) {
        this.validate(dto);

        const payload = {
            nome: dto.nome.trim(),
            email: dto.email.trim(),
            mensagem: dto.mensagem.trim()
        };

        const created = await this.contactMessageRepository.create(payload);
        return new MensagemContato(created);
    }

    validate(dto) {
        const requiredFields = ["nome", "email", "mensagem"];

        requiredFields.forEach((field) => {
            if (!dto[field] || String(dto[field]).trim() === "") {
                throw new Error(`Campo obrigatório ausente: ${field}`);
            }
        });

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(dto.email)) {
            throw new Error("E-mail inválido.");
        }
    }
}

module.exports = ContactService;
