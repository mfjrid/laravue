<template>

  <div class="container-fluid">
    <div class="container pt-2">
      <div class="row justify-content-center pt-4 mt-md-4">
        <div class="col-md-9" style="background-color: #131517;">
          <div class="row align-items-center">

            <div class="col-lg-7 p-2">
              <div class="position-relative overflow-hidden">
                <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-100">
                <div class="quotes">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, beatae.</p>
                  <strong>Artist</strong>
                  <p>&mdash; Judul</p>
                </div>
              </div>
            </div>
            <div class="col-lg-5 p-4">
              <div class="mb-5">
                <h3 class="fw-bold">Account Login</h3>
                <p>Login to access our feature.</p>
              </div>
              <form class="mb-4">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input v-model="username" type="text" class="form-control" id="username" name="username"
                    placeholder="username" autofocus>
                </div>
                <div class="mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input v-model="password" type="password" class="form-control" id="password" name="password"
                    placeholder="password">
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary d-block"
                    :disabled="!username || !password">Login</button>
                </div>
              </form>
              <div class="text-small text-center">
                Don't have an Account? <router-link to="/register">Register</router-link> <br>
                or <router-link to="/">Back to Home</router-link>.
              </div>
            </div>
            coba git
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        username: null,
        password: null,
      }
    },
  }
</script>

<style scoped>
  .container-fluid {
    min-height: 100vh;
    background-color: #191B1D;
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