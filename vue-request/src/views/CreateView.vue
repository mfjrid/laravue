<template>
    <h1>Form</h1>
    <p>Message is: {{ message }}</p>
    <input v-model="message" placeholder="edit me" />

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                tes
            </div>
            <div class="col-md-6">
                coba
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: null
            }
        },
    }
</script>

<style scoped></style>