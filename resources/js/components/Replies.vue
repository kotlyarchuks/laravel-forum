<template>
  <div>
    <div>
      <div v-for="(reply, index) in replies" :key="reply.id">
        <reply :reply="reply" @deleted="removeReply(index)"></reply>
      </div>
    </div>
    <newreply :endpoint="endpoint" @created="addReply"></newreply>
  </div>
</template>

<script>
import Reply from "./Reply.vue";
import Newreply from "./NewReply.vue";

export default {
  props: ["data"],

  components: { Reply, Newreply },

  data() {
    return {
      replies: this.data,
      endpoint: location.pathname + '/replies',
    };
  },

  methods: {
    removeReply(index) {
      this.replies.splice(index, 1);

      this.$emit("removed");
    },

    addReply(response){
      this.replies.push(response)
      
      this.$emit('added')
    }
  },
};
</script>

<style>
</style>