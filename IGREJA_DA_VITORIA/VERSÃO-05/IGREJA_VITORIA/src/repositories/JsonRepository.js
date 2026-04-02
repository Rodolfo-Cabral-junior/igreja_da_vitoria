const fs = require("fs/promises");
const path = require("path");

class JsonRepository {
    constructor(relativeFilePath) {
        this.filePath = path.join(__dirname, "../data", relativeFilePath);
    }

    async findAll() {
        const content = await fs.readFile(this.filePath, "utf-8");
        return JSON.parse(content);
    }

    async saveAll(items) {
        await fs.writeFile(this.filePath, JSON.stringify(items, null, 2), "utf-8");
        return items;
    }
}

module.exports = JsonRepository;
