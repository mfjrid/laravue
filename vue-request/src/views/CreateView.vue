<template>

    <div class="container">
        <div class="row justify-content-center mt-md-4">
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                    </div>
                    <div class="col-lg-7 p-4">
                        <div class="mb-5">
                            <h3 class="fw-bold">Send a Requests</h3>
                            <p>Create a request as <b>Fajar</b>.</p>
                        </div>

                        <form class="" @submit.prevent="postData">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">YouTube URL</label>
                                    <input type="url" v-model="link" class="form-control" id="link" name="link"
                                        placeholder="https://youtube.com/dhsajkdhskdsadgsauidas" autofocus>
                                    <div v-if="invalid_link" class="invalid-feedback d-block">
                                        {{ invalid_link }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Special Message (Optional)</label>
                                    <input type="text" v-model="message" class="form-control" id="message"
                                        name="message" placeholder="Message" autofocus>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary d-block">Send Request</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Swal from 'sweetalert2/dist/sweetalert2.js';

    export default {
        data() {
            return {
                link: null,
                message: null,
            }
        },

        methods: {
            postData() {
                let self = this;
                axios({
                    method: 'post',
                    url: 'http://localhost:8000/v1/requests',
                    data: {
                        link: link.value,
                        message: message.value,
                    }
                })
                    .then(function (response) {
                        Swal.fire(
                            'Request Created!',
                            "Please wait for the progress",
                            'success'
                        ).then(function () {
                            self.$router.push('login')
                        });
                    })
                    .catch(function (error) {
                        Swal.fire(
                            'Error!',
                            error.response.data.name[0],
                            'error'
                        )
                    });
            }
        }
    }

</script>

<style scoped>
    .container-fluid {
        min-height: 100vh;
        background-color: #191B1D;
        /* background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/prism.png'); */
    }

    .quotes {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 30px;
        padding-bottom: 15px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 1) 100%);
    }
</style>