import Repository from "./api";

const resource = "image";
export default {
    adminDelete(id) {
        return Repository.delete(`admin/${resource}/${id}`);
    },
    getAll() {
        return Repository.get(`admin/${resource}/all`);
    },
};
