import useRequest from "./useRequests";

const useTypeAppointment = () => {
  const { get, remove, post } = useRequest();

  const getAllTypes = async () => {
    return await get("tipo-de-consulta");
  };

  const createType = async (body) => {
    return await post("/tipo-de-consulta/create", body);
  };

  const deleteType = async (id) => {
    return await remove("/tipo-de-consulta/delete", id);
  };

  return { getAllTypes, createType, deleteType };
};

export default useTypeAppointment;
