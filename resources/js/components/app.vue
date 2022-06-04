<template>
  <div class="container">
    <div class="d-flex justify-content-center align-items-center main-screen">
      <div class="input-url-section">
        <div class="input-group mb-3">
          <input
            v-model="url"
            type="text"
            class="form-control"
            placeholder="Enter a valid url Ex: https://www.google.com"
          />
          <div class="input-group-append">
            <button class="btn btn-success" @click="submitUrl">GO</button>
          </div>
        </div>
          <ul v-if="errors.length > 0">
              <li class="text-danger" v-for="(error, index) in errors" :key="index">{{ error }}</li>
          </ul>
      </div>
      <div class="result-section">
          <div v-if="isLoading">
                <p>Loading...</p>
          </div>

            <div v-if="result != null">
                <p>Your Short URL is ready click the link to visit</p>
                <a target="_blank" :href="result.APP_URL+'/'+result.hash">{{ result.APP_URL+'/'+result.hash }}</a>
                <p class="text-danger" v-if="result.is_spam">This URL marked as harmful</p>
            </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: "App",
  data() {
      return {
          url: '',
          isLoading: false,
          result: null,
          errors: []
      }
  },

  methods: {
      submitUrl() {
          if(this.url.length > 0) {
              this.isLoading = true;
              axios.post('/short', {
                  url: this.url
              }).then(({data}) => {
                  this.result = data;
                  this.isLoading = false;
                  this.errors = [];
                  this.url = '';
              }).catch(error => {
                  if(error.response.status === 422){
                    this.errors = error.response.data.errors.url;
                  }else{
                      console.log(error.response);
                  }

                this.isLoading = false;
              })
          }
      }
  }
};
</script>

<style>
.main-screen {
  height: 100vh;
  flex-direction: column;
}
.input-url-section {
    min-width: 400px;
}

.result-section {
    margin-top: 50px;
}
</style>
