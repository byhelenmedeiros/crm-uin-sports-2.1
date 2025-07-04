import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
  import path from 'path';


export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/app.js'],
      refresh: true,
    }),
    
  ],
  
  
  resolve: {
    alias: {
      ziggy: path.resolve(__dirname, 'vendor/tightenco/ziggy/dist/js/route.js')
    }
  },
});
