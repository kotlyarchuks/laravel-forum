<template>
  <div class="reply__form">
    <div class="field">
      <div class="control" style="margin-bottom: 1em;">
        <textarea class="textarea" name="body" placeholder="Have something to say?" v-model="text"></textarea>
      </div>
      <div class="control">
        <button class="reply__button" @click="submitMessage">Send</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["data"],

  data() {
    return {
      thread: this.data,
      text: ""
    };
  },

  methods: {
    submitMessage() {
      this.$el.emit("submitMessage", this.text);
    }
  }
};
</script>

<style>
</style>

