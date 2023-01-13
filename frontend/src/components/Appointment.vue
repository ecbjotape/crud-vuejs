<template>
  <div class="mx-auto">
    <b-container>
      <b-button v-b-modal.modal-1>Agendar</b-button>
      <b-button v-b-modal.modal-2>Cadastrar médico</b-button>
      <b-button v-b-modal.modal-3>Criar especialidade</b-button>
      <b-button v-b-modal.modal-4>Criar tipo</b-button>
      <b-button v-b-modal.modal-5>Criar paciente</b-button>
    </b-container>

    <!-- modal para marcar consulta -->
    <b-modal id="modal-1" title="Marcar consulta">
      <div class="col">
        <label for="input-live">Paciente:</label>
        <b-form-select v-model="selected" :options="options"></b-form-select>
      </div>
      <div class="col">
        <label for="input-live">Especialidade:</label>
        <b-form-select v-model="selected" :options="options" />
      </div>
      <div class="col">
        <label for="input-live">Tipo:</label>
        <b-form-select v-model="selected" :options="options" />
      </div>
      <div class="col">
        <label>Médico:</label>
        <b-form-input v-model="text" placeholder="Digite o CRM do médico" />
      </div>
      <div class="col">
        <label>Data:</label>
        <b-form-input type="datetime-local" />
      </div>
    </b-modal>

    <!-- modal para cadastrar médico -->
    <b-modal id="modal-2" title="Cadastrar médico">
      <div class="col">
        <label for="input-live">Nome do médico:</label>
        <b-form-input v-model="text" placeholder="Digite o nome do médico" />
      </div>
      <div class="col">
        <label for="input-live">Especialidade:</label>
        <b-form-select v-model="selected" :options="options"></b-form-select>
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
    <b-modal id="modal-4" title="Cadastrar tipo de consulta">
      <div class="col">
        <label>Especialidades:</label>
        <b-form-select
          v-model="specialtySelected"
          :options="specialty"
        ></b-form-select>
      </div>
      <div class="col">
        <label>Tipo:</label>
        <b-form-input
          v-model="text"
          placeholder="Digite o tipo de consulta"
          type="text"
        />
      </div>
    </b-modal>

    <!-- modal para criar paciente -->
    <b-modal id="modal-5" title="Cadastrar paciente">
      <div class="col">
        <label>Nome do paciente:</label>
        <b-form-input v-model="text" placeholder="Digite o nome do paciente" />
      </div>
      <div class="col">
        <label>Telefone:</label>
        <b-form-input
          v-model="tel"
          placeholder="(00) 00000-0000"
          type="number"
        />
      </div>
      <div class="col">
        <label>CPF:</label>
        <b-form-input
          v-model="number"
          placeholder="000.000.000-00"
          type="number"
        />
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  name: "Appointment",
  data() {
    return {
      selected: null,
      options: [
        { value: null, text: "Selecione uma especialidade" },
        { value: "a", text: "This is First option" },
        { value: "b", text: "Selected Option" },
        { value: "teste", text: "This is an option with object value" },
        { value: "d", text: "This one is disabled", disabled: true },
      ],
      specialtySelected: null,
      specialty: [
        { value: "psquiatria", text: "Psiquiatra" },
        { value: "pediatria", text: "Pediatra" },
        { value: "Oftalmologia", text: "Oftalmologista" },
      ],
    };
  },
};
</script>

<style>
button {
  margin: 0px 16px 16px 0px;
}

.col {
  display: flex;
  flex-direction: column;
  gap: 4px;
  margin-bottom: 16px;
}
</style>
