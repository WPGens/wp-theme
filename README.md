# WPGens WordPress Theme

## Styling Structure

The theme uses a combination of Tailwind CSS and custom styles, organized to work in both the frontend and Gutenberg editor.

### Style Files Overview

```
├── assets/
│   └── css/
│       ├── theme.css     # Generated Tailwind CSS output
│       └── tailwind.css        # Source file for Tailwind
├── blocks/
│   └── src/
│       ├── style.css       # Global block styles (loaded on front & editor)
│       └── blocks/
│           └── [block-name]/
│               ├── editor.scss  # Block-specific editor styles
│               └── style.scss   # Block-specific frontend styles
```

### How Styles are Loaded

1. **Tailwind CSS**

    - Source: `assets/css/theme.css`
    - Output: `assets/css/tailwind.css`
    - Frontend: Loaded via `inc/enqueue.php`
    - Editor: Loaded via `inc/gutenberg.php`
    - Build command: `npm run build`

2. **Global Block Styles**

    - Location: `blocks/src/style.css`
    - Purpose: General Gutenberg block modifications
    - Loaded: Both frontend and editor via `blocks/wpgens-blocks.php`
    - Affects: Core and custom blocks

3. **Block-Specific Styles**
    - Editor styles: `blocks/src/blocks/[block-name]/editor.scss`
    - Frontend styles: `blocks/src/blocks/[block-name]/style.scss`
    - Loaded: Automatically via block.json configuration
    - Compiled: During block build process

### Build Process

1. **Tailwind CSS**

    ```bash
    # Development with watch mode
    npm run build

    # Production build
    npm run build-prod
    ```

2. **Block Styles**
    - Block styles are compiled during the block build process
    - Each block's styles are scoped to that block

### File Purposes

-   `tailwind.css`: Source file for Tailwind, includes custom styles and Tailwind directives
-   `theme.css`: Generated file containing all Tailwind utilities
-   `blocks/src/style.css`: Global modifications for Gutenberg blocks
-   `editor.scss`: Block-specific styles that only apply in the editor
-   `style.scss`: Block-specific styles that apply on the frontend

### Important Notes

1. Tailwind classes work in both editor and frontend
2. Block-specific styles are automatically scoped
3. Global block styles affect both environments
4. Custom block styles should go in their respective block folders
5. General theme styles should use Tailwind when possible
