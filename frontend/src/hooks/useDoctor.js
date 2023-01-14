import useRequest from "./useRequests";

const useDoctor = () => {
  const { get, remove, post } = useRequest();

  const getAllDoctors = async () => {
    return await get("medico");
  };

  const createDoctor = async (body) => {
    return await post("/medico/create", body);
  };

  const deleteDoctor = async (id) => {
    return await remove("/medico/delete", id);
  };
  return { getAllDoctors, createDoctor, deleteDoctor };
};

export default useDoctor;
