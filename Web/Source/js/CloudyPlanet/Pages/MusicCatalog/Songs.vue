<template>
    <div id="songs">
        <v-data-table
                :headers="headers"
                :items="songs"
                :item-key="ID"
                :pagination.sync="pagination"
                :total-items="totalSongs"
                :loading="loading"
                class="elevation-1"
        >
            <template v-slot:items="props">
                <td>{{ props.item.ID }}</td>
                <td>{{ props.item.Artist }}</td>
                <td>{{ props.item.Name }}</td>
                <td>{{ props.item.Tags }}</td>
            </template>
            
            <template v-slot:no-data>
                <v-alert :value="true" color="error" icon="warning">
                    No songs available
                </v-alert>
            </template>
        </v-data-table>
    </div>
</template>


<script>
    export default {
        name: 'songs',
        data () {
            return {
                headers: [
                    { text: 'ID', value: 'ID' },
                    { text: 'Artist', value: 'Artist' },
                    { text: 'Name', value: 'Name' },
                    { text: 'Tags', value: 'Tags', sortable: false }
                ],
                totalSongs: 0,
                songs: [],
                loading: true,
                pagination: {},
            }
        },
        watch: {
            pagination: {
                handler () {
                    this.getDataFromApi()
                        .then(data => {
                            this.songs = data.songs;
                            this.totalSongs = data.total;
                        })
                },
                deep: true
            }
        },
        mounted () {
            this.getDataFromApi()
                .then(data => {
                    this.songs = data.songs;
                    this.totalSongs = data.total;
                })
        },
        methods: {
            getDataFromApi() {
                this.loading = true;
                return [];
            },
            getSongs() {
                return [
                    
                ]
            }
        }
    }
</script>


<style>
</style>