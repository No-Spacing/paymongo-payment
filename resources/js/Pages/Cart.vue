<script setup>
import Layout from '../Layout/Main.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  carts: {
    type: Array,
    default: () => [],
  },
});

</script>
<template>
    <Head title="Cart" />
    <Layout>
        <v-container fluid class="d-flex justify-center">
           

              <v-card>
                <v-card-title>Cart</v-card-title>
                <v-card-text>
                  <v-data-table :headers="headers" :items="carts"></v-data-table>

                  <div class="d-flex justify-end">
                    <v-btn href="payment" :loading="loading" @click="load()">Proceed To Payment</v-btn>
                  </div>
                </v-card-text>
              </v-card>

            
          </v-container>
    </Layout>
    
</template>

<script>
  export default {
    data () {
      return {
        loading: false,
        search: '',
        headers: [
          {
            align: 'start',
            key: 'name',
            sortable: false,
            title: 'Product Name',
          },
          { key: 'description', title: 'Description' },
          { key: 'price', title: 'Price (PHP)' },
        ],
      }
    },
    methods: {
      load () {
        this.loading = true
      },
    },
  }
</script>