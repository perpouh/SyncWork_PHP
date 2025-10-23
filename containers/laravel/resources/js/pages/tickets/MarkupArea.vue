<template>
  <div class="prose">
    <div id="markup-area" v-html="markup"></div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import markdownit from 'markdown-it';
import hljs from 'highlight.js'
import 'highlight.js/styles/github.css'

const props = defineProps<{
  markdown: string;
}>();

const markup = computed(function () {
  const md = markdownit({
    highlight: function (str: string, lang: string) {
      if (lang && hljs.getLanguage(lang)) {
        try {
          return '<pre><code class="hljs">' +
            hljs.highlight(str, { language: lang, ignoreIllegals: true }).value +
            '</code></pre>';
        } catch (__) { }
      }

      return '<pre><code class="hljs">' + md.utils.escapeHtml(str) + '</code></pre>';
    }
  });
  return md.render(props.markdown);
});
</script>
