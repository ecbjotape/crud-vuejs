import api from "@/config/api";

const useRequest = () => {
  const get = (endpoint) => {
    return api.get(endpoint);
  };

  const post = (endpoint, body) => {
    return api.post(endpoint, body);
  };

  const put = (endpoint, body) => {
    return api.put(endpoint, body);
  };

  const remove = (endpoint, id) => {
    return api.delete(endpoint, id);
  };

  return { post, get, put, remove };
};

export default useRequest;
