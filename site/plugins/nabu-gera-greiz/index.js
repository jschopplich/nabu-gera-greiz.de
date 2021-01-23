/* global panel */
panel.plugin('nabu-gera-greiz/blocks', {
  blocks: {
    line: `
      <hr :class="'is-' + content.class" />
    `
  }
})
