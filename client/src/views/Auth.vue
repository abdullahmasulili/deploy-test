<template>
  <v-app>
    <v-row class="fill-height flex-column justify-center align-center" style="background-color: #ceeaf6">
      <v-card width="500" class="mx-auto pt-10 pa-10" elevation="8" rounded="xl">
        <v-img src="../assets/logo_kedas.png"></v-img>
            <v-card-title class="justify-center" style="font-size: 1.5rem;"
              >Kedas Beauty</v-card-title
            >
            <v-card-text>
              <v-form>
                <v-text-field
                  label="User ID"
                  prepend-icon="mdi-account-circle"
                ></v-text-field>
                <v-text-field
                  label="Password"
                  prepend-icon="mdi-lock"
                  type="password"
                ></v-text-field>
              </v-form>
            </v-card-text>
            <v-card-actions class="pt-0">
              <v-spacer></v-spacer>
              <v-btn text color="light-blue accent-4">
                Login
              </v-btn>
            </v-card-actions>
      </v-card>
    </v-row>
    <!-- <v-main style="background-color: #ceeaf6">
      <v-container>
        <v-content>
          <v-card width="500" class="mx-auto pt-10 pa-10">
            <v-img src="../assets/logo_kedas.png"></v-img>
            <v-card-title class="justify-center text-h5"
              >Kedas Beauty</v-card-title
            >
            <v-card-text>
              <v-form>
                <v-text-field
                  label="User ID"
                  prepend-icon="mdi-account-circle"
                ></v-text-field>
                <v-text-field
                  label="Password"
                  prepend-icon="mdi-lock"
                  type="password"
                ></v-text-field>
              </v-form>
            </v-card-text>
            <v-card-actions class="pt-0">
              <v-spacer></v-spacer>
              <v-btn text color="light-blue accent-4">
                Login
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-content>
      </v-container>
    </v-main> -->
    <v-footer dark padless>
      <v-card class="flex" flat tile>
        <v-card-text class="py-2 white--text text-center">
          {{ new Date().getFullYear() }} —
          <strong>PT. MAHAPURNA MANDIRI UTAMA</strong>
        </v-card-text>
      </v-card>
    </v-footer>
  </v-app>
</template>

<style>

</style>

<script>
export default {
  name: "auth",
  title: "User Authentication",
  data() {
    return {
      valid: true,
      name: "",
      nameRules: [
        (v) => !!v || "Name is required",
        (v) => (v && v.length <= 10) || "Name must be less than 10 characters",
      ],
      email: "",
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
      ],
      select: null,
      items: ["Item 1", "Item 2", "Item 3", "Item 4"],
      checkbox: false,
    };
  },
  methods: {
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
  },
};
</script>
