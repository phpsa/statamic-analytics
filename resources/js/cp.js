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
    maxHeight: 200,
    fullSize: false,
  },
};

const BarChart = {
  extends: Bar,
  props: ["chartdata", "options"],
  mounted() {
    let options = chartOptions;
    options.legend.display = false;
    this.renderChart(this.chartdata, options);
  },
};

const LineChart = {
  extends: Line,
  props: ["chartdata", "options"],
  mounted() {
    let options = chartOptions;
    options.legend.display = false;
    this.renderChart(this.chartdata, options);
  },
};

const PieChart = {
  extends: Pie,
  props: ["chartdata", "options"],
  mounted() {
    let options = chartOptions;
    options.legend.display = false;
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
