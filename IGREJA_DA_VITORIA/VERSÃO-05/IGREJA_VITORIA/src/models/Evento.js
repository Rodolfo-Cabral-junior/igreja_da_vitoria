class Evento {
    constructor({ id, titulo, data, horario, descricao, categoria }) {
        this.id = id;
        this.titulo = titulo;
        this.data = data;
        this.horario = horario;
        this.descricao = descricao;
        this.categoria = categoria;
    }
}

module.exports = Evento;
