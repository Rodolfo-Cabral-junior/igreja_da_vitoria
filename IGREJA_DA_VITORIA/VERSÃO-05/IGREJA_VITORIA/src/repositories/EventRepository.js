const JsonRepository = require("./JsonRepository");

class EventRepository extends JsonRepository {
    constructor() {
        super("eventos.json");
    }

    async create(eventData) {
        const events = await this.findAll();
        const nextId = events.length ? Math.max(...events.map((event) => event.id)) + 1 : 1;
        const newEvent = { id: nextId, ...eventData };

        events.push(newEvent);
        await this.saveAll(events);

        return newEvent;
    }
}

module.exports = EventRepository;
