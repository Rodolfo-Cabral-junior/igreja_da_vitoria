class MensagemContato {
    constructor({ id, nome, email, mensagem, criadoEm }) {
        this.id = id;
        this.nome = nome;
        this.email = email;
        this.mensagem = mensagem;
        this.criadoEm = criadoEm;
    }
}

module.exports = MensagemContato;
