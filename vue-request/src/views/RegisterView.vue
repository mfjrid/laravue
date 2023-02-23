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
              <form class="mb-4">
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jung Yerin" autofocus>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
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