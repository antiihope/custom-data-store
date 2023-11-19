import {
	ADD_TODO,
	POPULATE_TODOS,
	CREATE_TODO,
	TOGGLE_TODO,
	UPDATE_TODO,
} from './types.js';
import { createTodo, toggleTodo as toggleTodoControl } from './controls.js';
import { dispatch } from '@wordpress/data';
export function* addTodo( title ) {
	try {
		const todo = yield createTodo( title );
		return {
			type: ADD_TODO,
			todo,
		};
	} catch ( error ) {
		return dispatch( 'core/notices' ).createErrorNotice(
			error.message || 'Could not create todo.'
		);
	}
}
export function* toggleTodo( index, todo ) {
	try {
		yield updateTodo( index, { ...todo, loading: true } );
		const updatedTodo = yield toggleTodoControl( todo );
		return updateTodo( index, updatedTodo );
	} catch ( error ) {
		return dispatch( 'core/notices' ).createErrorNotice(
			error.message || 'Could not update todo.'
		);
	}
}
export const updateTodo = ( index, todo ) => {
	return {
		type: UPDATE_TODO,
		index,
		todo,
	};
};

export const populateTodos = ( todos ) => {
	return {
		type: POPULATE_TODOS,
		todos,
	};
};
