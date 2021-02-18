import { Bar } from "vue-chartjs";
import { Line } from "vue-chartjs";
import { Pie } from "vue-chartjs";
import { Doughnut } from "vue-chartjs";
import { Radar } from "vue-chartjs";
import { PolarArea } from "vue-chartjs";
import { Bubble } from "vue-chartjs";
import { Scatter } from "vue-chartjs";

const BarChart = {
  extends: Bar,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const LineChart = {
  extends: Line,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const PieChart = {
  extends: Pie,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const DoughnutChart = {
  extends: Doughnut,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const RadarChart = {
  extends: Radar,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const PolarChart = {
  extends: PolarArea,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const BubbleChart = {
  extends: Bubble,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

const ScatterChart = {
  extends: Scatter,
  props: ["chartdata", "options"],
  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};

Statamic.$components.register("bar-chart", BarChart);
Statamic.$components.register("line-chart", LineChart);
Statamic.$components.register("pie-chart", PieChart);
Statamic.$components.register("doughnut-chart", DoughnutChart);
Statamic.$components.register("radar-chart", RadarChart);
Statamic.$components.register("polar-chart", PolarChart);
Statamic.$components.register("bubble-chart", BubbleChart);
Statamic.$components.register("scatter-chart", ScatterChart);
