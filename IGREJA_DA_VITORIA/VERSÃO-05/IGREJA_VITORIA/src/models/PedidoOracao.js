class PedidoOracao {
    constructor({ id, nome, cidadeEstado, categoria, motivo, autorizadoCompartilhar, criadoEm }) {
        this.id = id;
        this.nome = nome;
        this.cidadeEstado = cidadeEstado;
        this.categoria = categoria;
        this.motivo = motivo;
        this.autorizadoCompartilhar = autorizadoCompartilhar;
        this.criadoEm = criadoEm;
    }
}

module.exports = PedidoOracao;
