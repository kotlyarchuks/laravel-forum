
<script>
import Replies from "../Replies.vue";

export default {
  props: ["initialRepliesCount"],

  components: { Replies },

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