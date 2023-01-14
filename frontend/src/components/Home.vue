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

export default {
  name: "Home",
  components: {
    Appointment,
    TableAppointments,
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
