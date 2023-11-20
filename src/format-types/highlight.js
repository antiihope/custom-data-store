import { registerFormatType, toggleFormat } from '@wordpress/rich-text';
import { RichTextToolbarButton } from '@wordpress/block-editor';

const HighlightFormatButton = ({ isActive, value, onChange }) => {
  return (
    <RichTextToolbarButton
      icon="edit"
      title="Highlight"
      onClick={(e) => {
        onChange(
          toggleFormat(value, {
            type: 'block-course/highlight',
            attributes: {
              style: 'background-color: yellow',
            },
          })
        );
      }}
      isActive={isActive}
    />
  );
};
registerFormatType('block-course/highlight', {
  title: 'Highlight',
  tagName: 'span',
  className: null,
  edit: HighlightFormatButton,
});
