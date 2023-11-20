import { addFilter } from '@wordpress/hooks';

// Function to change the icon of the paragraph block
const changeParagraphIcon = (settings, name) => {
  if (name == 'core/paragraph') {
    return {
      ...settings,
      icon: 'twitter', // Change the icon to 'twitter'
    };
  }
  return settings;
};

// Register the filter to change the paragraph block icon
addFilter('blocks.registerBlockType', 'my-plugin/change-paragraph-icon', changeParagraphIcon);

// Function to modify the BlockEdit component of the paragraph block
const modifyEdit = (BlockEdit) => {
  return (props) => {
    const { name } = props;
    if (name == 'core/paragraph') {
      return (
        <div style={{ border: '1px solid red' }}>
          {/* Render the BlockEdit component wrapped in a red border div */}
          <BlockEdit {...props} />
        </div>
      );
    }
    return <BlockEdit {...props} />;
  };
};

// Register the filter to modify the BlockEdit component of the paragraph block
addFilter('editor.BlockEdit', 'my-plugin/change-edit', modifyEdit);
