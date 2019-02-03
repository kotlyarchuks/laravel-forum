<template>
    <div class="replies-pagination" v-if="shouldPaginate">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" v-if="hasPrev" @click.prevent="page--">Previous</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="#" v-if="hasNext" @click.prevent="page++">Next</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
  props: ['dataSet'],

  data() {
    return {
        page: null,
        hasPrev: null,
        hasNext: null
    };
  },

  methods: {
    
  },

  watch: {
      dataSet(){
          this.page = this.dataSet.current_page
          this.hasPrev = this.dataSet.prev_page_url
          this.hasNext = this.dataSet.next_page_url
      },

      page(){
          history.pushState(null, null, '?page=' + this.page)
          this.$emit('changedPage', this.page)
      }
  },

  computed: {
      shouldPaginate: function(){
          return !! this.hasPrev || !! this.hasNext
      }
  }
};
</script>

<style>
    .replies-pagination {
        display: flex;
        justify-content: center;
        width: 20%;
        margin-top: 1em;
        margin-bottom: 3em;
    }
</style>

