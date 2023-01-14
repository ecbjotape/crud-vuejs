import useRequest from "./useRequests";

const usePatient = () => {
  const { get, remove, post } = useRequest();

  const getAllPatients = async () => {
    return await get("paciente");
  };

  const createPatient = async (body) => {
    return await post("/paciente/create", body);
  };

  const deletePatient = async (id) => {
    return await remove("/paciente/delete", id);
  };
  return { getAllPatients, createPatient, deletePatient };
};

export default usePatient;
