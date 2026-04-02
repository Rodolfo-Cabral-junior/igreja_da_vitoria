const PrayerRequestRepository = require("../repositories/PrayerRequestRepository");
const PedidoOracao = require("../models/PedidoOracao");

class PrayerService {
    constructor({ prayerRequestRepository } = {}) {
        this.prayerRequestRepository = prayerRequestRepository || new PrayerRequestRepository();
    }

    async create(dto) {
        this.validate(dto);

        const payload = {
            nome: dto.nome.trim(),
            cidadeEstado: dto.cidadeEstado.trim(),
            categoria: dto.categoria.trim(),
            motivo: dto.motivo.trim(),
            autorizadoCompartilhar: dto.autorizadoCompartilhar === "on" || dto.autorizadoCompartilhar === true
        };

        const created = await this.prayerRequestRepository.create(payload);
        return new PedidoOracao(created);
    }

    validate(dto) {
        const requiredFields = ["nome", "cidadeEstado", "categoria", "motivo"];

        requiredFields.forEach((field) => {
            if (!dto[field] || String(dto[field]).trim() === "") {
                throw new Error(`Campo obrigatório ausente: ${field}`);
            }
        });
    }
}

module.exports = PrayerService;
