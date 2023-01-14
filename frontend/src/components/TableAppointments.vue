<template>
  <div class="table">
    <b-table-simple hover dark>
      <b-thead>
        <b-th v-for="item in fields" v-bind:key="item">{{ item }}</b-th>
      </b-thead>
      <b-tbody>
        <b-tr
          v-for="item in items"
          v-bind:key="item"
          v-b-modal.detailsAppointment
          @click="getDetailsAppointment(item)"
        >
          <b-td>{{ item.medico }}</b-td>
          <b-td>{{ item.paciente }}</b-td>
        </b-tr>
      </b-tbody>
    </b-table-simple>
    <!-- modal de detalhes da consulta -->
    <b-modal id="detailsAppointment" title="Detalhes da consulta">
      <b-row>
        <b-col
          ><h5>Paciente:</h5>
          <p>{{ appointmentDetails.paciente }}</p></b-col
        >
        <b-col>
          <h5>Tipo:</h5>
          <p>{{ appointmentDetails.tipo }}</p>
        </b-col>
        <b-col>
          <h5>Hora:</h5>
          <p>{{ appointmentDetails.horario }}</p>
        </b-col>
      </b-row>
      <b-row>
        <b-col
          ><h5>Médico:</h5>
          <p>{{ appointmentDetails.medico }}</p></b-col
        >
        <b-col>
          <h5>Especialidade:</h5>
          <p>{{ appointmentDetails.especialidade }}</p>
        </b-col>
      </b-row>
    </b-modal>
  </div>
</template>

<script>
import useAppointment from "@/hooks/useAppointment";

export default {
  name: "TableAppointments",
  data() {
    return {
      fields: ["Médico", "Paciente"],
      items: [],
      appointmentDetails: [],
    };
  },
  created() {
    this.getAppointments();
  },
  methods: {
    async getAppointments() {
      const { getAllAppointments } = useAppointment();

      const res = await getAllAppointments();

      res.data.data.map((appointment) => {
        this.items.push({
          medico: appointment.medico.name,
          especialidade: appointment.especialidade.especialidades,
          paciente: appointment.paciente.name,
          tipo: appointment.tipo_de_consulta.name,
          horario: appointment.data,
        });
      });
    },

    getDetailsAppointment(appointment) {
      this.appointmentDetails = appointment;
    },
  },
};
</script>
<style>
.table {
  max-width: 768px;
}
tr {
  cursor: pointer;
}
</style>
