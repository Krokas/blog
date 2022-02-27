import PostRepository from "./postRepository";
import ImageRepository from "./imageRepository";

const repositories = {
    post: PostRepository,
    image: ImageRepository,
};

const RepositoryFactory = {
    get: (name) => repositories[name],
};

export default RepositoryFactory;
