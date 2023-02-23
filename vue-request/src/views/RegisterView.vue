<template>

  <div class="container-fluid">
    <div class="container pt-2">
      <div class="row justify-content-center pt-4 mt-md-4">
        <div class="col-md-9" style="background-color: #131517;">
          <div class="row align-items-center">
            <div class="col-lg-5 p-2">
              <div class="position-relative overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1572883454114-1cf0031ede2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YnVpbGRpbmdzfGVufDB8MXwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                  alt="" class="w-100">
                <!-- <div class="quotes">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, beatae.</p>
                    <strong>Artist</strong>
                    <p>&mdash; Judul</p>
                  </div> -->
              </div>
            </div>
            <div class="col-lg-7 p-4">
              <div class="mb-5">
                <h3 class="fw-bold">Create an Account</h3>
                <p>Create your own account for free.</p>
              </div>
              <form class="mb-4" @submit.prevent="postData">
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" v-model="names" class="form-control" id="names" name="names"
                      placeholder="Jung Yerin" autofocus>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" v-model="email" class="form-control" id="email" name="email"
                      placeholder="email">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" v-model="username" class="form-control" id="username" name="username"
                      placeholder="username">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" v-model="password" class="form-control" id="password" name="password"
                      placeholder="password">
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class=" form-control" id="confirm_password" name="confirm_password"
                      placeholder="re-type password">
                  </div>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary d-block">Register</button>
                </div>
              </form>
              <div class="text-small text-center">
                Already registered? <router-link to="/login">Login</router-link> <br>
                or <router-link to="/">Back to Home</router-link>.
              </div>
            </div>
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
        names: null,
        email: null,
        username: null,
        password: null,
      }
    },

    methods: {
      postData() {
        let self = this;
        axios({
          method: 'post',
          url: 'http://localhost:8000/v1/users',
          data: {
            name: names.value,
            email: email.value,
            username: username.value,
            password: password.value,
          }
        })
          .then(function (response) {
            console.log(response.data);
            Swal.fire(
              'Account Created!',
              "You'll be redirected to login page",
              'success'
            ).then(function () {
              self.$router.push('login')
            });
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    }
  }

  function checkPassword() {
    let password = document.getElementById("password").value;
    let cnfrmPassword = document.getElementById("cnfrm-password").value;
    console.log(" Password:", password, '\n', "Confirm Password:", cnfrmPassword);
    let message = document.getElementById("message");

    if (password.length != 0) {
      if (password == cnfrmPassword) {
        message.textContent = "Passwords match";
        message.style.backgroundColor = "#1dcd59";
      }
      else {
        message.textContent = "Password don't match";
        message.style.backgroundColor = "#ff4d4d";
      }
    }
    else {
      alert("Password can't be empty!");
      message.textContent = "";
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