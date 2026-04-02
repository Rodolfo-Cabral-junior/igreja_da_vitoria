const EventService = require("../services/EventService");

class EventController {
    constructor({ eventService } = {}) {
        this.eventService = eventService || new EventService();
        this.list = this.list.bind(this);
        this.create = this.create.bind(this);
    }

    async list(req, res) {
        const eventos = await this.eventService.list();
        return res.json(eventos);
    }

    async create(req, res) {
        try {
            const evento = await this.eventService.create(req.body);
            return res.status(201).json(evento);
        } catch (error) {
            return res.status(400).json({ message: error.message });
        }
    }
}

module.exports = new EventController();
