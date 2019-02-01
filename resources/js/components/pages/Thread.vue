
<script>
import Replies from "../Replies.vue";
import Newreply from "../NewReply.vue";

export default {
  props: ["initialRepliesCount"],

  components: { Replies, Newreply },

  data() {
    return {
      repliesCount: this.initialRepliesCount
    };
  },

  methods: {}
};
</script>

<style>
</style>