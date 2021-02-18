import { Bar } from "vue-chartjs";
import { Line } from "vue-chartjs";
import { Pie } from "vue-chartjs";
import { Doughnut } from "vue-chartjs";
import { Radar } from "vue-chartjs";
import { PolarArea } from "vue-chartjs";
import { Bubble } from "vue-chartjs";
import { Scatter } from "vue-chartjs";
// import the plugin core
import "chartjs-plugin-colorschemes/src/plugins/plugin.colorschemes";

// import a particular color scheme
import { Tableau20 } from "chartjs-plugin-colorschemes/src/colorschemes/colorschemes.tableau";

const BarChart = {
  extends: Bar,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const LineChart = {
  extends: Line,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const PieChart = {
  extends: Pie,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const DoughnutChart = {
  extends: Doughnut,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const RadarChart = {
  extends: Radar,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const PolarChart = {
  extends: PolarArea,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const BubbleChart = {
  extends: Bubble,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
  },
};

const ScatterChart = {
  extends: Scatter,
  props: ["chartdata", "options"],
  mounted() {
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        colorschemes: {
          scheme: Tableau20,
        },
      },
    };
    this.renderChart(this.chartdata, options);
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
