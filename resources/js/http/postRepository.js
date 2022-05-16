import Repository from "./api";

const resource = "post";
export default {
    adminToggle(id) {
        return Repository.post(`admin/${resource}/${id}/toggle`);
    },
};
