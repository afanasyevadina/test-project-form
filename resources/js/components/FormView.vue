<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <FormResult v-if="submitState === 'success'" :application="responseResult" @reset="submitState = null"/>
                <div class="card" v-else>
                    <div class="card-body p-sm-4 px-md-5">
                        <form action="#" @submit.prevent="submit" autocomplete="off">
                            <h1 class="text-center mb-4">Leave a feedback</h1>
                            <div class="mb-4">
                                <label class="mb-1" for="name">Your name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" :class="{'is-invalid': errors.name}" v-model="application.name" id="name" placeholder="Firstname Lastname">
                                <span class="invalid-feedback" v-if="errors.name">{{ errors.name}}</span>
                            </div>
                            <div class="mb-4">
                                <label class="mb-1" for="phone">Your phone number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" :class="{'is-invalid': errors.phone}" v-model="application.phone" id="phone" v-mask="'+X(XXX)XXX-XXXX'" placeholder="+X(XXX)XXX-XXXX">
                                <span class="invalid-feedback" v-if="errors.phone">{{ errors.phone}}</span>
                            </div>
                            <div class="mb-4">
                                <label class="mb-1" for="message">Your message <span class="text-danger">*</span></label>
                                <textarea class="form-control" :class="{'is-invalid': errors.message}" v-model="application.message" id="message" placeholder="What can you say?"></textarea>
                                <span class="invalid-feedback" v-if="errors.message">{{ errors.message}}</span>
                            </div>
                            <button class="btn btn-lg btn-success w-100" :class="{'btn-loading': submitState === 'pending'}">Submit now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FormResult from "./FormResultComponent";
export default {
    name: "Form",
    components: {FormResult},
    data() {
        return {
            application: {
                name: '',
                phone: '',
                message: ''
            },
            responseResult: {},
            errors: {},
            submitState: null
        }
    },
    methods: {
        submit: function () {
            this.errors = {}
            this.submitState = 'pending'
            fetch('/api/applications', {
                method: 'POST',
                body: JSON.stringify(this.application),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    this.submitState = response.ok ? 'success' : 'error'
                    return response.json()
                })
                .then(json => {
                    if (this.submitState === 'error') this.errors = json.errors
                    if (this.submitState === 'success') {
                        this.responseResult = json.data
                        for (let key in this.application) this.application[key] = ''
                    }
                })
        }
    }
}
</script>
