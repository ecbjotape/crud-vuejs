import useRequest from "./useRequests";

const useDoctor = () => {
  const { get, remove, post } = useRequest();

  const getAllAppointments = async () => {
    return await get("consulta");
  };

  const createAppointment = async (body) => {
    return await post("/consulta/create", body);
  };

  const deleteAppointment = async (id) => {
    return await remove("/consulta/delete", id);
  };
  return { getAllAppointments, createAppointment, deleteAppointment };
};

export default useDoctor;
