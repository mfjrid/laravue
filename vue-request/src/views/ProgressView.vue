<template>

  <div class="vl-parent">
    <loading v-model:active="isLoading" :can-cancel="false" :is-full-page="fullPage" />
  </div>

  <div class="container pt-md-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="h1-bhs">
          <span class="text-bhs">Requests</span> List
        </h1>
        <p>Here is a list of requests that sent to us. See the progress below</p>
      </div>
    </div>

    <div class="row mt-5">
      <table class="table table-striped table-dark table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Requester</th>
            <th scope="col">Category</th>
            <th scope="col">Quality</th>
            <th scope="col">Link</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <template v-for="(request, index) in requests" :key="index">
            <tr>
              <th scope="row">{{ index+1 }}</th>
              <td>{{ request.user_id }}</td>
              <td>{{ request.category_id }}</td>
              <td>{{ request.quality_id }}</td>
              <td>{{ request.link }}</td>
              <td>{{ request.status_id }}</td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>

  </div>
</template>

<style>
  .vl-overlay .v1-background {
    background-color: #000000 !important;
  }

  .v1-icon svg {
    stroke: #FF6F00 !important;
  }
</style>

<script>
  import axios from 'axios'
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/css/index.css';

  export default {
    data() {
      return {
        requests: null,
        isLoading: true,
        fullPage: true,
      }
    },
    components: {
      Loading
    },
    created() {
      axios
        .get('http://localhost:8000/v1/requests/')
        .then((response) => {
          this.isLoading = false;
          this.requests = response.data.data.data;
        })
        .catch((e) => {
          this.errors.push(e);
        })
    }
  }
</script>

<style>
  .vl-overlay .vl-background {
    background-color: #000000;
  }

  .vl-icon svg {
    stroke: #FF6F00;
  }
</style>