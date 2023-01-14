<template>
  <div class="home" id="home">
    <h1>Agendamento de consultas</h1>

    <Appointment />

    <TableAppointments />
  </div>
</template>

<script>
import Appointment from "./Appointment.vue";
import TableAppointments from "./TableAppointments.vue";
import api from "../api";

export default {
  name: "Home",
  components: {
    Appointment,
    TableAppointments,
  },
  created() {
    this.getUser();
  },
  methods: {
    getDoctors() {
      api
        .get("/medicos")
        .then((res) => {
          this.doctor = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getSpecialty() {
      api
        .get("/especialidades")
        .then((res) => {
          this.Specialty = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.home {
  padding: 40px;
  display: flex;
  gap: 32px;
  height: 100vh;
  flex-direction: column;
  align-items: center;
}
</style>
