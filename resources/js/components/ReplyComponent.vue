<script>
import Favorite from "./FavoriteComponent.vue";

export default {
  props: ["reply"],

  components: { Favorite },

  data() {
    return {
      editing: false,
      body: this.reply.body
    };
  },

  methods: {
    submit() {
      axios.patch("/replies/" + this.reply.id, {
        body: this.body
      });

      this.editing = false;
    },

    destroy() {
      axios.delete("/replies/" + this.reply.id);

      $(this.$el).fadeOut(300);
    }
  }
};
</script>

<style>
</style>