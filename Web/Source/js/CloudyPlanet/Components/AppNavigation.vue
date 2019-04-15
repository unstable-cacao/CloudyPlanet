<template>
    <v-navigation-drawer fixed app>
        <v-toolbar flat class="transparent">
            <v-list class="pa-0">
                <v-list-tile dark>
                    <v-list-tile-avatar>
                        <img src="https://randomuser.me/api/portraits/men/85.jpg">
                    </v-list-tile-avatar>

                    <v-list-tile-content>
                        <v-list-tile-title>{{ appTitle }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-toolbar>

        <v-list class="pt-0" dense>
            <v-divider></v-divider>

            <v-list-tile
                    v-for="item in items"
                    :key="item.title"
                    :to="item.route"
            >
                <v-list-tile-action>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        name: 'AppNavigation',
        data() {
            return {
                appTitle: 'Cloudy Planet',
                items: [
                    { title: 'Home', icon: 'home', route: '/' },
                    { title: 'Music Catalog', icon: 'queue_music', route: '/music-catalog/songs' }
                ],
                right: null
            };
        }
    };
</script>

<style scoped>
</style>