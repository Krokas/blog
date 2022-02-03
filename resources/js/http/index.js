import PostRepository from "./postRepository";

const repositories = {
    post: PostRepository,
};

const RepositoryFactory = {
    get: (name) => repositories[name],
};

export default RepositoryFactory;
