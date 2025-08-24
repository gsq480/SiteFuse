module.exports = {
  content: [
    './**/*.php',
    './**/*.html',
    '../website.json',
    './all-content.html'
  ],
  safelist: [
    // Essential classes that we know we use
    'container', 'btn', 'btn-primary', 'btn-secondary', 'card',
    'section-title', 'nav-link', 'hero-section', 'animate-fade-in',
    'text-brand-primary', 'bg-brand-primary', 'border-brand-primary',
    
    // Common spacing
    'p-4', 'p-6', 'p-8', 'px-4', 'px-6', 'px-8', 'py-4', 'py-6', 'py-8',
    'py-16', 'py-24', 'py-32', 'py-40',
    'm-4', 'm-6', 'm-8', 'mb-4', 'mb-6', 'mb-8', 'mt-4', 'mt-6', 'mt-8',
    
    // Common layout
    'grid', 'flex', 'block', 'inline-block', 'hidden',
    'grid-cols-1', 'grid-cols-2', 'grid-cols-3', 'grid-cols-4',
    'items-center', 'items-start', 'items-end',
    'justify-center', 'justify-between', 'justify-around',
    'text-center', 'text-left', 'text-right',
    
    // Common colors
    'bg-white', 'bg-gray-50', 'bg-gray-100', 'bg-gray-900',
    'text-white', 'text-black', 'text-gray-600', 'text-gray-800',
    
    // Common typography
    'text-sm', 'text-base', 'text-lg', 'text-xl', 'text-2xl',
    'text-3xl', 'text-4xl', 'text-5xl', 'text-6xl', 'text-7xl',
    'font-normal', 'font-medium', 'font-semibold', 'font-bold',
    
    // Common responsive
    'sm:text-lg', 'md:text-xl', 'lg:text-2xl',
    'sm:px-6', 'md:px-8', 'lg:px-12',
    'sm:py-8', 'md:py-12', 'lg:py-16',
    'md:grid-cols-2', 'lg:grid-cols-3', 'lg:grid-cols-4',
    
    // Common effects
    'rounded', 'rounded-lg', 'rounded-xl', 'rounded-2xl',
    'shadow', 'shadow-lg', 'shadow-xl',
    'hover:bg-gray-50', 'hover:text-white', 'transition-all',
    'duration-200', 'duration-300'
  ],
  theme: {
    extend: {}
  },
  plugins: []
}
