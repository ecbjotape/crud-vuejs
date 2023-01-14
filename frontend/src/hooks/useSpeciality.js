import useRequest from "./useRequests";

const useSpeciality = () => {
  const { get, remove, post } = useRequest();

  const getAllSpecialitys = async () => {
    return await get("especialidades");
  };

  const createSpeciality = async (body) => {
    return await post("/especialidades/create", body);
  };

  const deleteSpeciality = async (id) => {
    return await remove("/especialidades/delete", id);
  };

  return { getAllSpecialitys, createSpeciality, deleteSpeciality };
};

export default useSpeciality;
