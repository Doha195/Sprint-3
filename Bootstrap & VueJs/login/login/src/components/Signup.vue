<template>
    <div class="vue-tempalte">
                    <nav class="navbar shadow bg-white rounded justify-content-between flex-nowrap flex-row fixed-top">
      <div class="container">
        <a class="navbar-brand float-left" href="https://youcode.ma/" target="_blank">
           Youcode Youssoufia
        </a>
        <ul class="nav navbar-nav flex-row float-right">
          <li class="nav-item">
            <router-link class="nav-link pr-3" to="/login">Sign in</router-link>
          </li>
          <li class="nav-item">
            <router-link class="btn btn-outline-primary" to="/signup">Sign up</router-link>
          </li>
        </ul>
      </div>
    </nav>
        <form>
            <h3>Sign Up</h3>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control form-control-lg"/>
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control form-control-lg" />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control form-control-lg" />
            </div>

            <button type="submit" class="btn btn-dark btn-lg btn-block">Sign Up</button>

            <p class="forgot-password text-right">
                Already registered 
                <router-link :to="{name: 'login'}">sign in?</router-link>
            </p>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        }
    }
</script>
 

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
body,
.vue-tempalte,
.vertical-center {
  display: flex;
}
.vue-tempalte {
  border-radius: 2em;
  align-items: center;
  display: flex;
  background-color: white;
  margin: 20% 76%;
  width: 40em;;
  height: 30em;
  padding: 170px;
}
label {
  font-weight: 500;
}
</style>