<template>
    <div class="card">
        <div class="card-body p-sm-4 px-md-5">
            <h1 class="mb-4 text-center">Your answer saved</h1>
            <div class="mb-4">
                <div class="fw-bolder mb-1">Name:</div>
                <div>{{ application.name }}</div>
            </div>
            <div class="mb-4">
                <div class="fw-bolder mb-1">Phone:</div>
                <div>{{ application.phone }}</div>
            </div>
            <div class="mb-4">
                <div class="fw-bolder mb-1">Message:</div>
                <div v-html="(application.message || '').replaceAll('\n', '<br>')"></div>
            </div>
            <div class="text-center">
                <a href="#" @click.prevent="$emit('reset')">Send again</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FormResultComponent",
    props: {
        application: Object
    }
}
</script>
