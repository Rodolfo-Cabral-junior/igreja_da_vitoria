const EventRepository = require("../repositories/EventRepository");
const CultoRepository = require("../repositories/CultoRepository");
const MinistryRepository = require("../repositories/MinistryRepository");
const ContactRepository = require("../repositories/ContactRepository");

class HomePageService {
    constructor({ eventRepository, cultoRepository, ministryRepository, contactRepository } = {}) {
        this.eventRepository = eventRepository || new EventRepository();
        this.cultoRepository = cultoRepository || new CultoRepository();
        this.ministryRepository = ministryRepository || new MinistryRepository();
        this.contactRepository = contactRepository || new ContactRepository();
    }

    async getHomeData() {
        const [eventos, cultos, ministerios, contato] = await Promise.all([
            this.eventRepository.findAll(),
            this.cultoRepository.findAll(),
            this.ministryRepository.findAll(),
            this.contactRepository.getContactInfo()
        ]);

        return {
            hero: {
                titulo: "Igreja da Vitória – Jaraguá-GO",
                descricao:
                    "Uma igreja que crê na restauração, no poder da cruz e na vitória que há em Cristo Jesus, no Setor Aeroporto, em Jaraguá-GO.",
                endereco: "Setor Aeroporto, Quadra 13 - Rua José M. Francisco, Jaraguá-GO"
            },
            contato,
            cultos,
            eventos,
            ministerios
        };
    }
}

module.exports = HomePageService;
