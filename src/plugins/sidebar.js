import { registerPlugin } from '@wordpress/plugins';
import { PluginSidebar } from '@wordpress/edit-post';
import { PanelBody, TextControl } from '@wordpress/components';
// useselect and dispatch
import { useSelect, useDispatch } from '@wordpress/data';

const MetaFieldsInput = () => {
  const subTitleValue = useSelect((select) => {
    return select('core/editor').getEditedPostAttribute('meta')['_blocks_course_post_subtitle'];
  }, []);
  const { editPost } = useDispatch('core/editor');
  return (
    <PanelBody title="Subtitle options">
      <TextControl
        label="Subtitle"
        value={subTitleValue}
        onChange={(subtitle) => {
          editPost({ meta: { _blocks_course_post_subtitle: subtitle } });
        }}
      />
    </PanelBody>
  );
};

registerPlugin('block-course-plugin', {
  render: () => {
    return (
      <>
        <PluginSidebar name="meta-fields-sidebar" icon="admin-settings" title="Post options">
          <MetaFieldsInput />
        </PluginSidebar>
      </>
    );
  },
});
