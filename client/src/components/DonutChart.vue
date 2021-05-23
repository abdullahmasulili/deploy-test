<template>
  <v-row class="d-flex justify-center pa-5">
    <apexchart
      width="400"
      type="donut"
      :options="chartOptions"
      :series="series"
    >
    </apexchart>
  </v-row>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      series: [],
      chartOptions: {
        chart: {
          type: "donut",
        },
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true,
                total: {
                  showAlways: true,
                  show: true,
                },
              },
            },
          },
        },
        labels: ["Aktif", "Tidak Aktif"],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      },
    };
  },
  methods: {
    async getActiveCount() {
      await axios
        .get("http://192.168.137.1:8000/api/reseller/active/count")
        .then((response) => {
          this.series.push(response.data);
        });
    },

    async getUnactiveCount() {
      await axios
        .get("http://192.168.137.1:8000/api/reseller/unactive/count")
        .then((response) => {
          this.series.push(response.data);
        });
    },
  },
  created() {
    this.getActiveCount();
    this.getUnactiveCount();
  },
};
</script>