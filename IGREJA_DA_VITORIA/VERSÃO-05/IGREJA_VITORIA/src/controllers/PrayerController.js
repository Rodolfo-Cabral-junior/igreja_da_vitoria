const PrayerService = require("../services/PrayerService");

class PrayerController {
    constructor({ prayerService } = {}) {
        this.prayerService = prayerService || new PrayerService();
        this.create = this.create.bind(this);
    }

    async create(req, res) {
        try {
            await this.prayerService.create(req.body);
            return res.redirect("/?sucesso=pedido-oracao-enviado");
        } catch (error) {
            return res.status(400).send(`Erro ao enviar pedido de oração: ${error.message}`);
        }
    }
}

module.exports = new PrayerController();
