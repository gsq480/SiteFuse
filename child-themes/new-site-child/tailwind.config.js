module.exports = {
  content: ['./**/*.php','./templates/**/*.html','../website.json'],
  safelist: [
    { pattern: /^(sm:|md:|lg:|xl:|2xl:)?(container|prose|grid|flex|items|justify|content|gap-[0-9]+|space-[xy]-[0-9]+|p[trblxy]?-[0-9]+|m[trblxy]?-[0-9]+|w-.*|h-.*|max-w-.*|min-h-.*|rounded.*|shadow.*|bg-.*|from-.*|via-.*|to-.*|text-.*|leading-.*|tracking-.*|font-.*|border-.*|ring-.*|col-span-.*|row-span-.*)$/ }
  ],
  theme: { extend: {} },
  plugins: [],
}
