const HomePageService = require("../services/HomePageService");

class HomeController {
    constructor({ homePageService } = {}) {
        this.homePageService = homePageService || new HomePageService();
        this.index = this.index.bind(this);
    }

    async index(req, res, next) {
        try {
            const viewModel = await this.homePageService.getHomeData();
            const sucesso = req.query.sucesso || "";
            return res.render("home", { ...viewModel, sucesso });
        } catch (error) {
            return next(error);
        }
    }
}

module.exports = new HomeController();
