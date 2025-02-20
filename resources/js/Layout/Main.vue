

<template>
   <v-layout>
      <header>
          <v-app-bar color="primary">
              <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

              <v-toolbar-title>App Shop</v-toolbar-title>

              <v-spacer></v-spacer>

              <template v-if="$vuetify.display.mdAndUp">
              <v-btn icon="mdi-magnify" variant="text"></v-btn>

              <v-btn icon="mdi-filter" variant="text"></v-btn>
              </template>

              <v-btn icon="mdi-dots-vertical" variant="text"></v-btn>
          </v-app-bar>

          <v-navigation-drawer
          v-model="drawer"
          temporary
          >
              <v-list density="compact" nav>
                  <v-list-item prepend-icon="mdi-home" title="Home" value="home"></v-list-item>
                  <v-list-item prepend-icon="mdi-store" title="Shop" value="shop" href="/shop"></v-list-item>
                  <v-list-item prepend-icon="mdi-cart" title="Cart" value="cart" href="/cart"></v-list-item>
              </v-list>

          </v-navigation-drawer>
      </header>
      <v-main>
          <slot />
      </v-main>
  </v-layout>
</template>

<script>
  export default {
    data: () => ({
      drawer: false,
    }),

    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>