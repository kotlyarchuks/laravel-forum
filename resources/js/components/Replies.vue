<template>
  <div>
    <div v-for="reply in replies">
      <reply :reply="reply" :key="reply.id" @deleted="removeReply()"></reply>
    </div>
  </div>
</template>

<script>
import Reply from "./Reply.vue";

export default {
  props: ["data"],

  components: { Reply },

  data() {
    return {
      replies: this.data
    };
  },

  methods: {
    removeReply(index) {
      this.replies.splice(index, 1);

      this.$emit("removed");
    }
  }
};
</script>

<style>
</style>