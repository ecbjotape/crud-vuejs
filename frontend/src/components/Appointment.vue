<template>
  <div class="mx-auto">
    <b-container>
      <b-button v-b-modal.modal-appointment>Marcar consulta</b-button>
      <b-button v-b-modal.modal-2>Cadastrar médico</b-button>
      <b-button v-b-modal.modal-3>Cadastrar especialidade</b-button>
      <b-button v-b-modal.modal-type>Cadastrar tipo de consulta</b-button>
      <b-button v-b-modal.modal-patient>Cadastrar paciente</b-button>
    </b-container>

    <!-- modal para marcar consulta -->
    <b-modal
      id="modal-appointment"
      title="Marcar consulta"
      ref="modal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="createAppointment">
        <div class="col">
          <label for="input-live">Paciente:</label>
          <b-form-select
            v-model="patientSelected"
            :options="patients"
            required
          ></b-form-select>
        </div>
        <div class="col">
          <label for="input-live">Especialidade:</label>
          <b-form-select
            v-model="specialtySelected"
            :options="speciality"
            required
          />
        </div>
        <div class="col">
          <label for="input-live">Tipo de consulta:</label>
          <b-form-select v-model="typeSelected" :options="types" required />
        </div>
        <div class="col">
          <label>Médico:</label>
          <b-form-select v-model="doctorSelected" :options="doctors" required />
        </div>
        <div class="col">
          <label>Data:</label>
          <b-form-input type="datetime-local" v-model="hourSelected" />
        </div>
      </form>
    </b-modal>

    <!-- modal para cadastrar médico -->
    <b-modal id="modal-2" title="Cadastrar médico">
      <div class="col">
        <label for="input-live">Nome do médico:</label>
        <b-form-input v-model="text" placeholder="Digite o nome do médico" />
      </div>
      <div class="col">
        <label for="input-live">Especialidade:</label>
        <b-form-select v-model="selected" :options="speciality"></b-form-select>
      </div>
      <div class="col">
        <label>CRM:</label>
        <b-form-input v-model="text" placeholder="Digite o CRM do médico" />
      </div>
      <div class="col">
        <label>Data:</label>
        <b-form-input type="datetime-local"></b-form-input>
      </div>
    </b-modal>

    <!-- modal para cadastrar especialidade -->
    <b-modal id="modal-3" title="Cadastrar especialidade">
      <div class="col">
        <label for="input-live">Especialidade:</label>
        <b-form-input
          v-model="text"
          placeholder="Digite o nome da especialidade"
        />
      </div>
    </b-modal>

    <!-- modal para cadastrar tipo de consulta-->
    <b-modal id="modal-type" title="Cadastrar tipo de consulta" hide-footer>
      <b-form @submit="createType">
        <div class="col">
          <label>Tipo:</label>
          <b-form-input
            v-model="typeForm.name"
            placeholder="Ex: Presencial"
            type="text"
          />
        </div>
        <div class="col">
          <b-button class="ml-auto" variant="primary" type="submit"
            >Cadastrar tipo de consulta</b-button
          >
        </div>
      </b-form>
    </b-modal>

    <!-- modal para criar paciente -->
    <b-modal id="modal-patient" title="Cadastrar paciente" hide-footer>
      <b-form @submit="createPatient" id="patient" action="patient">
        <div class="col">
          <label>Nome do paciente:</label>
          <b-form-input
            v-model="patientForm.name"
            required
            placeholder="Digite o nome do paciente"
          />
        </div>
        <div class="col">
          <label>Telefone:</label>
          <b-form-input
            v-model="patientForm.phone"
            placeholder="(00) 00000-0000"
            type="number"
            required
          />
        </div>
        <div class="col">
          <label>CPF:</label>
          <b-form-input
            v-model="patientForm.cpf"
            placeholder="000.000.000-00"
            type="number"
            required
          />
        </div>
        <div class="col">
          <b-button class="ml-auto" variant="primary" type="submit"
            >Cadastrar paciente</b-button
          >
        </div>
      </b-form>
    </b-modal>
  </div>
</template>

<script>
import useDoctor from "@/hooks/useDoctor";
import usePatient from "@/hooks/usePatient";
import useTypeAppointment from "@/hooks/useTypeAppointment";
import useSpeciality from "@/hooks/useSpeciality";
import useAppointment from "@/hooks/useAppointment";

export default {
  name: "Appointment",
  data() {
    return {
      patientForm: {
        name: "",
        phone: "",
        cpf: "",
      },
      typeForm: {
        name: "",
      },

      specialtySelected: null,
      speciality: [{ value: null, text: "Selecione uma especialidade" }],

      doctorSelected: null,
      doctors: [{ value: null, text: "Selecione um médico" }],

      patientSelected: null,
      patients: [{ value: null, text: "Selecione um paciente" }],

      typeSelected: null,
      types: [{ value: null, text: "Selecione um tipo de consulta" }],

      hourSelected: null,
    };
  },
  created() {
    this.getSpecialitys();
    this.getDoctors();
    this.getPatients();
    this.getTypes();
  },
  methods: {
    createAppointment() {
      const AppointmentForm = {
        especialidade_id: this.specialtySelected,
        tipo_de_consulta_id: this.typeSelected,
        medico_id: this.doctorSelected,
        paciente_id: this.patientSelected,
        data: this.hourSelected,
      };

      const { createAppointment } = useAppointment();
      createAppointment(AppointmentForm);

      this.$bvModal.hide("modal-appointment");
    },

    handleOk(bvModalEvent) {
      bvModalEvent.preventDefault();
      this.createAppointment();

      this.$bvModal.hide("modal-appointment");
    },

    createPatient(event) {
      event.preventDefault();
      const { createPatient } = usePatient();
      createPatient(this.patientForm);

      this.$bvModal.hide("modal-patient");
    },

    createTypeAppointment(event) {
      event.preventDefault();
      const { createType } = useTypeAppointment();
      createType(this.typeForm);

      this.$bvModal.hide("modal-type");
    },

    async getSpecialitys() {
      const { getAllSpecialitys } = useSpeciality();

      const res = await getAllSpecialitys();

      res.data.map((esp) => {
        this.speciality.push({ value: esp.id, text: esp.especialidades });
      });
    },

    async getDoctors() {
      const { getAllDoctors } = useDoctor();

      const res = await getAllDoctors();

      res.data.data.map((doctor) => {
        this.doctors.push({ value: doctor.id, text: doctor.name });
      });
    },

    async getPatients() {
      const { getAllPatients } = usePatient();

      const res = await getAllPatients();

      res.data.data.map((patient) => {
        this.patients.push({ value: patient.id, text: patient.name });
      });
    },

    async getTypes() {
      const { getAllTypes } = useTypeAppointment();

      const res = await getAllTypes();

      res.data.map((type) => {
        this.types.push({ value: type.id, text: type.name });
      });
    },
  },
};
</script>

<style>
button {
  margin: 0px 16px 16px 0px;
  border: none;
}

.col {
  display: flex;
  flex-direction: column;
  gap: 4px;
  margin-bottom: 16px;
}
</style>
