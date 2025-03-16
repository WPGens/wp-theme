# Custom Gutenberg Blocks

This directory contains custom Gutenberg blocks for the Bottle Services WordPress theme.

## Available Blocks

-   **Button**: A customizable button block
-   **Hero**: A hero section block
-   **Image Text**: A block for displaying image and text side by side
-   **Hero Slider**: A slider block for the hero section
-   **Events**: A dynamic block for displaying events in a slider
-   **Feature Boxes**: A block for displaying feature boxes in a grid layout

## Development

All block development is managed through the root package.json file. The blocks are built using WordPress Scripts.

### Getting Started

1. Navigate to the theme root directory
2. Install dependencies:

    ```
    npm install
    ```

3. Start the development server:

    ```
    npm run start:blocks
    ```

4. Build the blocks for production:
    ```
    npm run build:blocks
    ```

## Block Structure

Each block follows this structure:

```
blocks/src/blocks/[block-name]/
├── block.json       # Block configuration
├── edit.js          # Edit component
├── save.js          # Save component
├── index.js         # Block registration
├── editor.scss      # Editor-specific styles
└── README.md        # Block documentation
```

## Adding a New Block

1. Create a new directory in `blocks/src/blocks/`
2. Add the necessary files (block.json, edit.js, save.js, index.js)
3. Register the block in `blocks/wpgens-blocks.php`
4. Build the blocks using `npm run build:blocks`

## Dynamic Blocks

For blocks that require server-side rendering:

1. Create a `render.php` file in the block directory
2. Include the file in `blocks/wpgens-blocks.php`
3. Register the block with a render callback in `wpgens_blocks_init()`
