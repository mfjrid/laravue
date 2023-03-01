<template>
  <div class="container pt-md-5">
    <div class="row pt-5">
      <div class="col-md-12 text-center">
        <span>Sponsor</span>
        <h1 class="h1-bhs">
          <span class="text-bhs">Launch your startup</span> with <br>
          this Framer template
        </h1>
        <p>Here is a comparison chart of us with the Ipsum tool, but at the end we win!</p>
      </div>
    </div>

    <h1>{{ user?.name }}</h1>
    <h1>{{ user?.email }}</h1>

    <div class="row mt-5 pt-md-5">
      <table class="table table-striped table-dark table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="row">
      <div id="appz">{{ users }}</div>
    </div>

  </div>
</template>

<script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

  const user = ref();
  onMounted(async () => {
    const data = await axios.get('/v1/users');
    console.log(data)
  })

  // export default {
  //   data() {
  //     return {
  //       users: null,
  //       function() {
  //         axios.get('https://jsonplaceholder.typicode.com/users')
  //           .then(response => {
  //             this.users = response.data;
  //             console.log(response);
  //           })
  //           .catch(error => {
  //             // handle error
  //             console.log(error);
  //           })
  //       }
  //     }
  //   },
  // }

</script>

<style>

</style>