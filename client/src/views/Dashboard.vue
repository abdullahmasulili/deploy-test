<template>
  <v-app>
    <Nav />
    <div class="fill-height light-blue lighten-3">
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </div>
  </v-app>
</template>

<script>
import Nav from "../components/Nav.vue";
export default {
  data() {
    return {};
  },
  components: {
    Nav,
  },
};
</script>