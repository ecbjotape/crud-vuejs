<template>
  <div class="home">
    <Home />
  </div>
</template>

<script>
// @ is an alias to /src
import Home from "@/components/Home.vue";
import useDoctor from "@/hooks/useDoctor";

export default {
  name: "HomeView",
  components: {
    Home,
  },
  created() {
    this._getDoctor();
  },
  data() {
    return {
      doctor: {},
      Specialty: {},
    };
  },
  methods: {
    _getDoctor() {
      const { getAllDoctors } = useDoctor();
      getAllDoctors();
    },
  },
};
</script>
