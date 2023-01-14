<template>
  <div class="table">
    <b-table striped hover :items="items" v-b-modal.detailsAppointment>
    </b-table>
    <b-modal id="detailsAppointment" title="Detalhes da consulta">
      <b-row>
        <b-col>Médico: </b-col>
        <b-col>Especialidade: </b-col>
      </b-row>
    </b-modal>
  </div>
</template>

<script>
export default {
  name: "TableAppointments",
  data() {
    return {
      fields: ["Médico", "Paciente"],
      items: [
        { Médico: "jotape", Paciente: "dona ju" },
        { Médico: "vivi", Paciente: "dona ju" },
        { Médico: "pietra", Paciente: "dona ju" },
        { Médico: "Nala", Paciente: "dona ju" },
      ],
    };
  },
  methods: {},
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
