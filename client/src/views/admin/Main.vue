<template>
  <v-row no-gutter class="pa-10">
    <v-col cols='8' sm="12" md="12" lg="8" xl="8">
      <v-card elevation="8" rounded="xl">
        <v-card-title>Chart Jumlah Reseller</v-card-title>
        <br>
        <div class="d-flex justify-center">
            <bar-chart></bar-chart>
        </div>
      </v-card>
    </v-col>
    <v-col cols="4" sm="12" md="12" lg="4">
        <v-card elevation="8" rounded="xl">
        <v-card-title class="justify-center">Chart Status Reseller</v-card-title>
            <donut-chart></donut-chart>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import BarChart from '../../components/BarChart.vue';
import DonutChart from '../../components/DonutChart.vue';
export default {
  data() {
    return {

    }
  },
  components: {
    BarChart,
    DonutChart
  }
};
</script>