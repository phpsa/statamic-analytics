import { Bar } from "vue-chartjs";
import { Line } from "vue-chartjs";
import { Pie } from "vue-chartjs";
import { Doughnut } from "vue-chartjs";

import "chartjs-plugin-colorschemes/src/plugins/plugin.colorschemes";
import { Tableau20 } from "chartjs-plugin-colorschemes/src/colorschemes/colorschemes.tableau";

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    colorschemes: {
      scheme: Tableau20,
    },
  },
  legend: {
    display: false,
    position: "bottom",
    maxHeight: "200px",
    fullSize: false,
  },
};

const BarChart = {
  extends: Bar,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, chartOptions);
  },
};

const LineChart = {
  extends: Line,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, chartOptions);
  },
};

const PieChart = {
  extends: Pie,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, chartOptions);
  },
};

const DoughnutChart = {
  extends: Doughnut,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, chartOptions);
  },
};

Statamic.$components.register("bar-chart", BarChart);
Statamic.$components.register("line-chart", LineChart);
Statamic.$components.register("pie-chart", PieChart);
Statamic.$components.register("doughnut-chart", DoughnutChart);

Statamic.$components.register("ga_page_stats_field-fieldtype", {
  mixins: [Fieldtype],
  template: `
  <div class="container">
    <line-chart
      v-if="loaded"
      :styles="styles"
      :chartdata="chartdata"
      :options="options"/>
  </div>`,
  computed: {
    url() {
      return encodeURI(this.$parent.$parent.$parent.$parent.uri);
    },
    title() {
      return this.$parent.value.title;
    },
  },
  data: () => {
    let myOptions = chartOptions;
    myOptions.legend.display = true;
    return {
      loaded: false,
      chartdata: null,
      options: myOptions,
      styles: {
        height: "200px",
        position: "relative",
      },
    };
  },
  async mounted() {
    this.loaded = false;
    const entry = this.$parent.value.entry;
    try {
      const { data } = await this.$axios.get(
        `/!/statamic-analytics/page-data?entry=${entry}`
      );
      this.chartdata = data;
      this.loaded = true;
    } catch (e) {
      console.error(e);
    }
  },
});
