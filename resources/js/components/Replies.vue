<template>
  <div>
    <div>
      <div v-for="(reply, index) in replies" :key="reply.id">
        <reply :reply="reply" @deleted="removeReply(index)"></reply>
      </div>
    </div>
    <paginator :dataSet="dataSet" @changedPage="fetch"></paginator>
    <newreply @created="addReply"></newreply>
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
      dataSet: null,
    };
  },

  created(){
    this.fetch()
  },

  methods: {
    removeReply(index) {
      this.replies.splice(index, 1);

      this.$emit("removed");
    },

    addReply(response){
      this.replies.push(response)
      
      this.$emit('added')
    },

    fetch(page){
        axios.get(this.url(page))
            .then(({data}) => {
                this.dataSet = data
                this.replies = data.data

                window.scrollTo(0,0)
            })
    },

    url(page){
      if (!page){
        let query = location.search.match(/page=(\d+)/);
        page = query ? query[1] : 1;
      }

      return `${location.pathname}/replies?page=${page}`
    }
  },
};
</script>

<style>
</style>