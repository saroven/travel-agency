import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import { resolve } from 'path'

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
  build: {
    rollupOptions: {
      input: {
        main: resolve(process.cwd(), 'index.html'),
        packages: resolve(process.cwd(), 'packages.html'),
        services: resolve(process.cwd(), 'services.html'),
        visa: resolve(process.cwd(), 'visa.html'),
        about: resolve(process.cwd(), 'about.html'),
        contact: resolve(process.cwd(), 'contact.html'),
        destination: resolve(process.cwd(), 'destination-details.html'),
        service_details: resolve(process.cwd(), 'service-details.html'),
      }
    }
  }
})
