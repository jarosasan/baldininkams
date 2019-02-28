import * as R from 'ramda'

import {
    FETCH_CATEGORIES_SUCCESS,
    DELETE_CATEGORY_SUCCESS,
    CREATE_CATEGORY_SUCCESS
} from '../actionTypes'

const initialState = {}

export default (state = initialState, {type, payload}) => {
    switch (type) {
        case FETCH_CATEGORIES_SUCCESS:
            const newValues = R.indexBy(R.prop('id'), payload)
            return R.merge(state, newValues)
        case DELETE_CATEGORY_SUCCESS:
            return R.dissoc(payload, state)
        case CREATE_CATEGORY_SUCCESS:
            const newVal = R.indexBy(R.prop('id'), payload)
            return R.merge(state, newVal)
        default:
            return state
    }
}
