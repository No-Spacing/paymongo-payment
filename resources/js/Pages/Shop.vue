<script setup>
import Layout from '../Layout/Main.vue'
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

defineProps({
  products: {
    type: Array,
    default: () => [],
  },
});

</script>

<template>
    <Layout>
        
        <Head title="Shop" />

        <v-row no-gutters>
            <v-col
                cols="3"
                class=""
                v-for="product in products" :key="product.id"
            >
                <v-sheet class="ma-2 pa-2" >
                    <v-card :width="300">
                   
                        <v-img
                        :width="250"
                        aspect-ratio="1/1"
                        src="/products/ponyshoes.jpg"
                        cover
                        ></v-img>

                        <v-card-title>{{ product.name }}</v-card-title>
                        <v-card-subtitle>
                            {{ product.description }} <br>
                            Php{{ product.price }}
                        </v-card-subtitle>

                        <v-card-text>
                            Originally used as a basketball shoe in the 1970s, 
                            the Shooter is now an essential piece for street culture 
                            enthusiasts everywhere. Comes in different colorways to 
                            match each person’s unique style and character.
                        </v-card-text>

                        <template v-slot:actions>

                            <v-row >
                                <v-col class="d-flex justify-end">
                                    <v-btn prepend-icon="mdi-cart" :loading="loading" @click="load()">
                                        <Link href="/addToCart" method="post" :data="{ id: product.id }">Add to Cart</Link>
                                    </v-btn>
                                </v-col>

                            </v-row> 

                        </template>
                  
                    </v-card>
                </v-sheet>

            </v-col>
        </v-row>
            
    </Layout>
</template>

<script>
  export default {
    data: () => ({ loading: false }),

    methods: {
      load () {
        this.loading = true
      },
    },
  }
</script>