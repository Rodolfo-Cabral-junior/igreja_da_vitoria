const JsonRepository = require("./JsonRepository");

class PrayerRequestRepository extends JsonRepository {
    constructor() {
        super("pedidos-oracao.json");
    }

    async create(requestData) {
        const requests = await this.findAll();
        const nextId = requests.length ? Math.max(...requests.map((item) => item.id)) + 1 : 1;

        const newRequest = {
            id: nextId,
            ...requestData,
            criadoEm: new Date().toISOString()
        };

        requests.push(newRequest);
        await this.saveAll(requests);

        return newRequest;
    }
}

module.exports = PrayerRequestRepository;
