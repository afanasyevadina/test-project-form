<template>
    <div class="container">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h1 class="mb-4">All responses</h1>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/export-json" target="_blank">JSON</a>
                    <a class="dropdown-item" href="/export-csv" target="_blank">CSV</a>
                </div>
            </div>
        </div>
        <div v-if="loadState" class="loader"></div>
        <template v-else>
            <MessageItem v-for="(application, index) in applications" :key="index" :application="application" />
            <div class="text-center" v-if="!applications.length">
                <div class="mb-4">
                    Nothing yet
                </div>
                <a href="#" @click.prevent="$parent.route = 'form'" class="btn btn-lg btn-success">Be the first!</a>
            </div>
            <ul class="pt-4 t-m_r-14 pagination grey-links justify-content-center" v-if="pagination.last_page > 1">
                <li v-for="i in pagination.last_page" class="page-item" :class="{active: pagination.current_page === i}">
                    <span class="page-link" v-if="pagination.current_page === i">{{ i }}</span>
                    <a href="#" class="page-link" @click.prevent="loadMessages(i)" v-else>{{ i }}</a>
                </li>
            </ul>
        </template>
    </div>
</template>

<script>
import MessageItem from "./MessageItemComponent";
export default {
    name: "Messages",
    components: {MessageItem},
    data() {
        return {
            applications: [],
            pagination: {},
            loadState: false
        }
    },
    methods: {
        loadMessages: function (page = 1) {
            this.loadState = true
            fetch(`/api/applications?page=${page}`)
                .then(response => response.json())
                .then(json => {
                    this.applications = json.data
                    this.pagination = json.meta
                    this.loadState = false
                })
        }
    },
    mounted() {
        this.loadMessages()
    }
}
</script>
