import { createReduxStore, register } from '@wordpress/data';
import reducer from './reducer.js';
import * as selectors from './selectors.js';
import * as actions from './actions.js';
import * as resolvers from './resolvers.js';
import controls from './controls.js';
const store = createReduxStore( 'block-course/todos', {
	reducer,
	selectors,
	actions,
	resolvers,
	controls,
} );

register( store );
