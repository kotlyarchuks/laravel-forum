<template>
  <div class="reply__form" v-if="canCreateReply">
    <div class="field">
      <div class="control" style="margin-bottom: 1em;">
        <textarea class="textarea" name="body" placeholder="Have something to say?" v-model="body" required></textarea>
      </div>
      <div class="control">
        <button class="reply__button" @click="submitMessage">Send</button>
      </div>
    </div>
  </div>
  <div v-else>
    <a href="/login">Log in</a> to discuss this stuff!
  </div>
</template>
<script>
export default {
  props: ["endpoint"],

  data() {
    return {
      body: "",
      canCreateReply: window.App.signedIn
    };
  },

  methods: {
    submitMessage() {
      axios.post(this.endpoint, {
        body: this.body
      })
        .then(({data}) => {
          this.body = ''
          this.$emit("created", data)
        })
        .catch(error => {
          console.log(error.text)
        })

    }
  }
};
</script>

<style>
</style>

