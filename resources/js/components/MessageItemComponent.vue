<template>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-auto">
                    <div class="h1 text-primary fade-50">#{{ application.id }}</div>
                </div>
                <div class="col">
                    <div class="h5 mb-2">{{ application.name }}</div>
                    <div class="mb-3 text-muted">{{ application.phone }}</div>
                    <div v-html="(application.message).replaceAll('\n', '<br>')"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessageItem",
    props: {application: Object}
}
</script>
