# Laravel PDF Search Application

This Laravel application allows users to search and view PDF files stored in the app's storage. It leverages Laravel Vite for efficient asset management, enabling rapid development and optimized production builds.

## Features

- **Exact name search**: Requires the exact name of the PDF file to display the search result. Partial matches will not return the file.
- Flash messages to display the search results (file found/not found).
- Direct viewing of PDF files in the browser.
- Display the number of PDF pages.

## Quick Start

### Prerequisites

- PHP >= 7.3
- Composer
- Node.js and npm

### Installation

1. **Clone and Set Up the Project**
    ```bash
    git clone https://github.com/yourusername/pdf-search-application.git
    cd pdf-search-application
    ```

2. **Install PHP Dependencies**
    ```bash
    composer install
    ```

3. **Install NPM Packages**
    ```bash
    npm install
    ```

4. **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Link Storage**
    ```bash
    php artisan storage:link
    ```

### Running the Application with Vite

Laravel Vite provides a powerful and modern front-end tooling that significantly improves the development experience. It's configured to work out of the box with Laravel.

6. **Compile Assets with Vite**
    For development:
    ```bash
    npm run dev
    ```
    This command compiles assets and starts the Vite server, which provides features like Hot Module Replacement (HMR).

7. **Start the Laravel Development Server**
    ```bash
    php artisan serve
    ```
    Access the application at `http://localhost:8000`.

8. **Watching Assets for Changes**
    To automatically recompile assets when changes are detected, run:
    ```bash
    npm run watch
    ```

## Using Vite in Production

For production builds, use:
```bash
npm run build
```

This command optimizes your assets for production.

This command optimizes your assets for production.

For more detailed instructions on using Vite with Laravel, including advanced configurations and optimization options, see the [Laravel documentation on Vite](https://laravel.com/docs/10.x/vite).


