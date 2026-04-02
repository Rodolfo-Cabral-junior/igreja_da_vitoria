const EventRepository = require("../repositories/EventRepository");
const Evento = require("../models/Evento");

class EventService {
    constructor({ eventRepository } = {}) {
        this.eventRepository = eventRepository || new EventRepository();
    }

    async list() {
        const events = await this.eventRepository.findAll();
        return events.map((event) => new Evento(event));
    }

    async create(dto) {
        this.validate(dto);

        const payload = {
            titulo: dto.titulo.trim(),
            data: dto.data,
            horario: dto.horario,
            descricao: dto.descricao.trim(),
            categoria: dto.categoria.trim().toLowerCase()
        };

        const created = await this.eventRepository.create(payload);
        return new Evento(created);
    }

    validate(dto) {
        const requiredFields = ["titulo", "data", "horario", "descricao", "categoria"];

        requiredFields.forEach((field) => {
            if (!dto[field] || String(dto[field]).trim() === "") {
                throw new Error(`Campo obrigatório ausente: ${field}`);
            }
        });
    }
}

module.exports = EventService;
