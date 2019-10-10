import * as R from 'ramda'
import _ from 'lodash'

import {
    FETCH_CATEGORIES_SUCCESS,
    FETCH_CATEGORY_SUCCESS,
    DELETE_CATEGORY_SUCCESS,
    CREATE_CATEGORY_SUCCESS,
    UPDATE_CATEGORY_SUCCESS
} from '../actionTypes'

 const initialState = []


export default (state = initialState, {type, payload}) => {
    switch (type) {
        case FETCH_CATEGORIES_SUCCESS:
            return {...state, ..._.mapKeys(payload, 'id')}
        case FETCH_CATEGORY_SUCCESS:
            return {...state, [payload.id]: payload}
        case DELETE_CATEGORY_SUCCESS:
            return _.omit(state, payload)
        case CREATE_CATEGORY_SUCCESS:
            return {...state, ..._.mapKeys(payload, 'id')}
            // return {...state, [payload.id]: payload}
        case UPDATE_CATEGORY_SUCCESS:
            return {...state, [payload.id]: payload}
        default:
            return state
    }
}
