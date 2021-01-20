<template>
    <div id="posts">
        <div>Current Users Online: 245</div>
        <section id="trading-table">
            <span></span>
            <!--<trading-vue :data="this.$data"></trading-vue> -->
        </section>

        <div>Payments</div>
        <section style="width: 200px; height: 200px">
            <canvas id="chart-payments" style="width: 100px; height: 100px;"></canvas>
        </section>

        <div>Registration</div>
        <section style="width: 200px; height: 200px">
            <canvas id="chart-registrations" style="width: 100px; height: 100px;"></canvas>
        </section>

         <div>Money spent per month</div>
        <section style="width: 200px; height: 200px">
            <canvas id="chart-money-spent" style="width: 100px; height: 100px;"></canvas>
        </section>
    </div>
</template>

<script src="trading-vue.min.js"></script>
<script>
import TradingVue from 'trading-vue-js';
import { Bar } from 'vue-chartjs';
export default {
    name: 'app',
    components: { TradingVue },
  async mounted() {
    // this.getPosts();
    const chartPayments = new Chart(document.getElementById('chart-payments') , {
        type: 'line',
        responsive: true,
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [
            {
                label: '2018 Sales',
                data: await this.getChartPayments()
            }
            ]
        }
    });

     const chartRegistration = new Chart(document.getElementById('chart-registrations') , {
        type: 'line',
        responsive: true,
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [
            {
                label: '2018 Sales',
                data: await this.getChartRegistration()
            }
            ]
        }
    });

console.log(this.chartMoneySpent);
     const chartMoneySpent = new Chart(document.getElementById('chart-money-spent') , {
        type: 'line',
        responsive: true,
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [
            {
                label: '2018 Sales',
                data: await this.getchartMoneySpent(),
            }
            ]
        }
    });
  },
  async data() {
      this.chartPayments = await this.getChartPayments();
      this.chartRegistration = await this.getChartRegistration();
      this.chartMoneySpent = await this.getchartMoneySpent();

    return {
        chartPayments: [],
        chartRegistration: [],
        chartMoneySpent: [],
    //    ohlcv: [
    //             [ 1551128400000, 33,  37.1, 14,  14,  196 ],
    //             [ 1551132000000, 13.7, 30, 6.6,  30,  206 ],
    //             [ 1551135600000, 29.9, 33, 21.3, 21.8, 74 ],
    //             [ 1551139200000, 21.7, 25.9, 18, 24,  140 ],
    //             [ 1551142800000, 24.1, 24.1, 24, 24.1, 29 ],
    //         ]
    };
  },
  methods: {
      async getChartPayments() {
          return [300, 700, 450, 750, 450];
      },
      async getChartRegistration() {
          return [300, 700, 450, 750, 450];
      },
        async getchartMoneySpent() {
          return [300, 700, 450, 750, 450];
      }
  }
};
</script>
