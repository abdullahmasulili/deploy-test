<template>
  <v-row class="pa-5">
    <v-col class="d-flex justify-center">
      <apexchart width="600" type="bar" :options="options" :series="series">
      </apexchart>
    </v-col>
    <v-col>
      <v-row class="d-flex justify-center pa-10">
        <v-col cols="12">
          <v-select label="Year" :items="years"></v-select>
        </v-col>
        <v-col>
          <v-btn class="float-right" color="light-blue" dark>Filter</v-btn>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
//import axios from "axios";
export default {
  data() {
    return {
      years: [],
      months: [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Augustus",
        "September",
        "October",
        "November",
        "December",
      ],
      options: {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
        },
      },
      series: [
        {
          name: "series-1",
          data: [55, 62, 89, 66, 98, 72, 101, 75, 94, 120, 117, 139],
        },
      ],
    };
  },
  methods: {
    
  },
  created() {
    //this.getAllData();
  },
};
</script>