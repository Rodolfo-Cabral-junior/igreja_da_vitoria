const JsonRepository = require("./JsonRepository");

class ContactMessageRepository extends JsonRepository {
    constructor() {
        super("contato-mensagens.json");
    }

    async create(messageData) {
        const messages = await this.findAll();
        const nextId = messages.length ? Math.max(...messages.map((item) => item.id)) + 1 : 1;

        const newMessage = {
            id: nextId,
            ...messageData,
            criadoEm: new Date().toISOString()
        };

        messages.push(newMessage);
        await this.saveAll(messages);

        return newMessage;
    }
}

module.exports = ContactMessageRepository;
